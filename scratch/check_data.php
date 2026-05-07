<?php
try {
    $pdo = new PDO("mysql:host=127.0.0.1;port=3306;dbname=hostel", "root", "");
    $stmt = $pdo->query("SELECT COUNT(*) FROM students");
    $count = $stmt->fetchColumn();
    echo "Student count: $count\n";
    
    $stmt = $pdo->query("SELECT COUNT(*) FROM users");
    $userCount = $stmt->fetchColumn();
    echo "User count: $userCount\n";
    
    $stmt = $pdo->query("SELECT * FROM students LIMIT 1");
    $student = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($student) {
        echo "Example student name: " . ($student['full_name'] ?? 'N/A') . "\n";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
