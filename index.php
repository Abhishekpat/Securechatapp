<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form id="form1" method="post" action="UserLogin.php">
       <table>
            <tr>
                <td><input type="Email" name="UserMailLogin" placeholder="Enter yourr Email" required></td>
            </tr>

            <tr>
                <td><input type="password" name="UserPasswordLogin" placeholder="Enter your Password" required></td>
            </tr>

            <tr>
                <td><input type="submit" value="Login"></td>
            </tr>
        <?php
        if(isset($_GET['error'])){
        ?>

        
            <tr>
                <td></td><td><span style= "color:red;">Check your Email</span></td>
            </tr>
        <?php
            }
        ?>
    </table>
    </form>
</body>
</html>