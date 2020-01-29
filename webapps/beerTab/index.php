<?php
// Sanitize $_POST['myusername'] and $_POST['mypassword'] before loading into session variables to protect from MySQL injection
$_SESSION["email"] = $_POST['email'] = '';
$_SESSION["password"]=!empty($_POST['password'])?mysql_real_escape_string(stripslashes($_POST['password'])):"";
session_start();
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Login</title>
        <!-- Add meta tags that format for mobile -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <?php include('login.php'); ?>
        <?php include('footer.php'); ?>
    </body>
</html>
