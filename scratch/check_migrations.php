<?php
$pdo = new PDO('mysql:host=127.0.0.1;dbname=hostel', 'root', '');

echo "=== ALL TABLES IN hostel ===\n";
$s = $pdo->query('SHOW TABLES');
while ($r = $s->fetch(PDO::FETCH_COLUMN)) {
    echo "  - $r\n";
}

echo "\n=== MIGRATIONS TABLE ===\n";
$s = $pdo->query('SELECT migration FROM migrations ORDER BY id');
while ($r = $s->fetch(PDO::FETCH_COLUMN)) {
    echo "  $r\n";
}
