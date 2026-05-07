<?php
$pdo = new PDO('mysql:host=127.0.0.1;dbname=hostel', 'root', '');

// Check admin user credentials  
$stmt = $pdo->query("SELECT id, name, email, is_admin FROM users LIMIT 5");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo "=== USERS ===\n";
foreach ($users as $u) {
    echo json_encode($u) . "\n";
}

// Check intakes count
$stmt = $pdo->query("SELECT COUNT(*) FROM intakes");
echo "\nIntakes count: " . $stmt->fetchColumn() . "\n";

// Check departments count
$stmt = $pdo->query("SELECT COUNT(*) FROM departments");
echo "Departments count: " . $stmt->fetchColumn() . "\n";
