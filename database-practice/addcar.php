<?php
    include("connect.php");

    session_start();

    if(!isset($_SESSION["username"])) {
        header("location: login.php");
    }

    if(isset($_POST["btnadd"])) {
        $name = $_POST["txtcarname"];
        $company = $_POST["txtcarcompany"];
        $year = $_POST["txtlaunchyear"];

        $insert = "insert into tbl_cars values (0, '$name', '$company', $year)";
        if(mysqli_query($connect, $insert)) {
            // $success = "Car added successfully.";
            $_SESSION["msg"] = "Car added successfully.";
            header("location: home.php");
        } else {
            $error = "Failed to add car.";
        }
    }
?>

<html>
<head>
    <title>Add Car</title>
</head>
<body>
<form method="POST">
    <a href="home.php">&larr; Back</a>
    <h2>Add your car</h2>
    <p>
    <?php 
        if(isset($error)) {
            echo $error;      
        }
    ?>
    </p>
            <table>
                <tr>
                    <td>Car Name:</td>
                    <td><input type="text" name="txtcarname" /></td>
                </tr>
                <tr>
                    <td>Car Company:</td>
                    <td>
                        <input type="text" name="txtcarcompany" />
                    </td>
                </tr>
                <tr>
                    <td>Launch Year:</td>
                    <td><input type="text" name="txtlaunchyear" /></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Add" name="btnadd">
                    </td>
                </tr>
            </table>
        </form>
</body>
</html>