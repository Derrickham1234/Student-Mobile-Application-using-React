<?php

require_once "db.php";

session_start();

if (!isset($_SESSION['admin'])) {

    header("Location: login.php");
    exit;

}



$result = $conn->query("SELECT * FROM students ORDER BY id DESC");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Management Dashboard</title>
</head>

<body>

    <h1>Student Management Dashboard</h1>
    <a href="logout.php">Logout</a>

    <h3>Registered Students</h3>

    <table border="1" cellpadding="10">

        <tr>
            <th>ID</th>
            <th>Student Name</th>
            <th>Registration Number</th>
            <th>Email</th>
            <th>Course</th>
            <th>Actions</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()) { ?>

        <tr>

            <td><?php echo $row['id']; ?></td>

            <td><?php echo htmlspecialchars($row['full_name']); ?></td>

            <td><?php echo htmlspecialchars($row['registration_number']); ?></td>

            <td><?php echo htmlspecialchars($row['email']); ?></td>

            <td><?php echo htmlspecialchars($row['course']); ?></td>

            <td>
                <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>

                |

                <form action="delete.php" method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this student?');">

                    <input type="hidden" name="id"
                     value="<?php echo $row['id']; ?>">

                    <button type="submit" name="delete">Delete</button>

                </form>
            </td>

        </tr>

        <?php } ?>

    </table>

</body>
</html>