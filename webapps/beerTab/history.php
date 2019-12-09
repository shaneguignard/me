<h1>History</h1>
<?php 
	include('nav.php');
	include('db-conn.php');
?>
<table border=1>
	<tr>
		<th>Date</th>
		<th>Player</th>
		<th>Team</th>
		<th>Paid</th>
		<th>Owes</th>
		<th>Drank</th>
		<th>Rate</th>
	</tr>
<tbody id='history'>
<!-- dynamic updated history list -->
</tbody>
</table>
<script>
<?php
	$sql = "select * from Tab";
	$result = $conn->query($sql);
		$history = [];
		if ($result->num_rows > 0) {
		// output data of each row
			while($row = $result->fetch_assoc()) {
				$history[] = $row; 
			}  
			echo "var historyjson = ".json_encode($history).";";
		}
		else {
			echo "alert('Problem loading tabs history');";
		} 

?>
console.log("hello? ")
window.onload = function(){
	var history_html_list = [];
	console.log("loaded "+ historyjson);
	for (var i = 0; i < historyjson.length; i++){
		console.log(i);
		history_html_list.push("<tr><td>" + historyjson[i].date + "</td>");
		history_html_list.push("<td>" + historyjson[i].player + "</td>");
		history_html_list.push("<td>" + historyjson[i].team + "</td>");
		history_html_list.push("<td>" + historyjson[i].paid + "</td>");
		history_html_list.push("<td>" + historyjson[i].drank + "</td>");
		history_html_list.push("<td>" + historyjson[i].owes + "</td>");
		history_html_list.push("<td>" + historyjson[i].rate + "</td></tr>");
	}
	var temp = history_html_list.join('');
	document.getElementById('history').innerHTML = temp;
}
</script>
