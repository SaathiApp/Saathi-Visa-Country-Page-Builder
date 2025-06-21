from google.oauth2 import service_account
from googleapiclient.discovery import build
import json

# Path to the service account key
KEY_FILE = 'saathi-app-415712-7633b96737f0.json'

# Scopes required by the Indexing API
SCOPES = ["https://www.googleapis.com/auth/indexing"]

# Authenticate
credentials = service_account.Credentials.from_service_account_file(KEY_FILE, scopes=SCOPES)
service = build('indexing', 'v3', credentials=credentials)

# API request body
url = 'https://saathivisa.com/blog'
body = {
    "url": url,
    "type": "URL_UPDATED"
}

# Send request
response = service.urlNotifications().publish(body=body).execute()
print(json.dumps(response, indent=2))
