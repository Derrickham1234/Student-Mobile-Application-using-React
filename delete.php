<?php

require_once "db.php";

if (isset($_POST['delete'])) {

    $id = $_POST['id'];

    $stmt = $conn->prepare("DELETE FROM students WHERE id = ?");

    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {

        if ($stmt->affected_rows > 0) {
            echo "Student deleted successfully!";
        } else {
            echo "Student not found!";
        }

        echo "<br><a href='dashboard.php'>Return to Dashboard</a>";

    } else {
        echo "Deletion failed!";
    }

    $stmt->close();

} else {

    echo "Invalid request!";

}

?>