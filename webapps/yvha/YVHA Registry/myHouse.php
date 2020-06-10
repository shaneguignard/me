<!-- Dependencies -->
 <?php include('dbConnection.php'); ?>

<!-- Page -->
<html>
	<head>
		<title>YVHA Gallery</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<!--Scales the display to the same resolution on all devices-->
    
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php include('defaultStyle.php');?>
	<body>
		
		<h6 id='error'></h6>
		<div id="houseBoard">
		<?php 
			$streetName = $_GET['name'];
			$streetNum = $_GET['address'];
			include('houseBoard.php'); 
			?>
		</div>
		<?php include('foo.php'); ?>
	</body>
</html>