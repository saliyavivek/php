<?php 
if(isset($_POST['btnsubmit'])) {
    $name = $_POST['txtname'];
    $surname = $_POST['txtsurname'];
    $result = $name." ".$surname;
}
?>

<html>
    <head>
        <title>First App</title>
    </head>
    <body>
        <form method="POST" >
            <table>
                <tr>
                    <td>
                        <label>Name: </label>
                    </td>
                    <td>
                        <input type="text" name="txtname" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Sur-name: </label>
                    </td>
                    <td>
                        <input type="text" name="txtsurname" />
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Submit" name="btnsubmit"/>
                    </td>
                </tr>
            </table>
            <?php if(isset($result)) echo $result; ?>
        </form>
    </body>
</html>