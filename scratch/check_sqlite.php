<?php
try {
    $pdo = new PDO("sqlite:database/database.sqlite");
    $stmt = $pdo->query("SELECT COUNT(*) FROM students");
    echo "SQLite Student count: " . $stmt->fetchColumn() . "\n";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
