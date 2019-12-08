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
        }
        .button:hover{
            background: #5e5e5e;
            color: black;
        }
        </style> 
    </head>
<body>
    <a id='backToForm' href='index.html'>
        <div class='button'>Go Back to Form</div></a>
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
<div id='footer'>
        Thank you for checking out our Gallery, this is a very preliminary version of what we have, built by students for students. 
        If you have any suggestions, or would like to help shape what the Gallery becomes, contact us <a href='https://yvha.ca/contact-us'>here</a> and we would love to hear from you.
</div> 
</body>