
<?php 
	include('nav.php');
	include('db-conn.php');
?>
<h1>Overview</h1>
<h3>{Team}</h3>
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
		$sql = "select player, sum(paid) as paid, sum(drank) as drank, sum(rate*drank) as owes from Tab Group by player";
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
			header('Location: newPlayer.php');
			die();
		} 
	?>
	window.onload = function(){
		var showtab = [];
		for(var i = 0; i< tabs.length; i++){
			if(tabs[i].drank == null){ 
				continue;
				}				
			else{
				showtab.push("<tr><td>"+tabs[i].player+"</td><td>"+tabs[i].drank+"</td><td>"+tabs[i].owes+"</td><td>"+tabs[i].paid+"</td></tr>");
			}
		}
		var temp = showtab.join('');
		document.getElementById('tabsOverview').innerHTML = temp;
	}
</script>
<?php inlude('footer.php') ?>