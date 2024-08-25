<?php 
    $file = "data.txt";
    if(file_exists($file)) {
        // $content = readfile($file); // no need to open the file


        $handle = fopen($file, "r");
        // Read specified characters from the file -->
        // echo fread($handle, 4);


        // Read single line from the file -->
        // echo fgets($handle);


        // while(!feof($handle)) {
        //     echo fgets($handle)."<br/>";
        // }

        // $writeFile = fopen($file, "w");
        // $txt = "HelloWorld";
        // fwrite($writeFile, $txt);
        // echo fgets($handle);

        fclose($handle);
    } else {
        echo "Error: File doesn't exists";
    }

    $dir = "testdir";
    if(!file_exists($dir)){ 
        if(mkdir($dir)) {
            echo "Directory created successfully."; 
        } else {
            echo "ERROR: Directory could not be created.";
        }
    } else {
        echo "ERROR: Directory already exists.";
    }

    $sourceFile = "data.txt";
    $destFile = "testdir/data.txt";

    if(file_exists($sourceFile)) {
        if(copy($sourceFile, $destFile)) {
            echo "File copied successfully.";
        } else {
            echo "Error: File couldn't be copied.";
        }
    } else {
        echo "Error: File does not exist.";
    }

?>
<html>
<head>
    <title>Document</title>
</head>
<body>
    <h2>Hello World!</h2>
</body>
</html>