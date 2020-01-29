<!-- Server Validation -->
<?php

$emailErr = $pwdErr = '';

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
// Run query

if($_SESSION['password'] != ''){
    include('local-db.php');
    $sql = "SELECT * FROM Users WHERE email='".$_SESSION["email"]."' AND password='".$_SESSION["password"]."'";
    // $sql = "Select * from drinkTracker.Users;";

    // echo "Query: ".$sql."<br>";
    $result = $conn->query($sql);
    echo "Result: ".$result->num_rows;
    $row = $result->fetch_assoc();
    echo "Row: ".$row['email'];
    // if($result->num_rows == 1){
        echo "<h1>Success</h1>";        
        // include("welcome.php");
        // die;
    // }
    // else{
    //     // On login falier, unset session variables if not needed and redirect
    //     unset($_SESSION["email"]); // Optional if return value not needed or wanted
    //     unset($_SESSION["password"]); // Optional if return value not needed or wanted
    //     // header('refresh: 5; url=register.php');
    //     echo "<h1>Error with login</h1>".$sql."<br>".$conn->error;
    //     // die("Wrong Username or Password. Redirecting..."); // To prevent evil people manipulating the page, kill the script using die.
    // }
}
?>



<!-- Login UI -->
<form method='POST' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>'>
    <input name='email' type='text' value="<?= $_SESSION['email']; ?>">
    <div class='error'><?= $emailErr; ?></div>
    <input name='password' type='password' value="<?= $_SESSION['password']; ?>">
    <div class='error'><?= $pwdErr; ?></div>
    <input type='submit' value='Login'>
</form>
<a href='register.php'>Create User</a>