<?php
$db = new PDO('sqlite:database/database.sqlite');
$u = $db->query('select id,email,role,is_admin from users')->fetchAll(PDO::FETCH_ASSOC);
$s = $db->query('select id,admission_number,contact_number,full_name from students')->fetchAll(PDO::FETCH_ASSOC);
echo "USERS\n";
print_r($u);
echo "STUDENTS\n";
print_r($s);
