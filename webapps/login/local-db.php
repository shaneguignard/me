<?php 

$user = 'root';
$password = 'root';
$host = 'localhost';
$port = 8889;
$db = 'drinkTracker';

$conn = new mysqli($host, $user, $password, $db, $port);
if($conn){
    echo "Connection Succesful!";
}
else{
    die('Error connecting to server: <br>'. mysqli_connect_error());
}

?>