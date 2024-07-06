<?php 
    function login ($email, $password) {
        if($email == "abc@gmail.com" && $password == "123") {
            header("location:home.php");
        } else {
            $error = "Email or Password is incorrect!";
            return $error;
        }
    }

    if(isset($_POST['btnlogin'])) {
        $error = login($_POST['email'], $_POST['pass']);
    }
?>
<html>
    <head>
        <title>UDF</title>
    </head>
    <body>
    <h2>Login</h2>
        <form method="POST">
            <table>
                <tr>
                    <td>Email</td>
                    <td><input type="text" name="email"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="pass"></td>
                </tr>
                <tr>
                    <td></td>
                    <td style="color: red;">
                    <?php
                    if(isset($error)) echo $error;
                ?>
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