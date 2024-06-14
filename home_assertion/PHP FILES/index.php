<?php
session_start();

include 'connect.php';
include 'authenticate.php';

// Check if the user is already logged in
if (isset($_SESSION['site_user'])) {
    header("Location: home.php");
    exit;
}

if (isset($_POST['signIn'])) {
    // Authenticate user
    $email = $_POST['email'];
    $password = $_POST['password'];
    $authenticated_user = authenticateUser($email, $password);

    if ($authenticated_user) {
        $_SESSION['site_user'] = $authenticated_user['site_user']; // Assuming 'site_user' is the column name in the database
        $_SESSION['email_address'] = $authenticated_user['email_address']; // Assuming 'email_address' is the column name in the database
        // Debugging output
        echo "Authentication successful. Redirecting to home page...";
        header("Location: home.php");
        exit;
    } else {
        echo "Authentication failed. Please check your email and password.";
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register & Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Aboreto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container" id="signup" style="display: none;">
        <img src="HOME ASSERTION.jpg" alt="Store Logo">
        <h1 class="form-title">Register</h1>
        <form method="post" action="register.php">
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" name="fName" id="fName" placeholder="First Name" required>
            </div>
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" name="lName" id="lName" placeholder="Last Name" required>
            </div>
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" id="email" placeholder="Email Address" required>
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" id="password" placeholder="Password" required>
            </div>
            <input type="submit" class="btn" value="Sign Up" name="signUp">
        </form>
        <p class="or">----------or----------</p>
        <div class="icons">
            <i class="fab fa-google"></i>
            <i class="fab fa-facebook"></i>
        </div>
        <div class="links">
            <p>Already Have An Account?
                <button id="signInButton">Sign In</button>
            </p>
        </div>
    </div>

    <div class="container" id="signIn">
        <img src="HOME ASSERTION.jpg" alt="Store Logo">
        <h1 class="form-title">Sign In</h1>
        <form method="post" action="register.php">
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" id="email" placeholder="Email" required>
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" id="password" placeholder="Password" required>
            </div>
            <p class="recover"><a href="#">Recover Password</a></p>
            <a href="home.php> <input type="submit" class="btn" value="Sign In" name="signIn"></a>
        </form>
        <p class="or">----------or----------</p>
        <div class="icons">
            <i class="fab fa-google"></i>
            <i class="fab fa-facebook"></i>
        </div>
        <div class="links">
            <p>Don't have account yet?
                <button id="signUpButton">Sign Up</button>
            </p>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const signUpButton = document.getElementById("signUpButton");
            const signInButton = document.getElementById("signInButton");
            const signInContainer = document.getElementById("signIn");
            const signUpContainer = document.getElementById("signup");
    
            signUpButton.addEventListener("click", function(event) {
                event.preventDefault();
                signInContainer.style.display = "none";
                signUpContainer.style.display = "block";
            });
    
            signInButton.addEventListener("click", function(event) {
                event.preventDefault();
                signInContainer.style.display = "block";
                signUpContainer.style.display = "none";
            });
        });
    </script>
</body>
</html>
