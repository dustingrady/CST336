<?php

session_start();
include 'dbConn.php';
$connection = dbConn();
function displayAllProducts() {
    
    $sql = "Select * FROM games ORDER BY title";
    $records = getDataBySQL($sql);
    
    echo "<table class='sortable' border=1>";
    echo "<th>Image</th>";
    echo "<th>Title</th>";		
    echo "<th>Platform</th>";		
    echo "<th>Year Published</th>";		
    echo "<th>Comments</th>";
    
        foreach ($records as $record) {
            echo "<tr>"; 
            echo "<td>" . "<img src=img/" . $record['image'] . " />" . "</td>";
            echo "<td>" . $record['title'] . "</td>";
            echo "<td>" . $record['platform'] . "</td>";
            echo "<td>" . $record['yearPublished'] . "</td>";
            echo "<td><form action=gameComments.php>";
            echo "<input type='hidden' name='gameID' value='".$record['gameID'] . "'/>";
            echo "<input type='submit' value='Comment'/></form></td>";
            echo "</tr>";
        } 
    echo "</table>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Pokemon Game Catalog</title>
  <link href="bootstrap.min.css" rel="stylesheet" type="text/css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
    <h4><a href='adminlogin.php'>Administrator Login</a></h4>
    <div><center>
        <h1>Pokemon Game Database</h1>
    <div>
    <strong> Welcome <?=$_SESSION['username']?>! </strong>
    <br />
    <div><br />All Pokemon games produced are listed alphabetically, please feel free to recommend one of these games for others!</div>
    <br />
    <div>
    <table border=1>
        <tr>
            <th>Title</th>
            <th>Platform</th>
        </tr>  
        <tr>
        <td>
        <input type="text"name="title" id="title">
        </td>
        <td>
        <select name="platform" id="platform">
            <option selected disabled hidden value=""></option>
            <option value=""></option>
            <option value="Game Boy">Game Boy</option>
            <option value="Game Boy Color">Game Boy Color</option>
            <option value="Game Boy Advance">Game Boy Advance</option>
            <option value="Nintendo DS">Nintendo DS</option>
            <option value="Nintendo 3DS">Nintendo 3DS</option>
        </select>
        </td>

        <td><div><button id="Search">Search</button></div></td>
        <td><div><button id="reset">Reset</button></div></td>
        </tr>
                
        </table>
        <br /> <br />
        
     </div>
   <tr>
        <td width="72" height="24"><p>Name A-Z</p></td>
        <td width="28"><input name="priceorder" id="sortAscending" type="radio" value="ascending" /></td>

        <td width="75" height="24"><p>Name Z-A</p></td>
        <td width="20"><input name="priceorder" id="sortDescending" type="radio" value="descending" /></td>
    </tr>
    
     <div id="all"><?=displayAllProducts()?></div></center>
     
    <!-- Update search results using Ajax -->
    <script>
    /*global $*/
         $("#Search").click(function() {
            $.ajax({
                "method": "GET",
                "url": "displayAll.php",
                "data": {
                    "platform": $("#platform").val(),
                    "title": $("#title").val(),
                },
                "success": function(data, status)
                {
                    $("#all").html(data);
                    $("#all").slideDown(0);
                }
            });
        });
        $("#reset").click(function() {
            $.ajax({
                "method": "GET",
                "url": "displayAll.php",
                "data": {
                    "platform": null,
                    "title": null,
                },
                "success": function(data, status)
                {
                    $("#all").html(data);
                    $("#all").slideDown(0);
                }
            });
        });
        //TESTING vvvvvvv
         $("#sortDescending").click(function() {
            $.ajax({
                "method": "GET",
                "url": "displayAll.php",
                "data": {
                    "priceorder": $("#sortDescending").val(),
                    "title": null,
                },
                "success": function(data, status)
                {
                    $("#all").html(data);
                    $("#all").slideDown(0);
                }
            });
        });
        //TESTING vvvvvvv
         $("#sortAscending").click(function() {
            $.ajax({
                "method": "GET",
                "url": "displayAll.php",
                "data": {
                    "priceorder": $("#sortAscending").val(),
                    "title": null,
                },
                "success": function(data, status)
                {
                    $("#all").html(data);
                    $("#all").slideDown(0);
                }
            });
        });
        //TESTING ^^^^^^^^^
    </script>
    
    <br /><br />
    </div>
  </div>
</body>
</html>