<?php 
    include("connect.php");
    session_start();

    if(isset($_SESSION["username"])) {
        header("location: home.php");
    }
    
    if(isset($_POST["btnlogin"])) {
        $email = $_POST["txtemail"];
        $password = $_POST["txtpassword"];
        $error = login($email, $password);
    }

    function login($email, $password) {
        global $connect;
        $select = "select * from tbl_registration where email='$email' and password='$password'";

        $_SESSION["username"] = $email;

        $result = mysqli_query($connect, $select);
        $count = mysqli_num_rows($result);

        if($count > 0) {
            header("location: home.php");
        } else {
            $error = "Either email or password is incorrect.";
            return $error;
        }
    }
?>

<html>
    <head>
        <title>Cars | Login</title>
    </head>
    <body>
        <h2>Login</h2>
        <?php 
            if(isset($error)) {
                echo "<p style='color: red;'>".$error."</p>";
            }
        ?>
        </p>
        <form method="POST">
            <table>
                <tr>
                    <td>Email</td>
                    <td><input type="text" name="txtemail"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="txtpassword"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        Don't have an account? <a href="register.php">Register</a>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Login" name="btnlogin">
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>