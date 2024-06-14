<?php 


include 'connect.php';

// Ensure session is started
session_start();

if(isset($_POST['signUp'])){
    $firstName = $_POST['fName'];
    $lastName = $_POST['lName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Check if email already exists
    $stmt = $conn->prepare("SELECT * FROM site_user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        echo "Email Address Exists!";
    } else {
        // Insert new user
        $stmt = $conn->prepare("INSERT INTO site_user (firstName, lastName, email, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $firstName, $lastName, $email, $hashedPassword);
        if($stmt->execute()){
            echo "User registered successfully. Redirecting to sign in page...";
            header("Location: register.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
    }
}

if(isset($_POST['signIn'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Select user by email
    $stmt = $conn->prepare("SELECT * FROM site_user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        if(password_verify($password, $row['password'])){
            // Set session variables
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['email'] = $row['email'];
            header("Location: home.php");
            exit();
        } else {
            echo "Incorrect Email or Password";
        }
    } else {
        echo "Email Address Not Found";
    }
}

?>
