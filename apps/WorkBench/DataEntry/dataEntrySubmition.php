<html>

<head>
    <title>Data Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body{
            font-size: 48pt;
        }
        table{
            width: 200px;
        }
        .button{
            background:
        }
        input[type=submit]{
            width:100%;
        }
    
    </style>
    <script>
        var rowid = 1;
        var events = [];
    function add(name) {
        events.push("<tr class='event' id='" + rowid + "'><td name='id[]' value='"+rowid+"'>"+rowid+"</td><td><input name='event[]' value='" + name + "'/></td><td class='button' onclick='del("+rowid+");'>Button</td></tr>");
        document.getElementById('events').innerHTML = events.join('');
        rowid++;
        document.getElementById('firstname').value = '';
    }

    function del(id) {
        console.log("delete! ->" + id);
    }

</script>
</head>

<body>

    <table border="1">
        <thead>
            <tr>
                <td>ID</td>
                <td>Your Name</td>
                <td></td>
            </tr>
            <tr>
                <td></td><td><input id='firstname' type='text' name='input' /></td>
                <td><button id='add' class="button" onclick='add(firstname.value)'/>Add</td>
            </tr>
        </thead>
    </table>
    <form action="test.php" method="POST">
        <table border='1'>
            <tbody id='events'></tbody>
            <tr>
                <td colspan='3'><input type='submit' /></td>
            </tr>
        </table>
    </form>
</body>



</html>
