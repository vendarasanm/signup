<?php
session_start();

include('database.php');



if (isset($_POST['submit'])) {
    if(empty($_POST['username']) && (empty($_POST['password'])) && (empty($_POST['email'])) && (empty($_POST['mobile']))){
        echo "All fields are required";
    }
    else{
    if(empty($_POST['username'])){
        echo "<br>username is required";
    }
    else{
    }
    if(empty($_POST['password'])){
    echo "<br>password is required";
    }
    else{}
    if(empty($_POST['email'])){
        echo "<br>email is required";
    }
    else{}
    if(empty($_POST['mobile'])){
        echo "<br>mobile is required";
    }
    else{}
}
    }

    
    if(!empty($_POST['username']) && (!empty($_POST['password'])) && (!empty($_POST['email'])) && (!empty($_POST['mobile']))) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $email    = $_POST['email'];
    $mobile   = $_POST['mobile'];

    
    $Query = mysqli_query($con, "SELECT name FROM login_table WHERE name='" . $username . "'");
    if (mysqli_num_rows($Query) > 0) {
        $error = "Username already exists. Please choose a different username.";
    } else {

        $encrytedpassword=md5($password );
        
        $insertQuery = "INSERT INTO login_table (name, password, email, mobile) VALUES ('$username', '$encrytedpassword','$email','$mobile')";
        if (mysqli_query($con, $insertQuery)) {
            
            header('Location: login.php');
            exit();
        } else {
            $error = "Error: " . mysqli_error($con);
        }
    }
}

?>
