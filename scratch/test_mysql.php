<?php
$hosts = ['127.0.0.1', 'localhost'];
foreach ($hosts as $host) {
    echo "Testing connection to $host...\n";
    try {
        $pdo = new PDO("mysql:host=$host;port=3306;dbname=hostel", "root", "");
        echo "Connected successfully to $host\n";
        $stmt = $pdo->query("SHOW TABLES");
        $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
        echo "Tables found: " . implode(", ", $tables) . "\n";
        break;
    } catch (PDOException $e) {
        echo "Connection to $host failed: " . $e->getMessage() . "\n";
    }
}
