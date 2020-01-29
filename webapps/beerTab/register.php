<style>
input{
    display: block;
}

</style>

<?php
// Server Validation
include('local-db.php');
// include('db-conn.php');


$email = $_POST['email'] = $emailErr = $emailReq = '';
$password = $_POST['password'] = $pwdErr = $pwdReq = '';

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
        $email = test_input($_POST['email']);
    }
    if(empty($_POST['password'])){
        $pwdErr = "Password is required";
    }
    else{
        $password = test_input($_POST['password']);
        if($password != ''){
            $sql = "insert into Users (email, password) values ('".$email."', '".$password."')";
            echo "Query: ".$sql."<br>";
            $result = $conn->query($sql);
            
            $sql = "Select * from drinkTracker.Users where email='".$email."' and password='".$password."';";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo $result->fetch_assoc()['id'];
            }
        }
    }
}




?> 

<h1>Register</h1>
<form id='register' method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
<input name='email' type='text' placeholder='Email Address' value="<?php echo $email?>">
<input name='password' type='password' placeholder='Password'>
<input type='submit' value='Submit'>
</form>