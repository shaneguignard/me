<?php 
    include('db-conn.php');
    $sql = "select * from Reps where email='shaneguignard@gmail.com';";
    $result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$rep = $result->fetch_assoc();
	}
	else {
		$rep = "Unknown";
	}

include('nav.php');
?>
<h1>Settings</h1>
<table>
<tr><td>ID:</td><td><?= $rep['id'] ?></td></tr>
<tr><td>Name:</td><td><?= $rep['name'] ?></td></tr>
<tr><td>Email:</td><td><?= $rep['email'] ?></td></tr>
<tr><td>Password:</td><td><?= $rep['password'] ?></td></tr>
<tr><td>Team:</td><td><?= $rep['team'] ?></td></tr>
<tr><td>Phone:</td><td><?= $rep['phone'] ?></td></tr>
<tr><td>Drink Rate:</td><td><?= $rep['rate'] ?></td></tr>
<tr><td>teamUrl:</td><td><?= $rep['teamUrl'] ?></td></tr>
</table>
<a href='settings_edit.php'>Edit</a>
