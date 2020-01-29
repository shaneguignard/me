
<div id='nav'>
<?php 
	include('db-conn.php');
	$sql = "select date from Tab order by date desc limit 1";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$lastUpdated = $result->fetch_assoc()['date'];
	}
	else {
		$lastUpdated = "Unknown";
	}
	echo "<p>Last Updated: {$lastUpdated}</p>"; 
	echo "Session ID: ".$_SESSION['id']."<br>";
	echo "Session Email: ".$_SESSION['email']."<br>";
	echo "Session Password: ".$_SESSION['password']."<br>";
?>
<ul>
	<li><a href='history.php'>History</a></li>
	<li><a href='overview.php'>Overview</a></li>
	<li><a href='submit.php'>Submit</a></li>
	<li><a href='settings.php'>Settings</a></li>
</ul>
<hr>
</div>
