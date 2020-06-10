

 <?php 
	$sql = <<<EOT
	SELECT 
	date(timestamp) as lastUpdated, 
    concat(`number`, " ", street_name, " ", street_type) address, 
	avg(rent) as avgRent, 
    min(rooms) as numRooms,
    cohabitance,
    vacancies,
    lease,
    furnished,
    avg(room_rating) as avgRoomRating,
    kitchens,
    avg(kitchen_rating) as avgKitchenRating, 
    bathrooms,
    avg(bathroom_rating) as avgBathroomRating,
    washing_machines,
    drying_machines, 
    avg(laundering_rating) as avgLaundryRating,
    avg(common_area_rating) as avgCommonAreaRating,
    house_security, 
    room_security,
    deposit_required,
    avg(deposit_fee) as approximateDepositFee,
    house_keeper,
    avg(house_keeper_fee) as approximateKeeperFee,
    accessibility
 FROM 
	housingRegistry.TheVillage
 WHERE
	street_name = "$streetName"
    AND
    `number` = "$streetNum"
GROUP BY
	lastUpdated,
	address,
    cohabitance,
	vacancies,
    lease,
    furnished,
    kitchens,
    bathrooms,
    washing_machines,
    drying_machines,
    house_security,
    room_security,
    deposit_required,
    house_keeper,
    accessibility
ORDER BY
	lastUpdated
LIMIT 1;
EOT;

	$results = $conn->query($sql);
	$board = $results->fetch_assoc();
	
	echo "<h1>".$board['address']." House Board</h1>";
	echo "<hr>";
	echo "<table class='residents'>";
	echo "<tr><th>Last Updated</th><td>".$board['lastUpdated']."</td></tr>";
	echo "<tr><th>Average Rent</th><td>".$board['avgRent']."</td></tr>";
	echo "<tr><th>Number of Rooms</th><td>".$board['numRooms']."</td></tr>";
	echo "<tr><th>Cohabitance Type</th><td>".$board['cohabitance']."</td></tr>";
	echo "<tr><th>Vacancies</th><td>".$board['vacancies']."</td></tr>";
	echo "<tr><th>Typical Lease Length (Months)</th><td>".$board['lease']."</td></tr>";
	echo "<tr><th>Furnished</th><td>".$board['furnished']."</td></tr>";
	echo "<tr><th>Avg Room Quality</th><td>".$board['avgRoomRating']."</td></tr>";
	echo "<tr><th>Number of Kitchens</th><td>".$board['kitchens']."</td></tr>";
	echo "<tr><th>Avg Kitchen Quality</th><td>".$board['avgKitchenRating']."</td></tr>";
	echo "<tr><th>Number of Bathrooms</th><td>".$board['bathrooms']."</td></tr>";
	echo "<tr><th>Avg Bathroom Quality</th><td>".$board['avgBathroomRating']."</td></tr>";
	echo "<tr><th>Number of Washing Machines On Premise</th><td>".$board['washing_machines']."</td></tr>";
	echo "<tr><th>Number of Drying Machines On Premise</th><td>".$board['drying_machines']."</td></tr>";
	echo "<tr><th>Avg Laundryroom Quality</th><td>".$board['avgLaundryRating']."</td></tr>";
	echo "<tr><th>Avg Common Area Quality</th><td>".$board['avgCommonAreaRating']."</td></tr>";
	echo "<tr><th>Type of house security</th><td>".$board['house_security']."</td></tr>";
	echo "<tr><th>Type of room security</th><td>".$board['room_security']."</td></tr>";
	echo "<tr><th>Deposit</th><td>".$board['deposit_required']."</td></tr>";
	echo "<tr><th>Approximate deposit fee</th><td>".$board['approximateDepositFee']."</td></tr>";
	echo "<tr><th>House Keeper</th><td>".$board['house_keeper']."</td></tr>";
	echo "<tr><th>Approximate house keeper fee</th><td>".$board['approximateKeeperFee']."</td></tr>";
	echo "<tr><th>Accessibility</th><td>".$board['accessibility']."</td></tr>";
	echo "</table>";
?>
