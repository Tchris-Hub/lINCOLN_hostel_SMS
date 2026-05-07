<?php
$pdo = new PDO('mysql:host=127.0.0.1;dbname=hostel', 'root', '');

function showColumns($pdo, $table) {
    echo "\n=== Columns in $table ===\n";
    $s = $pdo->query("DESCRIBE $table");
    while ($r = $s->fetch(PDO::FETCH_ASSOC)) {
        echo "  - {$r['Field']} ({$r['Type']})\n";
    }
}

showColumns($pdo, 'hostels');
showColumns($pdo, 'rooms');
showColumns($pdo, 'students');
