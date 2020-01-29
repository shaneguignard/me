<?php 
    include('db-conn.php');
    $sql = "select * from Reps where password = '{$_SESSION['password']}';";
    $result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$rep = $result->fetch_assoc();
	}
	else {
		$rep = "Unknown";
    }

    $emailErr = $pwdErr = $teamErr = $rateErr = $nameErr = '';

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      
      if (empty($_POST["email"])){
          $emailErr = "Email is required";
      }
      else {
          $email = test_input($_POST["email"]);
      }
      if(empty($_POST["password"])){
          $pwdErr = "Password is Required";
      }
      else {
          $pwd = test_input($_POST['pwd']);
      }
      if(empty($_POST['team'])){
          $teamErr = "Team is required";
      }
      else{
          $team = test_input($_POST['team']);
      }
      if(empty($_POST['rate'])){
          $rateErr = "Please enter a cost per drink";
      }
      else{
          $rate = test_input($_POST['rate']);
      }
      if(empty($_POST['phone'])){
          $phone = '';
      }
      else{
        $phone = test_input($_POST['phone']);
      }
      if(empty($_POST['teamUrl'])){
          $teamUrl = '';
      }
      else {
          $teamUrl = test_input($_POST['teamUrl']);
      }
      if(empty($_POST['name'])){
          $nameErr = "Name is required";
      }
      else{
          $name = $_POST['name'];
      }
      $id = test_input($_POST['id']);
    }

    if($email != ''){
        $sql = "UPDATE Reps SET name = '{$name}', email = '{$email}', password = '{$pwd}', rate={$rate}, team='{$team}', teamUrl='{$teamUrl}', phone={$phone} where id={$rep['id']};";
        $result = $conn->query($sql);
        if($result === FALSE){
            echo "<h1>Problem Updating Settings</h1>".$sql."<br>".$conn->error;
        }
        else{
            header("Location: settings.php");
	    }
    }

include('nav.php');
?>
<h1>Settings</h1>
<form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>' method='POST'>
<table>
<tr><td>ID:</td><td><?= $rep['id'] ?></td></tr>
<tr><td>Name:</td><td><input name='name' type='text' value='<?= $rep['name'] ?>'></td></tr>
<tr><td>Email:</td><td><input type='email' name='email' value="<?= $rep['email'] ?>"></td></tr>
<tr><td>Password:</td><td><input type='password' name='pwd' value="<?= $rep['password'] ?>"></td></tr>
<tr><td>Team:</td><td><input type='text' name='team' value="<?= $rep['team'] ?>"></td></tr>
<tr><td>Phone:</td><td><input type='phone' name='phone' value="<?= $rep['phone'] ?>"></td></tr>
<tr><td>Drink Rate:</td><td><input type="number" name='rate' value="<?= $rep['rate'] ?>"></td></tr>
<tr><td>teamUrl:</td><td><input type='url' name='teamUrl' value="<?= $rep['teamUrl'] ?>"></td></tr>
</table>
<input type='submit' value='Save'>
</form>

