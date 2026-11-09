<?php
$name="Derrick Barasa";
$age="50";
$registration_number="SOKODE2311";
$Course="Software Engineering";

echo "Student:" . $name . $age;
echo "<br>";
echo"";
echo"registration_number:" .$registration_number;
echo"<br>";
echo"course:" .$Course;
echo "<br>";
$student=array(
    "name" => $name,
    "age" => $age,
    "registration_number" => $registration_number,
    "Course" => $Course
);
echo $student["name"];



?>