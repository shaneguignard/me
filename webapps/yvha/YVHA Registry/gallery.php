<!-- Dependencies -->
<?php include('dbConnection.php'); ?>

<!-- Page -->
<html>
    <head>
        <title>YVHA Gallery</title>
        <style> 
        h1{
            text-align:center;
        }
        table{
            width:100%;
        }
        a{
            text-decoration: none;

        }
        .button{
            width:200px;
            font-size:14pt;
            text-align: center;
            padding: 20px;
            color: white;
            background: #d22f25;
			margin-left: auto;
			margin-right: auto;
        }
		
        .button:hover{
            background: #5e5e5e;
            color: black;
        }
		
		#village{
			width: 100%;
			display: grid;
			grid-template-columns: repeat(3, 1fr);
			grid-gap: 20px;
			grid-auto-rows: minmax(100px, auto);
		}
		
		.streets {
			grid-column: 1 / 3;
			grid-row: 1;
			padding: 20px;
			border: 1px solid black;
			border-radius: 10px;
		}
		
		a .streets:hover{
			border: 1px solid red;
		}
		.streets img{
			height: 200px;
			display: block;
			margin-right: auto;
			margin-left: auto;
			}
        </style> 
    </head>
<body>
    
    <h1>The Village Gallery</h1>
	<hr>
	<div id='village'>
 
	</div>
	
<div id='footer'>
        <p>Thank you for checking out our Gallery, this is a very preliminary version of what we have, built by students for students. 
        If you have any suggestions, or would like to help shape what the Gallery becomes, contact us <a href='https://yvha.ca/contact-us'>here</a> and we would love to hear from you.</p>
		<a id='backToForm' href='index.php'>
        <div class='button'>Submit a review</div></a>
</div> 
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
			content.push("<a href='./"+streets[i].street_name+"'>");
			content.push("<table class='streets'>");
			content.push("<tr colspan=2><td><img src ='"+pictureURL+"' onerror='this.src=\""+defaultImage+"\";'></td></tr>");
			content.push("<tr><td colspan=2><h3>"+streets[i].street_name+"</h3></td></tr>");
			content.push("<tr><td>Average Rent Per House</td><td>$"+streets[i].avgRent+"</td></tr>");
			content.push("<tr><td>Average Rent Per House</td><td>"+streets[i].avgRooms+"</td></tr>");
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