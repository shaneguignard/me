<!-- Server Validation -->
<?php
// Load database variables, connect to server and select a database
include('db-conn.php');
session_start();
// Sanitize $_POST['myusername'] and $_POST['mypassword'] before loading into session variables to protect from MySQL injection
// $_SESSION["email"] = $_POST['email'] = '';
// $_SESSION["password"]=!empty($_POST['password'])?mysql_real_escape_string(stripslashes($_POST['password'])):"";
echo $_SESSION['email'];
echo $_SESSION['password'];



// Run query
echo "session password set: ".$_SESSION['password'];
// if(isset($_SESSION['password'])){
// $sql = "SELECT ID FROM Reps WHERE email='".$_SESSION["email"]."' AND password='".$_SESSION["password"]."'";
$sql = "Select * from Reps;";
echo "Session is set".$sql;
$result = $conn->query($sql);
if($result === FALSE){
    echo "<h1>Error with Games insert </h1>".$sql."<br>".$conn->error;
}
// Check for return of single record and direct to login_success.php
elseif($result->num_rows == 1){
    echo "<h1>Success</h1>";
    header("location:welcome.php");
}
else{
    // On login falier, unset session variables if not needed and redirect
    // unset($_SESSION["email"]); // Optional if return value not needed or wanted
    // unset($_SESSION["password"]); // Optional if return value not needed or wanted
    // header('refresh: 5; url=register.php');
    echo "<h1>Error with login</h1>".$sql."<br>".$conn->error;
    // die("Wrong Username or Password. Redirecting..."); // To prevent evil people manipulating the page, kill the script using die.
}


$emailErr = $pwdErr = $teamErr = $rateErr = $nameErr = '';

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (empty($_POST["email"])){
        $emailErr = "Email is required";
    }
    else {
        $_SESSION['email'] = test_input($_POST['email']);
    }
    if(empty($_POST['password'])){
        $pwdErr = "Password is required";
    }
    else{
        $_SESSION['password'] = test_input($_POST['password']);
    }
}
// }
?>
<!-- Login UI -->
<form id='login' name='loginform' method='POST' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>'>
    <input name='email' type='text' value="<?= $_SESSION['email']; ?>">
    <div class='error'><?= $emailErr; ?></div>
    <input name='password' type='password' value="<?= $_SESSION['password']; ?>">
    <div class='error'><?= $pwdErr; ?></div>
    <input type='submit' value='Login'>
</form>
<a href='register.php'>Create User</a>