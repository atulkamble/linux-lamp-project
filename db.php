<?php

$host = "localhost";
$user = "webapp";
$password = "Student@12345";
$database = "student_portal";

$conn = new mysqli(
    $host,
    $user,
    $password,
    $database
);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

?>
