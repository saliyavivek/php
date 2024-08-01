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
            Welcome <?php echo $_SESSION["username"]; ?> <br>
            <a href="logout.php">Logout</a> <br>
            <a href="addcar.php">Add new car</a>

            <h2>
                <?php
                    if(isset($_SESSION["msg"])) {
                        echo $_SESSION["msg"];
                        unset($_SESSION["msg"]);
                    }
                ?>
            </h2>
        </h3>
    </body>
</html>