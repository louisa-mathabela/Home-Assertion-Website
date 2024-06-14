<?php
$servername = "localhost";
$username = "root";
$password = "Australia@12";
$database = "home_assertion_ecommerce_website";


$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>
