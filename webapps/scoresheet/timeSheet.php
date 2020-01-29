<html>

<style>
    table {
        width: auto;
    }

</style>
<body>
    <h1>Results</h1>

    <br>
    <?php
    
    echo $reach;
    echo "<h3>$gameDate Summary</h3>";
    echo "<h2>$lightTeam vs $darkTeam</h2>";
    echo "<h4>$lightGoals - $darkGoals</h4>";
    ?>
    <h5>Summary</h5>
    <table border=1>
        <tr>
            <th>date</th>
            <th>team</th>
            <th>type</th>
            <th>player</th>
        </tr>
    <?php 

    for($i = 0; $i < count($arrType); $i++){
        
        $gameEvent = $gameDate.' '.$gameTime[$i];
        echo "<tr><td>$gameEvent</td>";
        echo "<td>$arrTeam[$i]</td>";
        echo "<td>$arrType[$i]</td>";
        echo "<td>$arrPlayer[$i]</td></tr>";
    }
 
    $msg = "<html><body><h1>Summary</h1>$gameDate</body></html>";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $confirmationLink = "creemoresnhl.com/confirmation.php";
    if($result === FALSE){
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    if ($result === TRUE){
	   mail("shaneguignard@gmail.com", "SQL Update", $msg, $headers);
	   echo "New Records Created";
    }
    
// close file and connection    
        $conn->close();
        ?>
    </table>
    
    <a href='scoresheet.php'>New Game</a>
</body>

</html>
