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
        <h2>Login Form</h2>
        <table>
        <input type="Email" name="UserMailLogin" placeholder="Email" required>
        <input type="password" name="UserPasswordLogin" placeholder="Password" required>
        <input type="submit" value="Login">
        <?php
        if(isset($_GET['error'])){
        ?>

        
            <tr>
                <td></td><td><span >Check your Email</span></td>
            </tr>
        <?php
            }
        ?>
    </table>
    </form>
</body>
</html>