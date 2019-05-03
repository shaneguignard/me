<?php

$user = 'write';
$pw = 'testpass';
$db = 'bigButton';
$host = '127.0.0.1';
$port = 8889;

$link = mysqli_init();
$success = mysqli_real_connect(
    $link, 
    $host, 
    $user,
    $pw,
    $db, 
    $port
);
if($success){
    echo "Successfully connected to database";

    // $timeStamp = $TIMESTAMP();
    function getUserIpAddr(){
        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
            //ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            //ip pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
    
    echo '<br>User Real IP '.getUserIpAddr();
    echo '<br>IP '.$_SERVER['REMOTE_ADDR'];
    $type = $_POST['type'];
    echo "<br>Type: ".$type;
    $device = $_POST['device'];
    echo '<br>Device: '.$device;
    // $country = $_POST['country'];
    
}
else{
    echo "<br>There was an issue connecting to the database";
}



?>