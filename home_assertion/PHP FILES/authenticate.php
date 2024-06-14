<?php
include_once 'connect.php';

// Function to authenticate user
function authenticateUser($email, $password) {
    global $conn;

    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    $hashed_password = md5($password); 

    $query = "SELECT * FROM site_user WHERE email_address = '$email' AND password = '$hashed_password'";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        return true;
    } else {
        return false;
    }
}

$email = $_POST['email'];
$password = $_POST['password'];

if (authenticateUser($email, $password)) {
    header("Location: home.php");
    exit();
} else {
    header("Location: index.php?error=invalid_credentials");
    exit();
}
?>
