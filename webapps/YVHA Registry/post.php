<style>
    h1{
        color:black;
    }
a h1:hover{
    color:#d22f25;
}
a{
    text-decoration: none;
}

</style>
<h1>Thank you for your help!</h1>
<table style='text-align:center;'>

<?php
    //include("dbConnection.php");

    // Make it such that the input fields are evaluated before they are submitted.
    // Then perform required calculations with what information is provided before submitting to database
    echo "<tr><th colspan='2'><h2>$_POST[number] $_POST[streetname]</h2></th></tr>";
    echo "<tr><td>Cost/ month: </td><td>$_POST[rent]</td></tr>";
    echo "<tr><td>Number of Rooms: </td><td>$_POST[rooms]</td></tr>";
    echo "<tr><td>Vacancies: </td><td>$_POST[vacancies]</td></tr>";
    echo "<tr><td>Kitchens: </td><td>$_POST[kitchens]</td></tr>";
    echo "<tr><td>Bathrooms: </td><td>$_POST[bathrooms]</td></tr>";
    echo "<tr><td>Washers: $_POST[washers]</td><td>Dryers: $_POST[dryers]</td></tr>";
    echo "<tr><td>External Doors: </td><td>$_POST[doors]</td></tr>";
    echo "<tr><td>Housing Type: </td><td>$_POST[bias]</td></tr>";
    echo "<tr><td>Accessibility: </td><td>$_POST[accessibility]</td></tr>";
    echo "<tr><td>Notes:</td><td>$_POST[notes]</td></tr>";

    //$sql = "INSERT INTO `TheVillage` VALUES ('$_POST['number']', '$_POST['streetname'], )";
    //$result = $conn->query($sql);
?>

</table>

Feel free to browse the data that we have collected so far. 
<a href="./gallery.php"><h1>Village Gallery</h1></a>