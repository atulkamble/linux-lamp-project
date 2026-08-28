<?php

require 'db.php';

$result = $conn->query(
    "SELECT * FROM students ORDER BY id DESC"
);

?>

<!DOCTYPE html>

<html>

<head>

<title>Students</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

<h1>Student Records</h1>

<a class="button" href="index.php">
Home
</a>

<a class="button" href="add.php">
Add Student
</a>

<br><br>

<table>

<tr>

<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Course</th>
<th>City</th>
<th>Created</th>
<th>Actions</th>

</tr>

<?php while($row = $result->fetch_assoc()) { ?>

<tr>

<td>
<?php echo htmlspecialchars($row['id']); ?>
</td>

<td>
<?php echo htmlspecialchars($row['name']); ?>
</td>

<td>
<?php echo htmlspecialchars($row['email']); ?>
</td>

<td>
<?php echo htmlspecialchars($row['course']); ?>
</td>

<td>
<?php echo htmlspecialchars($row['city']); ?>
</td>

<td>
<?php echo htmlspecialchars($row['created_at']); ?>
</td>

<td>

<a href="edit.php?id=<?php echo $row['id']; ?>">
Edit
</a>

<form
method="POST"
action="delete.php"
style="display:inline">

<input
type="hidden"
name="id"
value="<?php echo $row['id']; ?>">

<button type="submit">
Delete
</button>

</form>

</td>

</tr>

<?php } ?>

</table>

</div>

</body>

</html>
