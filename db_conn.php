<?php
$servername = "localhost"; // Server name
$username = "root";        // Your MySQL username
$password = "";            // Your MySQL password
$dbname = "senior_db"; // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
