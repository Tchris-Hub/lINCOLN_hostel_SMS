<?php
$pdo = new PDO('mysql:host=127.0.0.1;dbname=hostel', 'root', '');

$stmt = $pdo->query("SELECT id, name, email, is_admin, role, password FROM users LIMIT 5");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo "=== USERS (full) ===\n";
foreach ($users as $u) {
    // Truncate password hash for display
    $u['password'] = substr($u['password'], 0, 20) . '...';
    echo json_encode($u) . "\n";
}

// Check if super_admins table has entries
$stmt = $pdo->query("SELECT * FROM super_admins LIMIT 5");
$admins = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo "\n=== SUPER_ADMINS ===\n";
foreach ($admins as $a) {
    $a['password'] = substr($a['password'], 0, 20) . '...';
    echo json_encode($a) . "\n";
}
if (empty($admins)) echo "No super admins found\n";
