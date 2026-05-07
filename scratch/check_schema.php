<?php
$pdo = new PDO('mysql:host=127.0.0.1;dbname=hostel', 'root', '');

echo "=== INTAKES TABLE ===\n";
$s = $pdo->query('DESCRIBE intakes');
while ($r = $s->fetch(PDO::FETCH_ASSOC)) {
    echo $r['Field'] . ' | ' . $r['Type'] . ' | Null:' . $r['Null'] . "\n";
}

echo "\n=== DEPARTMENTS TABLE ===\n";
$s = $pdo->query('DESCRIBE departments');
while ($r = $s->fetch(PDO::FETCH_ASSOC)) {
    echo $r['Field'] . ' | ' . $r['Type'] . ' | Null:' . $r['Null'] . "\n";
}

echo "\n=== INTAKES DATA ===\n";
$s = $pdo->query('SELECT * FROM intakes');
$rows = $s->fetchAll(PDO::FETCH_ASSOC);
echo "Count: " . count($rows) . "\n";
foreach ($rows as $r) {
    echo json_encode($r) . "\n";
}

echo "\n=== DEPARTMENTS DATA ===\n";
$s = $pdo->query('SELECT * FROM departments');
$rows = $s->fetchAll(PDO::FETCH_ASSOC);
echo "Count: " . count($rows) . "\n";
foreach ($rows as $r) {
    echo json_encode($r) . "\n";
}
