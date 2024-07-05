<!-- <?php
  $email = htmlspecialchars($_POST['email']);
  $pass  = htmlspecialchars($_POST['pass']);
?> -->

<html>
    <head>
        <title>Welcome</title>
    </head>
    <body>
        <h3>
            <?php echo "Welcome, ".$_POST['email'];?>
        </h3>
    </body>
</html>