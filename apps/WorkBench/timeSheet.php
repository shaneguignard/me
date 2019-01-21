<html>
<?php 
    
    $ref = $_POST["ref"];
    $refpwd = $_POST["refpwd"];
    $tk = $_POST["timekeeper"];
    $tkpwd = $_POST["timekeeperpwd"];
    $lightGoals = $_POST["lightGoals"];
    $darkGoals = $_POST["darkGoals"];
    $gameDate = $_POST["gameDate"];
    $playedAt = $_POST["playedAt"];
    $arrType = $_POST["type"];
    $arrTeam = $_POST["team"];
    $arrPeriod = $_POST["period"];
    $arrTime = $_POST["time"];
    $arrPlayer = $_POST["player"];
    $arrAssist = $_POST["assist"];

    if($tkpwd === '1234'){
        require_once('db.php');
    }
    else 
    {
        echo "Incorrect password";
    }
    
    ?>
<style>
    table {
        width: auto;
    }

</style>
<body>
    <h1>Results</h1>

    <br>
    <?php
    echo "<h3>$gameDate Summary</h3>";
    echo "$lightGaols - $darkGoals"
    ?>
    <table border=1>
        <tr>
            <th>date</th>
            <th>period</th>
            <th>team</th>
            <th>type</th>
            <th>player</th>
        </tr>
    <?php 
        
    //open file
    $fid = fopen('data/newGame.csv', 'w');
    $list = array('date', 'period', 'team','type','player');
    fputcsv($fid, $list);
    for($i = 0; $i < count($arrType); $i++){
        $gameEvent = $gameDate.' '.$arrTime[$i];
        echo "<tr><td>$gameEvent</td>";
        echo "<td>$arrPeriod[$i]</td>";
        echo "<td>$arrTeam[$i]</td>";
        echo "<td>$arrType[$i]</td>";
        echo "<td>$arrPlayer[$i]</td></tr>";
       
        $list = array($gameEvent, $arrPeriod[$i], $arrTeam[$i], $arrType[$i], $arrPlayer[$i]);
        
//        write backup to newGame.csv
        fputcsv($fid, $list);
        
        
//    insert into gamehistory SQL server
        $sql = "INSERT INTO games VALUES ('$gameEvent', '$arrPeriod[$i]', '$arrTeam[$i]', '$arrType[$i]', '$arrPlayer[$i]')";
        if($conn-> query($sql) != TRUE){
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    $msg = "<html><body><h1>Summary</h1>$gameDate</body></html>";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    if ($conn -> query ($sql) === TRUE){
	   mail("shaneguignard@gmail.com", "SQL Update", $msg, $headers);
	   echo "New Records Created";
    }
    
// close file and connection    
fclose($fid);
$conn->close();
?>

    </table>
    
    <a href='scoresheet.html'>New Game</a>
</body>

</html>
