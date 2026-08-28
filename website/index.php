<?php

require 'db.php';

$result = $conn->query(
    "SELECT COUNT(*) AS total FROM students"
);

$data = $result->fetch_assoc();

?>

<!DOCTYPE html>

<html>

<head>

    <title>Linux Student Portal</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <h1>Enterprise Linux Student Portal</h1>

    <p>
        Apache + PHP + MariaDB/MySQL
    </p>

    <div class="card">

        <h2>Linux Server</h2>

        <p>
            Hostname:
            <?php echo htmlspecialchars(gethostname()); ?>
        </p>

        <p>
            PHP Version:
            <?php echo htmlspecialchars(PHP_VERSION); ?>
        </p>

    </div>

    <div class="card">

        <h2>Database</h2>

        <p>
            Total Students:
            <?php echo htmlspecialchars($data['total']); ?>
        </p>

    </div>

    <a class="button" href="students.php">
        View Students
    </a>

    <a class="button" href="add.php">
        Add Student
    </a>

</div>

</body>

</html>
