<?php
     session_start();
     $_SESSION["email"] = $_POST['email'] = '';
     $_SESSION["password"]=!empty($_POST['password'])?mysql_real_escape_string(stripslashes($_POST['password'])):"";
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Login</title>
        <!-- Add meta tags that format for mobile -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
    <h1>Landing Page</h1>
    <a href='login.php'>Login</a>
    </body>
</html>
