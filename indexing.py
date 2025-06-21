from google.oauth2 import service_account
from googleapiclient.discovery import build
import json
import time

# Path to the service account key
KEY_FILE = 'saathi-app-415712-7633b96737f0.json'

# Scopes required by the Indexing API
SCOPES = ["https://www.googleapis.com/auth/indexing"]

# Authenticate
credentials = service_account.Credentials.from_service_account_file(KEY_FILE, scopes=SCOPES)
service = build('indexing', 'v3', credentials=credentials)

# Read completed countries
with open('completed.txt', 'r', encoding='utf-8') as f:
    completed_countries = [line.strip() for line in f if line.strip()]

# Process each URL
for country in completed_countries:
    # Convert country name to URL format
    url_path = country.lower().replace(' ', '-')
    url = f'https://saathivisa.com/visa/{url_path}'
    
    # API request body
    body = {
        "url": url,
        "type": "URL_UPDATED"
    }

    try:
        # Send request
        response = service.urlNotifications().publish(body=body).execute()
        print(f"Indexed {url}")
        print(json.dumps(response, indent=2))
        
        # Sleep briefly to avoid rate limits
        time.sleep(0.5)
        
    except Exception as e:
        print(f"Error indexing {url}: {str(e)}")

print("Indexing completed!")
