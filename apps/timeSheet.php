<html>
<?php 
    require_once('db.php');
    
    $ref = $_POST["ref"];
    $tk = $_POST["timekeeper"];
    $gameDate = $_POST["gameDate"];
    $playedAt = $_POST["playedAt"];
    $arrType = $_POST["type"];
    $arrTeam = $_POST["team"];
    $arrPeriod = $_POST["period"];
    $arrTime = $_POST["time"];
    $arrPlayer = $_POST["player"];
    $arrAssist = $_POST["assist"];

    ?>
<style>
    table {
        width: auto;
    }

</style>
<!--Email Body-->
<!--$msg = "-->

<body>
    <h1>Results</h1>
   
    <br>
     <?php
    echo "<h3>$gameDate Summary</h3>"?>
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
    for($i = 0; $i < count($arrType); $i++)
    {
        
        $gameEvent = $gameDate.' '.$arrTime[$i];
        
        echo "<tr><td>$gameEvent</td>";
        echo "<td>$arrPeriod[$i]</td>";
        echo "<td>$arrTeam[$i]</td>";
        echo "<td>$arrType[$i]</td>";
        echo "<td>$arrPlayer[$i]</td></tr>";
//        echo "<td>$arrAssist[$i]</td></tr>";
        
//        end of message variable
       
        $list = array($gameEvent, $arrPeriod[$i], $arrTeam[$i], $arrType[$i], $arrPlayer[$i]);
        
//        write to newGame.csv
        fputcsv($fid, $list);
        
        
//    insert into gamehistory SQL server
    $sql = "INSERT INTO games VALUES ('$gameEvent', '$arrPeriod[$i]', '$arrTeam[$i]', '$arrType[$i]', '$arrPlayer[$i]')";
    if($conn-> query($sql) !== TRUE) 
	{
	echo "Error: " . $sql . "<br>" . $conn->error;
	}
 }
if ($conn -> query ($sql) === TRUE){
	mail("shaneguignard@gmail.com", "SQL Update", "Games History has been updated", $headers);
	echo "New Records Created";
}
        
        // Email example
    $msg = "<html><body><h1>Summary</h1>$gameDate</body></html>";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        
    // Send email
   // mail("shaneguignard@gmail.com", "Test Email", $msg, $headers);
        
// close file and connection    
fclose($fid);
$conn->close();
    ?>
        
    </table>
</body>

</html>
