<?php
    include("connect.php");

    session_start();

    if(!isset($_SESSION["username"])) {
        header("location: login.php");
    }

    if(isset($_GET["editId"])) {
        $select = "select * from tbl_cars where car_id=$_GET[editId]";
        $result = mysqli_query($connect, $select);
        $data = mysqli_fetch_assoc($result);
    }

    if(isset($_POST["btnadd"])) {
        $name = $_POST["txtcarname"];
        $company = $_POST["txtcarcompany"];
        $year = $_POST["txtlaunchyear"];

        if(isset($_GET['editId'])) {
            $query="update tbl_cars set car_name='$name', car_company='$company', launch_year=$year where car_id=$_GET[editId]";
        } else {
            $query = "insert into tbl_cars values (0, '$name', '$company', $year)";
        }
        if(mysqli_query($connect, $query)) {
            // $success = "Car added successfully.";
            $_SESSION["msg"] = "Success.";
            header("location: home.php");
        } else {
            $error = "Failure.";
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
                    <td><input type="text" name="txtcarname" value="<?php if(isset($_GET['editId'])) echo $data['car_name'] ?>"/></td>
                </tr>
                <tr>
                    <td>Car Company:</td>
                    <td>
                        <input type="text" name="txtcarcompany" value="<?php if(isset($_GET['editId'])) echo $data['car_company'] ?>"/>
                    </td>
                </tr>
                <tr>
                    <td>Launch Year:</td>
                    <td><input type="text" name="txtlaunchyear" value="<?php if(isset($_GET['editId'])) echo $data['launch_year'] ?>"/></td>
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