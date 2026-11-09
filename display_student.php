<?php

require_once "../db.php";

$result = $conn->query("SELECT * FROM students");

while ($row = $result->fetch_assoc()) {

    echo "Student Name: " . htmlspecialchars($row['full_name']);
    echo "<br>";

    echo "Email: " . htmlspecialchars($row['email']);
    echo "<hr>";

}

?>