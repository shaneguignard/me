<!-- Server Validation -->
<?php
// Load database variables, connect to server and select a database
include('local-db.php');
session_start();
$emailErr = $pwdErr = '';

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate Email
    if (empty($_POST["email"])){
        $emailErr = "Email is required";
    }
    else {
        $_SESSION['email'] = test_input($_POST['email']);
    }

    // Validate Password
    if(empty($_POST['password'])){
        $pwdErr = "Password is required";
    }
    else{
        $_SESSION['password'] = test_input($_POST['password']);

            // Validate Credentials
        if($_SESSION['password'] != '')
        {
            $sql = "SELECT * FROM drinkTracker.Users WHERE email='".$_SESSION['email']."' AND password='".$_SESSION['password']."'";
            $result = $conn->query($sql);
            echo "<br>".$sql; 
            echo "<br>ROWS: ".$result->num_rows;
            if($result->num_rows == 1){
                echo "<h1>Success</h1>";
                $_SESSION['user'] = $result->fetch_assoc();
                echo "<br>SESSION EMAIL: ".$_SESSION['email'];
                echo "<br>SESSION PASSWORD: ".$_SESSION['password'];
            }
            else{
                echo "<h1>Error with login</h1>".$sql."<br>".$conn->error;
            }
        }
        
    }

    
}

?>

<style>
    .error{
        color: red;
    }
    input{
        font-size: 14pt;
        background: inherit;
        width: 90%;
    }
    form{
        text-align: center;
        padding: 20px;
        display: block;
        background: lightblue;
        width: 40%;
        max-width: 250px;
        margin-left: auto;
        margin-right: auto;
        border-radius: 15px;
    }
</style>

<!-- Login UI -->

<form method='POST' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>'>
    <h1>Login</h1>
    <input name='email' type='text' value="<?= $_SESSION['email']; ?>" placeholder='Email'>
    <div class='error'><?= $emailErr; ?></div>
    <input name='password' type='password' placeholder='Password'>
    <div class='error'><?= $pwdErr; ?></div>
    <input type='submit' value='Login'>
    <a href='register.php'>Create User</a>
</form>
<br>
