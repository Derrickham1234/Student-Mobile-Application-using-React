<?php

session_start();

require_once "db.php";

$message = "";

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare(
        "SELECT * FROM administrators WHERE username = ?"
    );

    $stmt->bind_param("s", $username);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows == 1) {

        $admin = $result->fetch_assoc();

        if (password_verify($password, $admin['password'])) {

            session_regenerate_id(true);

            $_SESSION['admin'] = $admin['username'];

            header("Location: dashboard.php");
            exit;

        } else {

            $message = "Incorrect password!";

        }

    } else {

        $message = "Administrator not found!";

    }

    $stmt->close();
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Administrator Login</title>
</head>

<body>

    <h2>Student Registration System</h2>

    <h3>Administrator Login</h3>

    <p><?php echo htmlspecialchars($message); ?></p>

    <form method="POST">

        <label>Username:</label>
        <input type="text" name="username" required>

        <br><br>

        <label>Password:</label>
        <input type="password" name="password" required>

        <br><br>

        <button type="submit" name="login">Login</button>

    </form>

</body>

</html>