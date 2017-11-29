<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: adminlogin.php");
}

include 'dbConn.php';
$connection = dbConn();
function displayAllProducts(){
    $sql = "Select * FROM games ORDER BY title";
    $records = getDataBySQL($sql);
    echo "<table class='sortable' border=1>";
    echo "<th>Image</th>";
    echo "<th>Title</th>";		
    echo "<th>Platform</th>";		
    echo "<th>Year Published</th>";		
    echo "<th>Update Game</th>";
    echo "<th>Delete Game</th>";
    
    foreach ($records as $record) {
        echo "<tr>"; 
        echo "<td>" . $record['image'] . "</td>";
        echo "<td>" . $record['title'] . "</td>"; 
        echo "<td>" . $record['platform'] . "</td>";
        echo "<td>" . $record['yearPublished'] . "</td>";
        echo "<td> <form action=updateGame.php>";
        echo "<input type='hidden' name='gameID' value='".$record['gameID'] . "'/>";
        echo "<input type='submit' value='Update'/></form> </td>";
        echo "<td> <form action=deleteGame.php>";
        echo "<input type='hidden' name='gameID' value='".$record['gameID'] . "'/>";
        echo "<input type='submit' value='Delete'/></form> </td>";
        echo "</tr>";
        echo "</tr>";
    }
    
    echo "</table>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Administration</title>
  <link href="bootstrap.min.css" rel="stylesheet" type="text/css" />
</head>

<body>
  <div>
    <header><center>
        <h1>Admin Page</h1>
    </header></center>

    <div><center>
    <strong> Welcome: <?=$_SESSION['username']?>! </strong>
    <br /><br />
    <form action="addGame.php">
        <input type="submit" value="Add Game" />    
    </form>
    <br />
    <form action="logout.php">
        <input type="submit" value="Logout" />    
    </form>
    <br /><br />    
    <?=displayAllProducts()?>
    </div></center>
  </div>
</body>
</html>