<?php

$conn = new mysqli(
    "localhost",
    "webapp",
    "Student@12345",
    "student_portal"
);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Database connection successful!";

?>
