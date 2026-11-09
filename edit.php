<?php

require_once "db.php";

// Get student ID from URL
$id = $_GET['id'] ?? 0;

// Retrieve student information
$stmt = $conn->prepare("SELECT * FROM students WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();
$student = $result->fetch_assoc();

if (!$student) {
    die("Student not found!");
}

// Update student information
if (isset($_POST['update'])) {

    $name = $_POST['full_name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    $update = $conn->prepare(
        "UPDATE students SET full_name = ?, email = ?, course = ? WHERE id = ?"
    );

    $update->bind_param("sssi", $name, $email, $course, $id);

    if ($update->execute()) {
        echo "Student updated successfully!";
        echo "<br><a href='dashboard.php'>Return to Dashboard</a>";
        exit;
    } else {
        echo "Update failed!";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
</head>

<body>

    <h2>Edit Student Information</h2>

    <form method="POST">

        <label>Full Name:</label>
        <input type="text" name="full_name"
        value="<?php echo htmlspecialchars($student['full_name']); ?>">
        <br><br>

        <label>Email:</label>
        <input type="email" name="email"
        value="<?php echo htmlspecialchars($student['email']); ?>">
        <br><br>

        <label>Course:</label>
        <input type="text" name="course"
        value="<?php echo htmlspecialchars($student['course']); ?>">
        <br><br>

        <button type="submit" name="update">Update Student</button>

    </form>

</body>
</html>