<?php
require dirname(__DIR__).'/vendor/autoload.php';
$app = require_once dirname(__DIR__).'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\Schema;

$tables = ['hostels', 'rooms', 'students', 'hostel_applications', 'payments', 'beds'];

foreach ($tables as $table) {
    echo "=== ".strtoupper($table)." TABLE ===\n";
    if (Schema::hasTable($table)) {
        $columns = Schema::getColumnListing($table);
        foreach ($columns as $column) {
            $type = Schema::getColumnType($table, $column);
            echo "$column | $type\n";
        }
    } else {
        echo "Table does not exist.\n";
    }
    echo "\n";
}
