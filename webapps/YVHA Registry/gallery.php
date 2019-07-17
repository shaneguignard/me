<!-- Dependencies -->
<?php include('dbConnection.php'); ?>

<!-- Page -->
<html>
    <head>
        <title>YVHA Gallery</title>

    </head>
<body>
    <h1>The Village Gallery</h1>
    <div id='gallery'>
    <table>
    <?php 
        $sql = "SELECT * FROM housingRegistry.TheVillage";
        $results = $conn->query($sql);
        if ($results->num_rows > 0) {
        // output data of each row
        while($row = $results->fetch_assoc()) {
                echo $row.number ." ". $row.street_name;
            } 
        }
        else {
            echo "<option>Problem Connecting To Team Server</option>";
        } 

    ?>
    </table>
</div>
</body>