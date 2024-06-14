<?php
$servername = "localhost";
$username = "root";
$password = "Australia@12";
$database = "home_assertion_ecommerce_website";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
