<!-- ServerSide Validation -->

<?php
include('db-conn.php');
date_default_timezone_set("America/New_York");
$today = date("Y-m-d h:i:s");
// Error Messages
$clientNameReq = $drinkOrPay = $drankErr = $paidErr = '';
$ready = 'Not Ready';

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  if (empty($_POST["clientName"])){
      $clientNameReq = "Name is required";
  }
  else {
      $clientName = test_input($_POST["clientName"]);
  }

  if (empty($_POST['paid'])){
	  $paidErr = "Must Provide valid payment or drink number";
  }
  else{
	  $paid = test_input($_POST['paid']);
	  
  }
  if (empty($_POST['drank'])){
	$drankErr = test_input($_POST['drank']);
  }
  else{
	$drank = test_input($_POST['drank']);
  }
}

if($clientName != ''){
	
	$sql = "INSERT INTO Tab (date, player, paid, drank) VALUES ('$today', '$clientName', $paid, $drank)";
    $result = $conn->query($sql);
    if($result === FALSE){
        echo "<h1>Problem submitting tab</h1>".$sql."<br>".$conn->error;
    }
    else{
        header("Location: overview.php");
	}    
}
include('nav.php');
?>
<h1>TEAM</h1>
<style>
	input{
		display:block;
	}
	.error{
    color: red;
}
</style>
<h3><a href='newPlayer.php'>Add New Player</a></h3>
<form id='submit' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>' method='POST'>
<h2>Name</h2>
<select id='clientDropDown' name='clientName'>
</select>
<div class='error'><?= $clientNameReq ?></div>
<h2>Paid</h2> 
<input type='number' name='paid' value="<?= $paid ?>">
<div class='error'><?= $paidErr ?></div>
<h2>Drank</h2>
<input type='number' name='drank' value="<?= $drank ?>">
<div class='error'><?= $drankErr ?></div>
<input type='submit' value='Submit Record'>
</form> 

<script>
	// var clients = [{'name': 'Player1'}, {'name': 'Shane'}];

	<?php 
		$sql = "Select distinct player as name, team from Tab";
        $result = $conn->query($sql);
		$clients = [];
		if ($result->num_rows > 0) {
		// output data of each row
			while($row = $result->fetch_assoc()) {
				$clients[] = $row; 
			}  
			echo "var clients = ".json_encode($clients).";";
		}
		else {
			header('Location: newPlayer.php');
			die;
		} 
	?>
	window.onload = function() {
		var players = [];
		console.log('Populate clients DropDown with: ', clients);
		for(var i = 0; i < clients.length; i++){
			players.push('<option value="'+clients[i].name+'">'+clients[i].name+'</option>');
		}
		var temp = players.join('');
		document.getElementById('clientDropDown').innerHTML = temp;
	}
</script>