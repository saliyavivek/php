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

    if(isset($_POST["btnedit"])) {
        $name = $_POST["txtcarname"];
        $company = $_POST["txtcarcompany"];
        $year = $_POST["txtlaunchyear"];

        $update="update tbl_cars set car_name='$name', car_company='$company', launch_year=$year where car_id=$_GET[editId]";
        if(mysqli_query($connect, $update)) {
            $_SESSION["updateMsg"] = "Car Updated successfully.";
            header("location: home.php");
        } else {
            $error = "Failed to update car.";
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
                    <td><input type="text" name="txtcarname" value="<?php echo $data['car_name'] ?>"/></td>
                </tr>
                <tr>
                    <td>Car Company:</td>
                    <td>
                        <input type="text" name="txtcarcompany" value="<?php echo $data['car_company'] ?>"/>
                    </td>
                </tr>
                <tr>
                    <td>Launch Year:</td>
                    <td><input type="text" name="txtlaunchyear" value="<?php echo $data['launch_year'] ?>"/></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Edit" name="btnedit">
                    </td>
                </tr>
            </table>
        </form>
</body>
</html>