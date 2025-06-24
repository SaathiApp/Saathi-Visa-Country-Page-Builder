import json
import re
import os
import random
import mysql.connector

# DB connection setup
db = mysql.connector.connect(
    host="saathidev.c50w44euot42.ap-south-1.rds.amazonaws.com",
    user="techdev",
    password="TechDevSaathi",
    database="saathi_dev"
)
cursor = db.cursor()

def get_country_data_from_db(country_name):
    query = "SELECT cost, processingTime FROM visa_country_info WHERE slug = %s LIMIT 1"
    cursor.execute(query, (country_name.lower(),))
    result = cursor.fetchone()
    if result:
        cost, processing_time = result
        return cost, processing_time
    else:
        return None, None

def extract_numeric_fee(fee_str):
    if not fee_str:
        return 0
    try:
        return int(re.sub(r"[^\d]", "", fee_str)) or 0
    except:
        return 0

# Load JSON files
with open('SaathiVisa_types_enriched.json', 'r', encoding='utf-8') as f:
    visa_data = json.load(f)

with open('visadocuments_cleaned.json', 'r', encoding='utf-8') as f:
    docs_data = json.load(f)

with open('saathi_cleaned_Process_data.json', 'r', encoding='utf-8') as f:
    steps_data = json.load(f)

with open('saathi_cleaned_FAQ_data.json', 'r', encoding='utf-8') as f:
    faq_data = json.load(f)

# Convert lists to dicts
docs_by_country = {entry["country"]: entry["documents"] for entry in docs_data}
steps_by_country = {entry["country"]: entry["steps"] for entry in steps_data}
faqs_by_country = {entry["country"]: entry["faqs"] for entry in faq_data}
visa_by_country = {entry["country"]: entry["visa_types"] for entry in visa_data}

# Load PHP template
with open('finalvisa.php', 'r', encoding='utf-8') as f:
    php_template = f.read()

# Prepare log files
completed_countries = []
error_countries = []

# Ensure output folder exists
os.makedirs("visa", exist_ok=True)

# Process each country
for country, visa_types in visa_by_country.items():
    try:
        # Check DB for existing cost and processing time
        cost, processing_time = get_country_data_from_db(country)
        if cost and processing_time:
            print(f"⚠ Exists in DB: {country} - Cost: {cost} - Processing Time: {processing_time}")
            # Overwrite first visa_type with DB data
            visa_types[0]['fees'] = str(cost)
            visa_types[0]['processing_time'] = processing_time

        documents = docs_by_country.get(country)
        steps = steps_by_country.get(country)
        faqs = faqs_by_country.get(country)

        if not documents or not steps or not faqs:
            raise ValueError("Missing one or more required data blocks")

        # Find visa with the lowest fee (after DB override)
        lowest_visa = min(visa_types, key=lambda x: extract_numeric_fee(x.get("fees", "")))
        lowest_fee = lowest_visa.get("fees", "0")
        lowest_processing_time = lowest_visa.get("processing_time", "N/A")

        # Build $visa_types
        visa_php = "$visa_types = [\n"
        for visa in visa_types:
            visa_php += "    [\n"
            for k, v in visa.items():
                visa_php += f"        '{k}' => '{v}',\n"
            visa_php = visa_php.rstrip(",\n") + "\n    ],\n"
        visa_php = visa_php.rstrip(",\n") + "\n];"

        # Build $documents
        must_have = documents.get("must_have", [])
        supporting = documents.get("supporting_documents", [])

        doc_php = "$documents = [\n"
        doc_php += "    'must_have' => [\n"
        for item in must_have:
            doc_php += f"        \"{item}\",\n"
        doc_php += "    ],\n"
        doc_php += "    'supporting_documents' => [\n"
        for group in supporting:
            doc_php += "        [\n"
            doc_php += f"            'title' => \"{group['title']}\",\n"
            doc_php += "            'items' => [\n"
            for item in group['items']:
                doc_php += f"                \"{item}\",\n"
            doc_php += "            ]\n"
            doc_php += "        ],\n"
        doc_php += "    ]\n];"

        # Build $steps
        steps_php = "$steps = [\n"
        for step in steps:
            steps_php += f"    \"{step}\",\n"
        steps_php += "];"

        # Build $faqs
        faqs_php = "$faqs = [\n"
        for faq in faqs:
            question = faq['question'].replace("'", "\\'")
            answer = faq['answer'].replace("'", "\\'")
            faqs_php += "    [\n"
            faqs_php += f"        'question' => '{question}',\n"
            faqs_php += f"        'answer' => '{answer}'\n"
            faqs_php += "    ],\n"
        faqs_php = faqs_php.rstrip(",\n") + "\n];"

        # Build FAQ JSON-LD schema for SEO
        faq_schema = {
            "@context": "https://schema.org",
            "@type": "FAQPage",
            "mainEntity": []
        }

        for faq in faqs:
            question = faq['question'].strip()
            answer = faq['answer'].strip()
            faq_schema["mainEntity"].append({
                "@type": "Question",
                "name": question,
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": answer
                }
            })

        faq_schema_json = json.dumps(faq_schema, ensure_ascii=False, indent=2)
        faq_schema_php = f"<script type=\"application/ld+json\">\n{faq_schema_json}\n</script>"

        # Replace placeholders
        updated_php = php_template
        updated_php = re.sub(r"\$visa_types\s*=\s*\[[\s\S]*?\];", visa_php, updated_php)
        updated_php = re.sub(r"\$documents\s*=\s*\[[\s\S]*?\];", doc_php, updated_php)
        updated_php = re.sub(r"\$steps\s*=\s*\[[\s\S]*?\];", steps_php, updated_php)
        updated_php = re.sub(r"\$faqs\s*=\s*\[[\s\S]*?\];", faqs_php, updated_php)

        updated_php = updated_php.replace("`FAQ_SCHEMA`", faq_schema_php)
        updated_php = updated_php.replace("`Country`", country).replace("'Country'", f"'{country}'")
        updated_php = updated_php.replace("`Random`", str(round(random.uniform(95.0, 99.5), 1)))
        updated_php = updated_php.replace("`Price`", str(lowest_fee))
        updated_php = updated_php.replace("`ProcessingTime`", str(lowest_processing_time))
        updated_php = updated_php.replace("`image_url`", f"{country.replace(' ', '-')}.webp")

        # Write output file
        output_file = f"visa/page-{country.lower().replace(' ', '-')}.php"
        with open(output_file, 'w', encoding='utf-8') as f:
            f.write(updated_php)

        print(f"✅ Created: {output_file}")
        completed_countries.append(country)

    except Exception as e:
        print(f"❌ Error processing {country}: {e}")
        error_countries.append(country)

# Write logs
with open("completed.txt", "w", encoding="utf-8") as f:
    f.write("\n".join(completed_countries))

with open("errors.txt", "w", encoding="utf-8") as f:
    f.write("\n".join(error_countries))

