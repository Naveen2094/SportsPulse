<?php
$host = "localhost";  // Change if necessary
$username = "root";   // Default XAMPP username
$password = "";       // Default XAMPP password (empty)
$database = "SportsPulse"; // Change to your actual DB name

$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
