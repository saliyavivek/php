<!-- <?php 
    if(isset($_POST['btnlogin'])) {
        $email = $_POST['email'];
        $pass = $_POST['pass'];
    }
?> -->
<html>
    <head>
        <title>Home</title>
    </head>
    <body>
        <h2>Login</h2>
        <form action="welcome.php" method="POST">
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
                    <td>
                        <input type="submit" value="Login" name="btnlogin">
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>