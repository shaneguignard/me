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
        </style> 
    </head>
<body>
    <h1>The Village Gallery</h1>
    <div id='gallery'>
    <table border='1'>
    <tr>
    <th>Date</th>
    <th colspan='2'>Address</th>
    <th>Rent</th>
    <th>Rooms</th>
    <th>Kitchens</th>
    <th>Bathrooms</th>
    <th>Washers</th>
    <th>Dryers</th>
    <th>Vacancies</th>
    <th>Notes</th>
    </tr>
    <?php 
        $sql = "SELECT * FROM housingRegistry.TheVillage";
        $results = $conn->query($sql);
        if ($results->num_rows > 0) {
        // output data of each row
        while($row = $results->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['timestamp']}</td>
                    <td>{$row['number']}</td>
                    <td>{$row['street_name']}</td>
                    <td>{$row['rent']}</td>
                    <td>{$row['rooms']}</td>
                    <td>{$row['kitchens']}</td>
                    <td>{$row['bathrooms']}</td>
                    <td>{$row['washers']}</td>
                    <td>{$row['dryers']}</td>
                    <td>{$row['vacancies']}</td>
                    <td>{$row['note']}</td>";
            } 
        }
        else {
            echo "<option>Problem Connecting To Team Server</option>";
        } 

    ?>
    
    </table>
</div>
</body>