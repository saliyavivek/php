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

        // 17-08-2024
        if (empty($_FILES['image']['name'])) {
            $folder = $_POST['txtfilename'];
        } else {
            if (isset($_POST['txtfilename'])) {
                unlink($_POST['txtfilename']);
            }
            $checkType = $_FILES['image']['type'];
            $correct = 0;
            if ($checkType == "image/jpeg" || $checkType == "image/jpg" || $checkType == "image/png") {
                $correct = 1;
            }
            $file_name = $_FILES['image']['name'];
            $tempname = $_FILES['image']['tmp_name'];
            $folder = './uploads/'.$file_name;
    }
        //
        
        if($correct !== 1) {
            $_SESSION["file_type_error"] = "Please upload images of type jpg, jpeg or png only.";
            return header("location: addcar.php");
        }

        if(isset($_GET['editId'])) {
            $query="update tbl_cars set car_name='$name', car_company='$company', launch_year=$year, car_image='$folder' where car_id=$_GET[editId]";
        } else {
            $query = "insert into tbl_cars values (0, '$name', '$company', $year, '$folder')";
        }
        if(mysqli_query($connect, $query)) {
            // $success = "Car added successfully.";
            
            // 17-08-2024
            if(move_uploaded_file($tempname, $folder)) {
                $_SESSION["upload_success"] = "File uploaded successfully.";
            } else {
                $_SESSION["upload_failure"] = "Error while uploading file.";
            }
            //
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
<form method="POST" enctype="multipart/form-data">
    <a href="home.php">&larr; Back</a>
    <h2>Add your car</h2>
    <p>
    <?php 
        if(isset($error)) {
            echo $error;      
        }
        
    ?>
    <p style="color: red">
        <?php 
            if(isset($_SESSION['file_type_error'])) {
                echo $_SESSION['file_type_error'];
                unset($_SESSION["file_type_error"]);
            }
        ?>
    </p>
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
                    <td>Upload Image:</td>
                    <td>
                        <?php
                        if (isset($_GET['editId'])) {
                            ?>
                            <input type="hidden" name="txtfilename" value="<?php echo $data['car_image'] ?>" />
                            <br /><img src="<?php echo $data['car_image'] ?>" width="100" height="100" />
                            <?php
                        }
                        ?>
                        <input type="file" name="image">
                </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="<?php if (isset($_GET['editId'])) {echo "Edit";} else {echo "Add";} ?>" name="btnadd">
                    </td>
                </tr>
            </table>
        </form>
</body>
</html>