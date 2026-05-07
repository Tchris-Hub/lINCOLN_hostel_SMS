<?php
$html = file_get_contents('http://127.0.0.1:8000/hostel/apply');

// Check for intake field type
if (strpos($html, 'Select Intake') !== false) {
    echo "INTAKE: DROPDOWN (dynamic, populated)\n";
} elseif (strpos($html, 'e.g. July 2026') !== false) {
    echo "INTAKE: TEXT INPUT (fallback - no intakes in DB)\n";
} else {
    echo "INTAKE: Could not determine\n";
}

// Check for department field type
if (strpos($html, 'Select Department') !== false) {
    echo "DEPARTMENT: DROPDOWN (dynamic, populated)\n";
} elseif (strpos($html, 'e.g. Computer Science') !== false) {
    echo "DEPARTMENT: TEXT INPUT (fallback - no departments in DB)\n";
} else {
    echo "DEPARTMENT: Could not determine\n";
}

// Check for errors
if (strpos($html, 'Whoops') !== false || strpos($html, 'Error') !== false) {
    echo "WARNING: Error detected on page\n";
} else {
    echo "PAGE: Loads cleanly (no errors)\n";
}
