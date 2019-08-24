<?php
// Housing Registry on AWS Lightsail
$user = "yvha";
$pw = "betterhousingforeveryone";
$host = "35.183.44.111";
$db = 'housingRegistry';

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