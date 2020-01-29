<?php
$refErr = 'Referee';
$playedAt = 'Creemore Arena';
// define variables and set to empty values
$playedAtErr = $timekeeperErr = $timekeeperpwdErr = $gameEventErr = '';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  if (empty($_POST["playedAt"])){
      $playedAtErr = "Arena location is required";
  }
  else {
      $playedAt = test_input($_POST["playedAt"]);
  }

  if (empty($_POST['timekeeper'])){
      $timekeeperErr = "TimeKeeper name is required";
  }
  else {
      $timekeeper = test_input($_POST['timekeeper']);
  }

  if (empty($_POST['timekeeperpwd'])){
    $timekeeperpwdErr = "TimeKeeper password is required";
  }
  else {
    $timekeeperpwd = test_input($_POST['timekeeperpwd']);
  }

  if (empty($_POST['gameDate'])){
    $gameEventErr = "Date is required";
  } 
  else {
    $gameEvent = test_input($_POST['gameDate'].' '.$_POST['gameTime']);
  }

}
// two generals
if($timekeeperpwd == '1234'){
    include("submitEvents.php");
    //   header("Location: submitEvents.php");
    die;
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>