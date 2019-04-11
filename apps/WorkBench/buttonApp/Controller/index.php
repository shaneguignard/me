<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<?php 
    include('../head.php');
    ?>

<style>
    body{
        text-align: center;
    }
    table{
        width: 100%;
    }

</style>
<body>
    <table border='1'>
        <tr>
            <td colspan="2">
                <?php include('../View/button.php'); ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php include('../View/filter.php'); ?>
            </td>
            <td>
                <?php include('../View/content.php'); ?>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <?php include('../View/footer.php'); ?>
            </td>
        </tr>



    </table>
</body>
</html>
