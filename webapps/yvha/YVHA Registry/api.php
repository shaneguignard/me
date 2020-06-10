<?php


function getVillageData(query){
	$sql = "Select street_name, street_type, avg(rent) as avgRent, avg(rooms) as avgRooms from housingRegistry.TheVillage group by street_name, street_type;";
		$results = $conn->query($sql);
		$streets = [];
		if ($results->num_rows > 0) {
		// output data of each row
			while($row = $results->fetch_assoc()) {
				$streets[] = $row;
			} 
			$myStreet = json_encode($streets);
			return $myStreets;
		}
		else {
			$warning = "There was a problem loading The Village Database";
			return $warning;
		}
	}
	
?>