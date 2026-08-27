<?php

require 'db.php';

$id = intval($_GET["id"] ?? 0);

$stmt = $conn->prepare(
    "SELECT * FROM students WHERE id=?"
);

$stmt->bind_param("i", $id);

$stmt->execute();

$result = $stmt->get_result();

$student = $result->fetch_assoc();

if (!$student) {

    exit("Student not found.");

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $course = trim($_POST["course"]);
    $city = trim($_POST["city"]);

    $stmt = $conn->prepare(
        "UPDATE students
        SET name=?, email=?, course=?, city=?
        WHERE id=?"
    );

    $stmt->bind_param(
        "ssssi",
        $name,
        $email,
        $course,
        $city,
        $id
    );

    $stmt->execute();

    header("Location: students.php");

    exit;

}

?>

<!DOCTYPE html>

<html>

<head>

<title>Edit Student</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

<h1>Edit Student</h1>

<form method="POST">

<label>Name</label>

<input
type="text"
name="name"
value="<?php echo htmlspecialchars($student['name']); ?>"
required>

<label>Email</label>

<input
type="email"
name="email"
value="<?php echo htmlspecialchars($student['email']); ?>"
required>

<label>Course</label>

<input
type="text"
name="course"
value="<?php echo htmlspecialchars($student['course']); ?>"
required>

<label>City</label>

<input
type="text"
name="city"
value="<?php echo htmlspecialchars($student['city']); ?>">

<button type="submit">
Update Student
</button>

</form>

</div>

</body>

</html>
