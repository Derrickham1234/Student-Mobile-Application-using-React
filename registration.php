<?php
require_once "db.php";

$message = "";

if (isset($_POST['register'])) {

    $student_id = trim($_POST['student_id']);
    $full_name = trim($_POST['full_name']);
    $reg_number = trim($_POST['reg_number']);
    $email = trim($_POST['email']);
    $course = trim($_POST['course']);

    if ($student_id == "" || $full_name == "" || $reg_number == "" || $email == "" || $course == "") {
        $message = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Please enter a valid email address.";
    } else {
        $stmt = $conn->prepare("INSERT INTO students (student_id, full_name, registration_number, email, course) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $student_id, $full_name, $reg_number, $email, $course);

        if ($stmt->execute()) {
            $message = "Student registered successfully!";
        } else {
            $message = "Error: Student ID, registration number or email may already exist.";
        }

        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Registration</title>
</head>
<body>

<h2>University Student Registration</h2>

<p><?php echo htmlspecialchars($message); ?></p>

<form method="POST">

    <label>Student ID:</label><br>
    <input type="text" name="student_id" required><br><br>

    <label>Full Name:</label><br>
    <input type="text" name="full_name" required><br><br>

    <label>Registration Number:</label><br>
    <input type="text" name="reg_number" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Course:</label><br>
    <input type="text" name="course" required><br><br>

    <button type="submit" name="register">Register Student</button>

</form>

</body>
</html>