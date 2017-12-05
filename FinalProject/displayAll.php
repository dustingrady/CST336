<?php

include "dbConn.php";
$connection = dbConn(); 
$sql = "SELECT * FROM games WHERE 1 = 1";

if(!empty($_GET) && isset($_GET) && empty($_GET['gameID'])) {
    if(strcmp($_GET['title'], "")!==0)
    {
        $sql .= " AND title LIKE '%" . $_GET['title'] . "%'";
    }
    
    if(strcmp($_GET['platform'], "")!==0)
    {
        $sql .= " AND platform LIKE '%" . $_GET['platform'] . "%'";
    }
    
    if(strcmp($_GET['yearPublished'], "")!==0)
    {
        $sql .= " AND difficulty LIKE '%" . $_GET['yearPublished'] . "%'";
    }
}

$records = getDataBySQL($sql);

echo "<table border=1>";
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

?>