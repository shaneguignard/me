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
		<?php include('defaultStyle.php'); ?>
	</head>
	<body>
		<h1>Welcome to <?php echo $_GET['name']; ?></h1>
		<hr>
		<h2 id='error'></h2>
		<div id='myStreet'></div>
		<?php include('foo.php'); ?>
	</body>
	<script>
		 <?php 
		$streetName = $_GET['name'];
        $sql = "SELECT * FROM housingRegistry.TheVillageAverage where street_name = '".$streetName."' order by number asc;";
        $results = $conn->query($sql);
		$houses = [];
        if ($results->num_rows > 0) {
        // output data of each row
			while($row = $results->fetch_assoc()) {
				$houses[] = $row;
            } 
			echo "var houses = ".json_encode($houses).";";
			
        }
        else {
            $warning = "There is no data on this street";
			echo "document.getElementById('error').innerHTML = '".$warning."';";
        } 
    ?>
	
	window.onload = function() {
		
		var list = [];
		var keys = Object.keys(houses[0]);
		var defaultImage = "./theVillage/default.png";
		for (var i = 0; i < houses.length; i++){
			
			console.log(keys[0]);
			var attributes = [];
			
			attributes.push("<tr><th colspan=2><h2>"+houses[i].number+"</h2></th></tr>")
			for(var j = 3; j < keys.length; j++){
				attributes.push("<tr><td>"+keys[j]+"</td><td>"+houses[i][keys[j]]+"</td></tr>");
			}
			
			
			var table = attributes.join('');
			list.push("<a id='"+houses[i].number+"' href='myHouse.php?name="+houses[i].street_name+"&address="+houses[i].number+"'><table class='house'>"+table+"</table></a>");
			
		}
		var grid = list.join("");
		document.getElementById("myStreet").innerHTML = grid;
	}
	</script>
</html>