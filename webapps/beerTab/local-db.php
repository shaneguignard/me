<?php 

$user = 'root';
$password = 'root';
$host = 'localhost';
$port = 8889;
$db = 'drinkTracker';

$conn = new mysqli($host, $user, $password, $db, $port) or die('Error connecting to server: <br>'. mysqli_connect_error());


?>