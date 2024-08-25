<?php 
    include("connect.php");

    session_start();

    if(isset($_SESSION["username"])) {
        header("location: home.php");
    }

    if(isset($_POST["btnregister"])) {
        if (empty($_POST["txtemail"])) {
            $validationEmailErrorMsg = "Email is required.";
        }
        if (empty($_POST["txtname"])) {
            $validationNameErrorMsg = "Name is required.";
        }
        if (empty($_POST["txtaddress"])) {
            $validationAddressErrorMsg = "Address is required.";
        }
        if (empty($_POST["txtpassword"])) {
            $validationPassErrorMsg = "Password is required.";
        } else {
            $name = $_POST["txtname"];
            $address = $_POST["txtaddress"];
            $email = $_POST["txtemail"];
            $password = $_POST["txtpassword"];
    
            $insert = "insert into tbl_registration values (0, '$name', '$email', '$password', '$address')";
            if(mysqli_query($connect, $insert)) {
                $success = "User registered successfully.";
                $_SESSION["username"] = $email;
                header("location: home.php");
            } else {
                $error = "Failed to register user.";
            }
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
                    <td>
                        <?php 
                            if(isset($validationNameErrorMsg)) {
                                echo "<p style='color: red;'>".$validationNameErrorMsg."</p>";
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>
                        <textarea name="txtaddress"></textarea>
                    </td>
                    <td>
                        <?php 
                            if(isset($validationAddressErrorMsg)) {
                                echo "<p style='color: red;'>".$validationAddressErrorMsg."</p>";
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="text" name="txtemail"></td>
                    <td>
                    <?php 
                         if(isset($validationEmailErrorMsg)) {
                            echo "<p style='color: red;'>".$validationEmailErrorMsg."</p>";
                        }
                    ?>
                    </td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="txtpassword"></td>
                    <td>
                        <?php 
                            if(isset($validationPassErrorMsg)) {
                                echo "<p style='color: red;'>".$validationPassErrorMsg."</p>";
                            }
                        ?>
                    </td>
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