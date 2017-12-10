<?php

include "dbConn.php";
$connection = dbConn(); 
$sql = "SELECT * FROM games WHERE 1 = 1"; //Select all from games

//Filter games
if(!empty($_GET) && isset($_GET) && empty($_GET['gameID'])) {
    if(strcmp($_GET['title'], "")!==0){
        $sql .= " AND title LIKE '%" . $_GET['title'] . "%'";
    }
    
    if(strcmp($_GET['platform'], "")!==0){
        $sql .= " AND platform LIKE '%" . $_GET['platform'] . "%'";
    }

    if ($_GET['priceorder'] == 'ascending'){
        $sql .= " ORDER BY title ASC";
    } 
    if ($_GET['priceorder'] == 'descending'){
        $sql .= " ORDER BY title DESC";
    } 
}

// if(isset($_GET['priceorder']) && !empty($_GET['priceorder'])){
//     if ($_GET['priceorder'] == 'priceorderasc') $sql .= " ORDER BY buynow ASC";
//     if ($_GET['priceorder'] == 'priceorderdesc') $sql .= " ORDER BY buynow DESC";
// }

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