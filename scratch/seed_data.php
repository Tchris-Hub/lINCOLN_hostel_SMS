<?php
$pdo = new PDO('mysql:host=127.0.0.1;dbname=hostel', 'root', '');
$now = date('Y-m-d H:i:s');

// Seed departments
$depts = [
    ['Computer Science', 1],
    ['Business Administration', 2],
    ['Mass Communication', 3],
    ['Accounting', 4],
    ['Public Administration', 5],
];
$stmt = $pdo->prepare("INSERT INTO departments (name, is_active, sort_order, created_at, updated_at) VALUES (?, 1, ?, ?, ?)");
foreach ($depts as $d) {
    $stmt->execute([$d[0], $d[1], $now, $now]);
}
echo "Departments seeded: " . count($depts) . "\n";

// Seed intakes
$intakes = [
    ['July 2026', '2026-07-01', '2026-12-31', 1],
    ['January 2027', '2027-01-15', '2027-06-30', 2],
];
$stmt = $pdo->prepare("INSERT INTO intakes (name, start_date, end_date, is_active, sort_order, created_at, updated_at) VALUES (?, ?, ?, 1, ?, ?, ?)");
foreach ($intakes as $i) {
    $stmt->execute([$i[0], $i[1], $i[2], $i[3], $now, $now]);
}
echo "Intakes seeded: " . count($intakes) . "\n";

echo "Done!\n";
