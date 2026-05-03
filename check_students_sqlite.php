<?php
$db = new PDO('sqlite:database/database.sqlite');
foreach ($db->query('select admission_number,contact_number,full_name from students') as $r) {
    echo $r['admission_number'].'|'.$r['contact_number'].'|'.$r['full_name'].PHP_EOL;
}
