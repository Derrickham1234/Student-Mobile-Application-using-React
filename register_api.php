<?php

require_once "db.php";

header("Content-Type: application/json");

// Accept POST requests only
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

    http_response_code(405);

    echo json_encode([
        "message" => "Only POST requests are allowed"
    ]);

    exit;
}

// Receive JSON information
$data = json_decode(file_get_contents("php://input"), true);

// Check whether all required information exists
$required = [
    'student_id',
    'full_name',
    'registration_number',
    'email',
    'course'
];

foreach ($required as $field) {

    if (!isset($data[$field]) || trim($data[$field]) === '') {

        http_response_code(400);

        echo json_encode([
            "message" => "Missing or empty field: " . $field
        ]);

        exit;
    }
}

// Collect information
$student_id = trim($data['student_id']);
$full_name = trim($data['full_name']);
$reg_number = trim($data['registration_number']);
$email = trim($data['email']);
$course = trim($data['course']);

// Validate email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

    http_response_code(400);

    echo json_encode([
        "message" => "Invalid email address"
    ]);

    exit;
}

// Insert student into database
$stmt = $conn->prepare(
    "INSERT INTO students
    (student_id, full_name, registration_number, email, course)
    VALUES (?, ?, ?, ?, ?)"
);

$stmt->bind_param(
    "sssss",
    $student_id,
    $full_name,
    $reg_number,
    $email,
    $course
);

if ($stmt->execute()) {

    http_response_code(201);

    echo json_encode([
        "message" => "Student registered successfully",
        "student_database_id" => $stmt->insert_id
    ]);

} else {

    http_response_code(409);

    echo json_encode([
        "message" => "Registration failed. Student ID, registration number or email may already exist."
    ]);

}

$stmt->close();

?>