<?php
try {
    $pdo = new PDO("mysql:host=127.0.0.1;port=3306;dbname=hostel", "root", "");
    $tables = ['students', 'users', 'hostel_applications', 'payments', 'rooms'];
    foreach ($tables as $table) {
        $stmt = $pdo->query("SELECT COUNT(*) FROM $table");
        echo "Table $table count: " . $stmt->fetchColumn() . "\n";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
