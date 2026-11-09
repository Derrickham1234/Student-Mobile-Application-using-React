<?php

require_once "db.php";
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Tell the browser we are returning JSON
header("Content-Type: application/json");

// Retrieve all students
$sql = "SELECT * FROM students";

$result = $conn->query($sql);

// Create an empty array
$students = [];

// Collect student records
while ($row = $result->fetch_assoc()) {

    $students[] = $row;

}

// Convert PHP array into JSON
echo json_encode($students);

?>