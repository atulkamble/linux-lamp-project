<?php

require 'db.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $course = trim($_POST["course"]);
    $city = trim($_POST["city"]);

    $stmt = $conn->prepare(
        "INSERT INTO students
        (name,email,course,city)
        VALUES (?, ?, ?, ?)"
    );

    $stmt->bind_param(
        "ssss",
        $name,
        $email,
        $course,
        $city
    );

    if ($stmt->execute()) {

        header("Location: students.php");

        exit;

    } else {

        $message = "Unable to add student.";

    }

}

?>

<!DOCTYPE html>

<html>

<head>

<title>Add Student</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

<h1>Add Student</h1>

<p>
<?php echo htmlspecialchars($message); ?>
</p>

<form method="POST">

<label>Name</label>

<input
type="text"
name="name"
required>

<label>Email</label>

<input
type="email"
name="email"
required>

<label>Course</label>

<input
type="text"
name="course"
required>

<label>City</label>

<input
type="text"
name="city">

<button type="submit">
Add Student
</button>

</form>

<br>

<a href="students.php">
Back
</a>

</div>

</body>

</html>
