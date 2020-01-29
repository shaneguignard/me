<html>
<?php include('form-validation.php'); ?>
<head>
    <title>Score Sheet</title>
    <style>
        .error{
            color: red;
        }
        table, input{
            width: 100%;
        }
        h1,
        h2,
        h3 {
            text-align: center;
        }
        
        body {
            position: relative;
            margin-left: auto;
            margin-right: auto;
        }
        input[type=text],
        input[type=password] {
            border-top: none;
            border-left: none;
            border-right: none;
            padding: 10px;
        }
        
        #lightScore, #darkScore{
            text-align: center;
            font-size: 40pt;
            height: auto;
            border: none;
            
        }
        #lightTeamName, #darkTeamName {
            border:0px;
            
        }
        select{
            font-size: 14pt;
            color: black;
            border: lightblue;
            width: 100%;
            height: auto;
        }
        input[type=button], input[type=submit] {
            height: 40px;
            background: lightgrey;
            border:1px solid grey;
            border-radius: 5px;
            
        }
        input[type=submit]{
            font-weight: 900;
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 75%;
            height: 35px;

        }
        input[type=point]{
            width:auto;
        }
    
        @media screen and (max-width: 800px){
            /* tablet devices */
            html, input, #lightScore, #darkScore,input[type='button'], select, option, input[type='submit']{
                color:white;
                background:#225D7A;
            }
        }

        @media screen and (max-width: 400px){
            /* handheld devices */
            html, input, #lightScore, #darkScore,input[type='button'], select, option, input[type='submit']{ 
                background: black;
                color:white;
                }
            input[type='text'], input[type='password']{
                height:25px;
            }
        }

    </style>
</head>

<body>
  
<form id='form' method='POST' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>'>
<h1>Creemore Sunday Night Hockey</h1> 
    <table>
        <tr>
            <td>
                <input id='lightScore' type='text' name="lightGoals" value='0'>
            </td>
            <td>
                <input id='darkScore' type='text' name="darkGoals" value='0'>
            </td>
        </tr>
        <tr>
            <td>
                <input type="text" name="playedAt" placeholder="Area" value="<?= $playedAt; ?>">
                <span class='error'><?= $playedAtErr; ?></span>
            </td>
            <td>
                <input type="text" name="ref" placeholder="<?= $refErr; ?>">
            </td>
        </tr>
        <tr>
            <td>
                <input type='text' name="gameTime" placeholder="Time" value="<?= $gameTime; ?>">
                <span class='error'><?= $gameTimeErr; ?></span>  
            </td>
            <td>
                <input type="text" name="timekeeper" placeholder="TimeKeeper" value="<?= $timekeeper; ?>" onchange="<?= $playedAt = ''; ?>">
                <span class='error'><?= $timekeeperErr; ?></span>
            </td>
        </tr>
        <tr>
            <td>
                <input type="text" name="gameDate" value ="<?=$gameDate; ?>"read-only>
                <span class='error'><?= $gameDateErr; ?></span>
            </td>
            <td>
                <input type="password" name="timekeeperpwd" placeholder="Password">
                <span class='error'><?= $timekeeperpwdErr; ?></span>             
            </td>
        </tr>
        <tr>
            <td>
                <select id="light" name='lightTeam' onchange="update();"></select>
            </td>
            <td>
                <select id="dark" name='darkTeam' onchange="update();"></select>
            </td>
        </tr>
        <tr>
            <td id='lights' >
                <select id='lightplayers'></select>
                
            </td>
            <td id='darks' >
                <select id='darkplayers'></select>
                
            </td>
        </tr>
        <tr>
            <td> 
                <input type='button' value="Assist" onclick="add('light', 'Assist', light.value, lightplayers.value)">
            </td>
            <td> 
                <input type='button' value="Assist" onclick="add('dark', 'Assist', dark.value, darkplayers.value)">
            </td>
        </tr>
        <tr>        
            <td>
                <input type='button' value="Penalty" onclick="add('light', 'Penalty', light.value, lightplayers.value)">
            </td>
            <td>    
                <input type='button' value="Penalty" onclick="add('dark', 'Penalty', dark.value, darkplayers.value)">
            </td>
        </tr>
        <tr>
            <td>
                <input type='button' value="Goal" onclick="add('light', 'Goal', light.value, lightplayers.value)">
            </td>
            <td>
                <input type='button' value="Goal" onclick="add('dark', 'Goal', dark.value, darkplayers.value)">
            </td>
            
        </tr>

    </table>
 
    <h3>Summary</h3>

    <hr>
    <table id='summary' border=1>
        <tr>
            <!-- <th>Time (mm:ss)</th> -->
            <!--<th>Period</th>-->
            <th>Game Time</th>
            <th>Type</th>
            <th>Team</th>
            <th>Number</th>
            <th>Player</th>
        </tr>
        <tbody id="records">
        </tbody>
    </table> 
        <!-- 
        <input id='undo' type='button' onclick="myUndo();" value='Undo'>
        Bugs: Undo does not currently subtract from Goals and Shots totals displayed here. -->
       
        <input type="submit" value="End Game" style="margin-top:10px;">
    </form>
</body>

<script>

    var row = 0; //defines row for delete function
    var d = new Date();
    var dd = d.getDate();
    var mm = d.getMonth()+1;
    var yyyy = d.getFullYear();
    var x = document.getElementsByName('gameDate')[0];
    x.value = yyyy + '-' + mm + '-' + dd;
    var gamehour = d.getHours();
    if (gamehour > 12){
        gamehour = gamehour-12 + ":00:00";
    }
    document.getElementsByName('gameTime')[0].value = gamehour;
    var points = [];
    var lightShots = 0;
    var lightGoals = 0;
    var darkShots = 0;
    var darkGoals = 0;
    var id = 0;

    var darkteams = document.getElementById('dark');
    var lightteams = document.getElementById('light');
    var lightType = document.getElementById('lighttype');
    var lightPlayer = document.getElementById('lightplayers');
    var darkType = document.getElementById('darktype');
    var darkPlayer = document.getElementById('darkplayers');


    var record = document.getElementById("records");
    var sides = ['light', 'dark'];

    // Populate arrays of Players by team
     // Create team and player arrays from sql query
     <?php

    include('history-mysql.php');
    $sql = "SELECT DISTINCT team FROM Teams ORDER BY team ASC";
    $result = $conn->query($sql);

    $dbdata = [];
    if ($result->num_rows > 0) {
    // output data of each row
        while($row = $result->fetch_assoc()) {
            $teams[] = $row;
        }  
        echo "var teams = ".json_encode($teams).";";
    }
    else {
        echo "alert('problem loading teams');";
    }
    // Pull out any players that were registered since 2019 (auto populate on registration)
    $sql = "SELECT name, team, number FROM history.Players group by name, team, number ORDER BY number desc";
    $result = $conn->query($sql);
    $players = [];
    if ($result->num_rows > 0) {
    // output data of each row
        while($row = $result->fetch_assoc()) {
            $players[] = $row; 
        }  
        echo "var players = ".json_encode($players).";";
    }
    else {
        echo "alert('problem loading players');";
    }  
    ?>
    
    
    window.onload = function() {
        
        var teamsHtml = [];
        for (var i = 0; i < teams.length; i++) {
            teamsHtml.push("<option value='" + teams[i].team + "'>" + teams[i].team + "</option>");
        }
        var s = teamsHtml.join('');
        lightteams.innerHTML = s;
        darkteams.innerHTML = s;
        update()
    }

    function update(){
        var lightsHtml = [];
        var darksHtml = [];
        if(lightteams.selectedIndex == darkteams.selectedIndex){
            if(darkteams.selectedIndex > 1){
                darkteams.selectedIndex--;
            }
            else {
                darkteams.selectedIndex++;
            }
        }
        for (var i = 0; i < players.length; i++){
            if (players[i].team == teams[lightteams.selectedIndex].team){
                lightsHtml.push("<option value='"+players[i].number+" - "+players[i].name+"'>"+players[i].number+" - "+players[i].name+"</option>");
            }
            else if (players[i].team == teams[darkteams.selectedIndex].team){
                darksHtml.push("<option value='"+players[i].number+" - "+players[i].name+"'>"+players[i].number+" - "+players[i].name+"</option>");
            }
        }
        var home = lightsHtml.join('');
        var away = darksHtml.join('');
        lightPlayer.innerHTML = home;
        darkPlayer.innerHTML = away;
        
    }

    //O(1)
    function add(side, type, team, player) {
        var body = document.getElementsByTagName('body')[0];
        var popup = document.getElementById('popup');
        var time = new Date();
        var game = document.getElementsByName('gameTime')[0].value;
        var point = '';
        
        if (type == "Goal") {
            if (side == "light") {
                lightGoals++;
                document.getElementById("lightScore").value = lightGoals;
                console.log(side, type, team, player, lightGoals);
            }
            if (side == "dark") {
                darkGoals++;
                document.getElementById("darkScore").value = darkGoals;
                console.log(side, type, team, player, darkGoals);
            }
        }

        if (time.getHours() < 12) {
            time = (time.toLocaleTimeString()).replace(' AM', '');
            
        } else {
            time = (time.toLocaleTimeString()).replace(' PM', '');
        }
        //Populate 
        var newPoint = '<tr><input type="hidden" value="'+side+'" name="side[]"><input name="time[]" type="hidden" value="' + time + '"><td><input type="point" name="eventTime[]" style="width:50px;" value="' + game + '"></td><td><input type="point" name="type[]" value="' + type + '" readonly></td><td><input type="point" name="team[]" value="' + team + '"></td><td><input type="text" name="number[]" value="'+player.split(' - ')[0]+'"</td><td><input type="point" name="player[]" value="' + player.split(' - ')[1] + '"></td></tr>';
        row++;
        // Edits made in summary are not perminent after new point is added to list.

        points.push(newPoint);
        var temp = points.join('');
        record.innerHTML = temp;
        id++;
        return;
    }

    function del(RowID) {
        console.log("delete row: " + RowID);
        document.getElementById('events').deleteRow(RowID);
        points.splice(RowID, 1);
        sessionStorage.removeItem(RowID);
        updateSessionStorage();
    }

    function myUndo() {
        if (row > 0) {
            points.pop();
            document.getElementById('summary').deleteRow(row);
            row = row - 1;
            //            lightGoals--;
            //            darkGoals--;
        }
    }

</script>

</html>