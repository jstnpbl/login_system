<?php
$servername = "localhost";
$username = "root";  // Default XAMPP MySQL user
$password = "";      // Default XAMPP MySQL password (empty)
$dbname = "partner_login";  // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
