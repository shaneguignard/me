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
    include("dbConnection.php");
    $currDate = date("Y/m/d h:i");
    $sql = "INSERT INTO `TheVillage` (`timestamp`, `number`, `street_name`, `rent`, `rooms`, `vacancies`, `kitchens`, `bathrooms`, `washing_machines`, `drying_machines`, `entrances/exits`, `cohabitance`, `accessibility`, `note`) VALUES ('$currDate', '$_POST[number]', '$_POST[streetname]','$_POST[rent]', '$_POST[rooms]', '$_POST[vacancies]', '$_POST[kitchens]', '$_POST[bathrooms]', '$_POST[washers]', '$_POST[dryers]', '$_POST[doors]', '$_POST[bias]', '$_POST[accessibility]', '$_POST[notes]')";
    // How to ensure that entries aren't submitted twice when users refresh the webpage
    // One solution is to redirect to a seperate page that displays a summary by pulling from the 
    // database vs before submitting
    $result = $conn->query($sql);
    if($result === FALSE){
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    if ($result === TRUE){
        echo "New Record Created";
    }
    // Make it such that the input fields are evaluated before they are submitted.
    // Then perform required calculations with what information is provided before submitting to database
    echo "<tr><th colspan='2'><h2>$_POST[number] $_POST[streetname]</h2></th></tr>";
    echo "<tr><td>Date:</td><td>$currDate</td></tr>";
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
    
    header("Location: gallery.php");
?>

</table>
<hr>
Feel free to browse the data that we have collected so far. 
<a href="./gallery.php"><h1>Village Gallery</h1></a>

