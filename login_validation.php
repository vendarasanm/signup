<?php
session_start();

include('database.php');

if (isset($_SESSION['user'])) {
    
    header('Location: welcome.php');
    exit();
}

if (isset($_POST['submit'])) {
    if(empty($_POST['user'])){
        echo "username is required";
    }
    else{
    }
    if(empty($_POST['pass'])){
    echo "<br>password is required";
    }
    else{
    }
    
    if(!empty($_POST['user']) && (!empty($_POST['pass']))) {
    
    $username = $_POST['user'];
    $password = md5($_POST['pass']);

    
    $query = mysqli_query($con, "SELECT name, password FROM login_table WHERE name='" . $username . "' AND password='" . $password . "'");
    $numrows = mysqli_num_rows($query);

    if ($numrows > 0) {
        $_SESSION['user'] = $username;
        header('Location: welcome.php');
        exit();
    } 
    else {
        $error = "Invalid username or password.";
    }
}
}
?>
