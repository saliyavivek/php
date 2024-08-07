<?php 
    include("connect.php");
    session_start();

    if(!isset($_SESSION["username"])) {
        header("location: login.php");
    }

    if(isset($_GET["deleteId"])) {
        $delete = "delete from tbl_cars where car_id=$_GET[deleteId]";
        if(mysqli_query($connect, $delete)) {
            $deleteMsg = "Record deleted successfully.";
        } else {
           echo mysqli_error($connect);
        }
    }
?>

<html>
    <head>
        <title>Cars | Home</title>
    </head>
    <body>
        <h3>
            Welcome <?php echo $_SESSION["username"]; ?> <br>
            <a href="logout.php">Logout</a> <br>
            <a href="addcar.php">Add new car</a>

            <h2>
                <?php
                    if(isset($_SESSION["msg"])) {
                        echo $_SESSION["msg"];
                        unset($_SESSION["msg"]);
                    }
                    if(isset($deleteMsg)) {
                        echo $deleteMsg;
                        unset($deleteMsg);
                    }
                ?>
            </h2>
            <table border="1">
                    <tr>
                        <th>No.</th>
                        <th>Car Name</th>
                        <th>Company</th>
                        <th>Launch Year</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    <?php 
                        $counter = 1;
                        $select = "select * from tbl_cars order by car_id desc";
                        $result = mysqli_query($connect, $select);
                        while($data = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?php echo $counter; ?></td>
                        <td><?php echo $data['car_name']; ?></td>
                        <td><?php echo $data['car_company']; ?></td>
                        <td><?php echo $data['launch_year']; ?></td>
                        <td><a href="">edit</a></td>
                        <td><a href="home.php?deleteId=<?php echo $data['car_id']; ?>" onclick="return confirm('Are you sure you want to delete this record?');">delete</a></td>
                    </tr>
                    <?php        
                    $counter++;   
                    }
                    ?>
            </table>
        </h3>
    </body>
</html>