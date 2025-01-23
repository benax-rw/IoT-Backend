Here’s the corrected ReadMe.md file formatted specifically to display properly on GitHub. GitHub Markdown uses proper indentation and formatting to ensure clarity.

IoT-Backend

RFID Transaction System - Guidance

Overview

This project manages RFID transaction data using SQLite and PHP. It includes the following components:
	1.	DatabaseManager.php - Handles SQLite database connections.
	2.	RFIDManager.php - Manages RFID transaction logic.
	3.	upload.php - Receives transaction data via HTTP POST.
	4.	index.php - Displays transaction data in a browser.

File Details

1. DatabaseManager.php
	•	Establishes a connection to the SQLite database.
	•	Ensures proper error handling and reuse of the database connection.

2. RFIDManager.php
	•	Creates and initializes the rfid_transactions table.
	•	Provides the saveTransaction method to store transaction data.

3. upload.php
	•	Accepts transaction data from a client via HTTP POST.
	•	Validates and stores data in the SQLite database using RFIDManager.

4. index.php
	•	Fetches all transactions and displays them in a user-friendly HTML table.

Testing with cURL

To test the client-server data transfer to upload.php, use the following cURL command:

curl -X POST \
  -H "Content-Type: application/x-www-form-urlencoded" \
  -d "customer=John Doe" \
  -d "initial_balance=100" \
  -d "transport_fare=20" \
  "http://iot.benax.rw/projects/4e8d42b606f70fa9d39741a93ed0356c/y2-2025/upload.php"

Parameters:
	•	customer: Name of the customer.
	•	initial_balance: Initial balance of the customer.
	•	transport_fare: Transport fare deducted from the balance.

Expected Response:
	•	Transaction uploaded successfully! if data is stored successfully.
	•	Error messages for invalid data or connection issues.

Viewing Transactions
	1.	Open index.php in a web browser.
	2.	All transactions will be displayed in a table format with the following columns:
	•	ID
	•	Customer Name
	•	Initial Balance
	•	Transport Fare
	•	New Balance
	•	Timestamp

Notes
	•	The SQLite database file (database.sqlite) is automatically created in the project folder.
	•	Ensure the PHP server has write permissions for the directory containing database.sqlite.

Troubleshooting

1. No transactions displayed in index.php:
	•	Check that upload.php is receiving valid data.
	•	Verify that database.sqlite exists and contains the rfid_transactions table.

2. Connection issues:
	•	Confirm that your server supports PDO and SQLite.

3. Testing API with a Script:

Use the following Python script with the requests library:

import requests

url = "http://iot.benax.rw/projects/4e8d42b606f70fa9d39741a93ed0356c/y2-2025/upload.php"
data = {
    "customer": "John Doe",
    "initial_balance": 100,
    "transport_fare": 20
}

response = requests.post(url, data=data)
print(response.text)

This version adheres to GitHub’s Markdown standards for proper rendering. Let me know if you encounter further issues!