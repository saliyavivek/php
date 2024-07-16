<?php 
    include("connect.php");

    if(isset($_POST["btnregister"])) {
        $name = $_POST["txtname"];
        $address = $_POST["txtaddress"];
        $email = $_POST["txtemail"];
        $password = $_POST["txtpassword"];

        $insert = "insert into tbl_registration values (0, '$name', '$email', '$password', '$address')";
        if(mysqli_query($connect, $insert)) {
            $success = "User registered successfully.";
        } else {
            $error = "Failed to register user.";
        }
    }
?>

<html>
    <head>
        <title>Cars | Register</title>
    </head>
    <body>
        <h2>Register</h2>
        
        <?php 
            if(isset($success)) {
                echo "<p style='color: green;'>$success</p>";
            }
            if(isset($error)) {
                echo "<p style='color: red;'>$error</p>";
            }
        ?>
        </p>
        <form method="POST">
            <table>
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="txtname"></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>
                        <textarea name="txtaddress"></textarea>
                    </td>
                </tr>
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
                    <td>Already have an account? <a href="login.php">Login</a></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Register" name="btnregister">
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>