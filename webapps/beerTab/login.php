<!-- Server Validation -->



<!-- Submit to server -->


<!-- Login UI -->
<form id='login' name='loginform' method='POST' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>'>
    <input name='username' value="<?= $username ?>">
    <div class='error'><?= $usernameErr ?></div>
    <input name='pwd' value="<?= $pwd ?>">
    <div class='error'><?= $pwdErr ?></div>
    <input type='submit' value='Login'>
</form>
<a href='welcome.php'>Admin Login</a>