<?php
session_start();

if (!isset($_SESSION['user'])) {
  
    header('Location: login.php');
    exit();
}

if (isset($_GET['logout'])) {
    
    session_unset();
    session_destroy();
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html>

<body>
    <h1>Welcome <?php echo ($_SESSION['user'])?></h1>
    
    
    <form action="welcome.php" method="GET">
        <input type="hidden" name="logout" value="true">
        <input type="submit" value="Logout">
    </form>
</body>
</html>

