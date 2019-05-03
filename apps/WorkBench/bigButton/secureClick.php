<?php

// $user = 'write';
// $pw = 'testpass';
// $db = 'bigButton';
// $host = '127.0.0.1';
// $port = 8889;

$user = "RW";
$pw = "pa&&word";
$host = "35.183.44.111";
$db = 'bigButton';

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

    $timeStamp = date('Y-m-d H:i:s');
    echo "<br>TimeStamp: ".$timeStamp;
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
    
    echo '<br>User IP '.getUserIpAddr();
    $type = $_POST['type'];
    echo "<br>Type: ".$type;
    $device = $_POST['device'];
    echo '<br>Device: '.$device;
    
    $geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$ip"));
    $country = $geo["geoplugin_countryName"];
    $city = $geo["geoplugin_city"];
    echo '<br>Location: '.$city.', '.$country;

}
else{
    echo "<br>There was an issue connecting to the database";
}
?>