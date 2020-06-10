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
    
    <h1>The Village Gallery</h1>
	<hr>
	<div id='village'>
 
	</div>
	
<?php include('foo.php'); ?>
</body>
<script>
  <?php 
        $sql = "Select street_name, street_type, avg(rent) as avgRent, avg(rooms) as avgRooms from housingRegistry.TheVillage group by street_name, street_type;";
        $results = $conn->query($sql);
		$streets = [];
        if ($results->num_rows > 0) {
        // output data of each row
			while($row = $results->fetch_assoc()) {
				$streets[] = $row;
            } 
			echo "var streets = ".json_encode($streets).";";
        }
        else {
            $warning = "There was a problem loading The Village Database";
        } 
    ?>
	window.onload = function() {
		var list = [];
		
		var defaultImage = "./theVillage/default.png";
		for (var i = 0; i < streets.length; i++){
			var pictureURL = "./theVillage/"+((streets[i].street_name).replace(' ', '_')).toLowerCase()+"_"+(streets[i].street_type).toLowerCase()+"/"+((streets[i].street_name).replace(' ', '_')).toLowerCase()+".JPG";
		
			var content = [];
			content.push("<a href='./myStreet.php?name="+streets[i].street_name+"'>");
			content.push("<table class='streets'>");
			content.push("<tr colspan=2><td><img src ='"+pictureURL+"' onerror='this.src=\""+defaultImage+"\";'></td></tr>");
			content.push("<tr><td colspan=2><h3>"+streets[i].street_name+"</h3></td></tr>");
			content.push("<tr><td>Average Rent Per House</td><td>$"+streets[i].avgRent+"</td></tr>");
			content.push("<tr><td>Average Rooms Per House</td><td>"+streets[i].avgRooms+"</td></tr>");
			content.push("</table>");
			content.push("</a>");
			var temp = content.join('');
			list.push(temp);
		}
		var allStreets = list.join('');
		document.getElementById("village").innerHTML = allStreets;
		
	}

</script>
</html>