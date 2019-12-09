<h1>Overview</h1>
<?php 
	include('nav.php');
	include('db-conn.php');
?>
<table id='overview' border=1>
	<tr>
		<th>Name</th>
		<th>Drank</th>
		<th>Owes</th>
		<th>Paid</th>
	</tr>
	<tbody id='tabsOverview'>
	</tbody>
</table>
<script>

	<?php
		// Retrieve tab list from sql
		$sql = "select player, team, paid, drank, rate from Tab Group by player, team, paid, drank, rate";
		$result = $conn->query($sql);
		$tabs = [];
		if ($result->num_rows > 0) {
		// output data of each row
			while($row = $result->fetch_assoc()) {
				$tabs[] = $row; 
			}  
			echo "var tabs = ".json_encode($tabs).";";
		}
		else {
			echo "alert('Problem loading player tabs');";
		} 
	?>
	window.onload = function(){
		var showtab = [];
		for(var i = 0; i< tabs.length; i++){
			showtab.push("<tr><td>"+tabs[i].player+"</td><td>"+tabs[i].drank+"</td><td>"+tabs[i].owes+"</td><td>"+tabs[i].paid+"</td></tr>");
		}
		var temp = showtab.join('');
		document.getElementById('tabsOverview').innerHTML = temp;
	}
</script>
