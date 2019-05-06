<?php
    echo 'Successfully submitted to database: <br>';
    include('mydb.php');
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
    echo '<br>Location: '.$country;
     
    $insert = $conn->query("INSERT INTO `Events` values(CURRENT_TIMESTAMP, '$type', '$ip', '$device', '$country')");
    if($result === FALSE){
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    if ($result === TRUE){
        echo "New Records Created";
    }
    $conn -> close();
?>
<hr>
<a href='./Controller/index.php' >Return to button</a>