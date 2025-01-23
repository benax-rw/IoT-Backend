<?php
include_once("RFIDManager.php");
// Initialize RFIDManager
$rfidManager = new RFIDManager();
// Fetch the table name using the getter method
$tableName = $rfidManager->getTableName();
// Fetch all transactions
$sql = "SELECT * FROM " . $tableName . " ORDER BY id DESC";
$stmt = $rfidManager->getConnection()->prepare($sql);
$stmt->execute();
$transactions = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RFID Transactions - Benax Technologies</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f4fc;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        header {
            background-color: #6f42c1;
            color: white;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        header img {
            max-height: 50px;
            margin-right: 15px;
        }
        header h1 {
            font-size: 1.8rem;
            margin: 0;
        }
        .container {
            width: 90%;
            max-width: 98%px;
            margin: 30px auto;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            flex: 1;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 15px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #6f42c1;
            color: white;
            font-weight: bold;
        }
        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tbody tr:hover {
            background-color: #e6d8f5;
            cursor: pointer;
        }
        .no-data {
            text-align: center;
            padding: 20px;
            color: #888;
        }
        footer {
            background-color: #6f42c1;
            color: white;
            text-align: center;
            padding: 15px 0;
            font-size: 0.9rem;
            box-shadow: 0 -2px 4px rgba(0, 0, 0, 0.1);
            margin-top: auto;
        }
        footer a {
            color: #d1b9f3;
            text-decoration: none;
        }
        footer a:hover {
            text-decoration: underline;
        }
        @media screen and (max-width: 600px) {
            table {
                font-size: 14px;
            }
            th, td {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <header>
        <img src="benax-logo-white.png" alt="Benax Technologies Logo">
        <h1>RFID Transactions - Benax Technologies</h1>
    </header>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer</th>
                    <th>Initial Balance</th>
                    <th>Transport Fare</th>
                    <th>New Balance</th>
                    <th>Timestamp</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($transactions)): ?>
                    <?php foreach ($transactions as $transaction): ?>
                        <tr>
                            <td><?= htmlspecialchars($transaction['id']) ?></td>
                            <td><?= htmlspecialchars($transaction['customer']) ?></td>
                            <td><?= htmlspecialchars($transaction['initial_balance']) ?></td>
                            <td><?= htmlspecialchars($transaction['transport_fare']) ?></td>
                            <td><?= htmlspecialchars($transaction['new_balance']) ?></td>
                            <td><?= htmlspecialchars($transaction['timestamp']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="no-data">No transactions found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <footer>
        &copy; <?= date('Y') ?> Benax Technologies. All rights reserved. | <a href="https://benax.rw">benax.rw</a>
    </footer>
</body>
</html>
