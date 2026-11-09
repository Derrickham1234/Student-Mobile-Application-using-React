<?php
require_once "db.php";

$sql = "SELECT * FROM students ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registered Students</title>
</head>
<body>

<h2>Registered Students</h2>

<a href="registration.php">Register New Student</a>

<br><br>

<table border="1" cellpadding="10" cellspacing="0">

<tr>
    <th>ID</th>
    <th>Student ID</th>
    <th>Full Name</th>
    <th>Registration Number</th>
    <th>Email</th>
    <th>Course</th>
    <th>Action</th>
</tr>

<?php while ($row = $result->fetch_assoc()) { ?>

<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo htmlspecialchars($row['student_id']); ?></td>
    <td><?php echo htmlspecialchars($row['full_name']); ?></td>
    <td><?php echo htmlspecialchars($row['registration_number']); ?></td>
    <td><?php echo htmlspecialchars($row['email']); ?></td>
    <td><?php echo htmlspecialchars($row['course']); ?></td>

    <td>
        <a href="edit.php?id=<?php echo $row['id']; ?>">Update</a>

        |

        <a href="delete.php?id=<?php echo $row['id']; ?>"
        onclick="return confirm('Are you sure you want to delete this student?')">
        Delete
        </a>
    </td>
</tr>

<?php } ?>

</table>

</body>
</html>