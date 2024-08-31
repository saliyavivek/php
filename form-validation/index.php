<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $int=1234;
        if(!filter_var($int,FILTER_VALIDATE_INT))
        {
        echo "Integer is not valid";
        } else {
        echo "Integer is valid";
        }
    ?>
    <h2>Regular Expression</h2>
    <?php 
        $str = "I LIKE apple.";
        $pattern = "/like/i"; // i -> ignorecase
        echo preg_match($pattern, $str); // 1

    ?>
    <br />
    <?php
        $str = "It is an apple. I like apple";
        $pattern = "/apple/";
        echo preg_match_all($pattern, $str);
    ?>
    <br />
    <?php
        $str = " It is an apple. I like Apple ";
        $pattern = "/apple/i";
        echo preg_replace($pattern, "orange", $str);
    ?>
    <br />
    <?php
        $name = "vivek";
        if (!preg_match ("/^[a-zA-z]*$/", $name) ) {
        echo "Only alphabets and whitespace are allowed.";
        } else {
        echo $name;
        }
    ?>
    <br />
    <?php
        $mobileno = "8888888p88";
        if (!preg_match ("/^[0-9]*$/", $mobileno) ){
        echo "Only numeric value is allowed.";
        } else {
        echo $mobileno;
        }
    ?>
    <br />
    <?php
        $email = "abc@gmail.com";
        $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";
        if (!preg_match ($pattern, $email) ){
        echo "Email is not valid.";
        } else {
        echo "Your valid email address is: " .$email;
        }    
    ?>
    <br />
    <?php
        $mobileno = strlen("8888888888");

        $length = strlen ($mobileno);
        if ( $length < 10 && $length > 10) {
           echo "Mobile must have 10 digits.";
        } else {
            echo "Your Mobile number is of length: " .$mobileno;
        }
    ?>
</body>
</html>