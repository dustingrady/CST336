<?php

include 'Connect.php';
$conn = dbConn();
$sql = "SELECT * FROM `games` a left join `recommendation` b ON a.gameID = b.gameID WHERE a.gameID = :gameID ";

$namedParameters = array();
$namedParameters[':gameID'] = $_GET['gameID'];
$statement = $conn->prepare($sql);    
$statement->execute($namedParameters);
while($data = $statement->fetch()) {
  $record[] = $data;
}

if (isset($_GET['addRecommendation'])) {
  $sql = "INSERT INTO recommendation ( gameID, time, date, comment) 
          VALUES ( :gameID, :time, :date, :comment)";
        
  $namedParameters = array();
  $namedParameters[':gameID'] = $_GET['gameID'];
  $namedParameters[':time'] = $_GET['time'];
  $namedParameters[':date'] = $_GET['date'];
  $namedParameters[':comment'] = $_GET['comment'];
  $statement = $conn->prepare($sql);
  $statement->execute($namedParameters);  
  echo "Record has been added!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Recommendations</title>
</head>

<body>
    <?php $game = getGameByID()?>
    <header>
      <h1><?=$game['title']?> Recommendations</h1>
    </header>
    
    <form action="" method="get">
      Time: <input type="time" name="time"><br />
      Date: <input type="date" name="date"><br />
      Comment: <textarea rows="4" cols="20" name="comment" /></textarea> <br />
      <input type="hidden" name="gameID" value="<?=$_GET['gameID']?>" />
      <input type="submit" value="Add a recommendation" name="addRecommendation" />
    </form>

    <?php
    $none = false;
    echo "<table border=1>";
    echo "<th>Time</th>";		
    echo "<th>Date</th>";
    echo "<th>Comment</th>";
    foreach ($game as $games) {
      $none = true;
      echo "<tr>"; 
      echo "<td>" . $games['time'] . "</td>";
      echo "<td>" . $games['date'] . "</td>";
      echo "<td>" . $games['comment'] . "</td>";
      echo "</tr>";
    }
    
    if($none == false){
      echo "<tr><td colspan='3'>No comments for this game!</td></tr>";
    }
    
    echo "</table>";
    
    ?>

</body>
</html>