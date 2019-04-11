<html>

<body>
    
    
    <?php 
    $events = $_POST['event'];
    echo "Test<br>";
    for($i = 0; $i < count($events); $i++)
    {

        echo $events[$i]."<br>";
    }
    
    
    ?>
    
    </body>
</html>