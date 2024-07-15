<?php 
    $connect = mysqli_connect("localhost", "root", "", "db_cars");

    if(!$connect) {
        echo "Error while connecting to db";
    } else {
        echo "Connection Successful";
    }
?>