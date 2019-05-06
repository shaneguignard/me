
<table>
    <tr>
        <th>TimeStamp</th>
        <th>Type</th>
        <th>IP Address</th>
        <th>Device</th>
        <th>Location</th>
    </tr>
<?php 
// include('getStats.php');
include('../mydb.php');

$result = $conn->query("SELECT * FROM Events");
if ($result->num_rows > 0){
    while ($row=$result->fetch_assoc())
    {
        echo '<tr><td>'.$row['timestamp'].'</td><td>'.$row['type'].'</td><td>'.$row['ip'].'</td><td>'.$row['device'].'</td><td>'.$row['location'].'</td></tr>';
    }
}

?>
</table>