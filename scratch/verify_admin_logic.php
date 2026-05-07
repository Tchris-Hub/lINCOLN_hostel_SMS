<?php
$query = "John Doe";
$html = file_get_contents("http://127.0.0.1:8000/students?search=" . urlencode($query));

if (strpos($html, 'LINC/2026/001') !== false) {
    echo "SEARCH SUCCESS: Found student LINC/2026/001 in results.\n";
} else {
    echo "SEARCH FAILURE: Student not found in results.\n";
    // echo substr($html, 0, 1000); // Debug
}

$html_room = file_get_contents("http://127.0.0.1:8000/rooms");
if (strpos($html_room, '1 / 4') !== false) {
    echo "OCCUPANCY SUCCESS: Room A101 shows 1/4 occupied.\n";
} else {
    echo "OCCUPANCY FAILURE: Room count incorrect.\n";
}
