<?php

session_start();

$_SESSION['username'] = "admin";

echo "Session created successfully!";

echo "<br>";

echo "Logged in as: " . $_SESSION['username'];

?>