<?php 
include 'connect.php';

if(isset($_POST['signUp'])){
    $firstName = $_POST['fName'];
    $lastName = $_POST['lName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $checkEmail = "SELECT * FROM site_user WHERE email='$email'";
    $result = $conn->query($checkEmail);
    if($result->num_rows > 0){
        echo "Email Address Exists!";
    }
    else{
        $insertQuery = "INSERT INTO site_user (firstName, lastName, email, password)
                        VALUES ('$firstName', '$lastName', '$email', '$hashedPassword')";
        if($conn->query($insertQuery) === TRUE){
            
            header("location: index.php?signUpSubmitted=true");
            exit();
        }
        else{
            echo "Error: " . $conn->error;
        }
    }
}

if(isset($_POST['signIn'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM site_user WHERE email='$email'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        if(password_verify($password, $row['password'])){
            session_start();
            
            header("Location: home.php");
            exit();
        }
        else{
            echo "Incorrect Email or Password";
        }
    }
    else{
        echo "Email Address Not Found";
    }
}
?>
