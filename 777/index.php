<!DOCTYPE html>
<?php
    include './functions.php';
?>

<html>
    <style>
        @import url("css/styles.css");
    </style>
    <head>
        <title> 777 Slot Machine </title>
    </head>

    <div id="main">
        <?php
            play();
        ?>
        
        <form>
            <input type="submit" value ="Spin!"/>
        </form>
    </div>
    
</html>