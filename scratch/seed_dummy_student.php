<?php
$pdo = new PDO('mysql:host=127.0.0.1;dbname=hostel', 'root', '');
$now = date('Y-m-d H:i:s');

// 1. Create a Hostel
$stmt = $pdo->prepare("INSERT INTO hostels (name, type, address, description, status, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->execute(['Main Block A', 'male', 'Lincoln Campus South', 'Standard male accommodation block', 'active', $now, $now]);
$hostel_id = $pdo->lastInsertId();
echo "Hostel Created: ID $hostel_id\n";

// 2. Create Rooms
$stmt = $pdo->prepare("INSERT INTO rooms (hostel_id, room_number, capacity, occupied, room_type, price_per_semester, status, gender_type, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->execute([$hostel_id, 'A101', 4, 1, 'quad', 85000, 'available', 'male', $now, $now]);
$room1_id = $pdo->lastInsertId();
$stmt->execute([$hostel_id, 'A102', 4, 0, 'quad', 85000, 'available', 'male', $now, $now]);
$room2_id = $pdo->lastInsertId();
echo "Rooms Created: A101 (ID $room1_id), A102 (ID $room2_id)\n";

// 3. Create a User for the Student
$password = password_hash('welcome123', PASSWORD_BCRYPT);
$stmt = $pdo->prepare("INSERT INTO users (name, email, password, role, is_active, created_at, updated_at) VALUES (?, ?, ?, ?, 1, ?, ?)");
$stmt->execute(['John Doe', 'john@example.com', $password, 'student', $now, $now]);
$user_id = $pdo->lastInsertId();
echo "User Created: ID $user_id\n";

// 4. Create the Student record
$stmt = $pdo->prepare("INSERT INTO students (user_id, room_id, admission_number, contact_number, full_name, email, gender, department, semester, intake, hostel_fee_status, status, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->execute([
    $user_id, 
    $room1_id, 
    'LINC/2026/001', 
    '08012345678', 
    'John Doe', 
    'john@example.com',
    'male', 
    'Computer Science', 
    1, // integer
    'July 2026', 
    'paid', 
    'active',
    $now, 
    $now
]);
$student_id = $pdo->lastInsertId();
echo "Student Created: ID $student_id (Admission: LINC/2026/001)\n";

echo "Dummy Data Setup Complete!\n";
