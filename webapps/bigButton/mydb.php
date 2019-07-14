<?php
// LOCALHOST
// $user = 'write';
// $pw = 'testpass';
// $db = 'bigButton';
// $host = '127.0.0.1';
// $port = 8889;


// AWS LIGHTSAIL
$user = "RW";
$pw = "pa&&word";
$host = "35.183.44.111";
$db = 'bigButton';

//$link = mysqli_init();
$conn = new mysqli(
    $host, 
    $user,
    $pw,
    $db, 
    $port
);

if(!$conn){
    echo "There was an issue connecting to the database";
}

?>