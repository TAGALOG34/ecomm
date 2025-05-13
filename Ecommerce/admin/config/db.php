<?php
// Database connection (adjust as needed)
$conn = new mysqli("localhost", "root", "", "cyberzone");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



?>