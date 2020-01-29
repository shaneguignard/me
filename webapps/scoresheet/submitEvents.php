
<?php 
    
    $ref = $_POST["ref"];
    $refpwd = $_POST["refpwd"];
    $tk = $_POST["timekeeper"];
    // $tkpwd = $_POST["timekeeperpwd"];
    $tkpwd = $timekeeperpwd;
    $lightGoals = $_POST["lightGoals"];
    $lightTeam = $_POST["lightTeam"];
    $darkGoals = $_POST["darkGoals"];
    $darkTeam = $_POST["darkTeam"];
    $gameDate = $_POST["gameDate"];
    $gameTime = $_POST["gameTime"];
    $playedAt = $_POST["playedAt"];
    $arrType = $_POST["type"];
    $arrTeam = $_POST["team"];
    $arrPeriod = $_POST["period"];
    $arrPlayer = $_POST["player"];
    $arrSide = $_POST["side"];
    $arrNum = $_POST['number'];
 
    if($tkpwd === '1234'){
        require_once('history-mysql.php');
    }
    else 
    {
        echo "Incorrect Password";
        echo $tkpwd;
    }
    
    // Shutout Condition
    if ($lightGoals == 0){
        // array_push($gameTime, $gameTime);
        array_push($arrTeam, $lightTeam);
        array_push($arrType, '');
        array_push($arrPlayer, '');
        array_push($arrNum, 0);
    }
    if ($darkGoals == 0){
        array_push($arrTeam, $darkTeam);
        array_push($arrType, '');
        array_push($arrPlayer, '');
        array_push($arrNum, 0);
    }
        ?>
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
    echo "<h3>$gameDate Summary</h3>";
    echo "<h2>$lightTeam vs $darkTeam</h2>";
    echo "<h4>$lightGoals - $darkGoals</h4>";
    ?>
    <table border=1>
        <tr>
            <th>date</th>
            <th>team</th>
            <th>type</th>
            <th>player</th>
        </tr>

        <?php

        for($i = 0; $i < count($arrType); $i++){
            // insert into history.events SQL database
            $sql = "INSERT INTO `Events`(date, team, type, player, period, timekeeper, timekeeper_pw, ref, number) VALUES ('$gameEvent', '$arrTeam[$i]', '$arrType[$i]', '$arrPlayer[$i]', 0, '$tk', '$tkpwd','$ref', '$arrNum[$i]')";
            // For Debugging
            // echo "<tr><td colspan='4'>".$sql."</td></tr>";
            $gameEvent = $gameDate.' '.$gameTime;
            echo "<tr><td>$gameEvent</td>";
            echo "<td>$arrTeam[$i]</td>";
            echo "<td>$arrType[$i]</td>";
            echo "<td>$arrPlayer[$i]</td></tr>";
            
            $result = $conn->query($sql);
        }
        
    // header("Location: timeSheet.php");

    ?>
    </table>
    
    <a href='scoresheet.php'>New Game</a>