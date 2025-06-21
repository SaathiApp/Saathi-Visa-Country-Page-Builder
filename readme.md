# Visa Saathi - Visa Page Generator

This project generates visa information pages for different countries using data from JSON files and a PHP template.

## Prerequisites

- Python 3.x
- Google Cloud Platform account with Indexing API enabled
- Service account key file (`saathi-app-415712-7633b96737f0.json`)

## Required Files

Make sure you have the following files in your project directory:
- `SaathiVisa_types_enriched.json` - Visa types and fees data
- `visadocuments_cleaned.json` - Required documents data
- `saathi_cleaned_Process_data.json` - Application process steps
- `saathi_cleaned_FAQ_data.json` - Frequently asked questions
- `finalvisa.php` - PHP template for visa pages
- `saathi-app-415712-7633b96737f0.json` - Google Cloud service account key

## Usage Instructions

### Step 1: Generate Visa Pages

Run the main script to generate visa pages for all countries:

```bash
python main.py
```

This will:
- Read data from all JSON files
- Generate PHP pages for each country in the `visa/` directory
- Create log files: `completed.txt` (successful) and `errors.txt` (failed)

### Step 2: Deploy to Website

Upload the generated PHP files from the `visa/` directory to your web server at:
```
https://saathivisa.com/visa/
```

### Step 3: Index New Pages

After deploying the pages, run the indexing script to notify Google about the new pages:

```bash
python indexing.py
```

This will:
- Read the list of successfully generated countries from `completed.txt`
- Submit each URL to Google's Indexing API
- Help Google discover and index the new visa pages

## Output Files

- `visa/` directory - Contains generated PHP files for each country
- `completed.txt` - List of successfully processed countries
- `errors.txt` - List of countries that failed to process

## File Structure

```
visa/
├── page-afghanistan.php
├── page-albania.php
├── page-algeria.php
└── ... (one file per country)
```

## Notes

- The script automatically handles country name formatting for URLs
- Each generated page includes SEO-optimized FAQ schema markup
- The indexing script includes rate limiting to avoid API quotas
- Make sure your Google Cloud service account has the necessary permissions for the Indexing API

## Troubleshooting

If you encounter errors:
1. Check the `errors.txt` file for failed countries
2. Verify all required JSON files are present
3. Ensure the service account key file is valid and has proper permissions
4. Check that the PHP template file is properly formatted
