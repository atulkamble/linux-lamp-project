<?php

require 'db.php';

if ($_SERVER["REQUEST_METHOD"] !== "POST") {

    http_response_code(405);

    exit("Method not allowed.");

}

$id = intval($_POST["id"] ?? 0);

$stmt = $conn->prepare(
    "DELETE FROM students WHERE id=?"
);

$stmt->bind_param("i", $id);

$stmt->execute();

header("Location: students.php");

exit;

?>
