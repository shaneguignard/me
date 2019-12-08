<!-- ServerSide Validation -->

<?php
include('db-conn.php');
// Error Messages
$playerNameReq = '';
// Rate should be populated by admin settings
$rate = 0; 

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  if (empty($_POST["playername"])){
      $playerNameReq = "Player name is required";
  }
  else {
      $playerName = test_input($_POST["playername"]);
  }
  if (empty($_POST["playerteam"])){
        $playerTeam = "";
  }
  else {
      $playerTeam = test_input($_POST["playerteam"]);
  }
  
  
}

if($playerName != '' and $playerNameReq == ''){
    $sql = "INSERT INTO Tab (player, team, rate) VALUES ('$playerName', '$playerTeam', $rate);";
    $result = $conn->query($sql);
    if($result === FALSE){
        echo "<h1>Error with Games insert </h1>".$sql."<br>".$conn->error;
    }
    else{
        echo "<h1>Player Added!</h1>";
        echo $sql;
        echo $result;
        header("Location: submit.php");
    }
    
}

?>

<h1>Add New Player</h1>
<?php include("nav.php");
?>
<style>
input{
    display: block;
}
.error{
    color: red;
}
</style>

<form id='newPlayer' method='POST' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>'> 
<h2>Player Name</h2>
<input type='text' name='playername' value="<?= $playerName; ?>">
<div class='error'><?= $playerNameReq; ?></div>
<h2>Player Team</h2>
<input type='text' name='playerteam' value="<?= $playerTeam; ?>">
<select name='team' id='myteams'></select>
<br>
<input type='submit' value='Create New Player'>
</form>
<script> 

</script>

