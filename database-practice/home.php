<?php 
    session_start();

    if(!isset($_SESSION["username"])) {
        header("location: login.php");
    }
?>

<html>
    <head>
        <title>Cars | Home</title>
    </head>
    <body>
        <h3>
            Welcome <?php echo $_SESSION["username"]; ?>
            <a href="logout.php">Logout</a>
        </h3>
    </body>
</html>