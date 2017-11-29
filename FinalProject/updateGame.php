<?php

include 'dbConn.php';
$conn = dbConn();
 
function getmangabyID() {
  global $conn;
  $sql = "SELECT * FROM games WHERE gameID = :gameID ";
  $namedParameters = array();
  $namedParameters[':gameID'] = $_GET['gameID'];
  $statement = $conn->prepare($sql);    
  $statement->execute($namedParameters);
  $record = $statement->fetch();
  return $record;
}

if (isset($_GET['updateForm'])) {
    $sql = "UPDATE games SET image = :image, title = :title, platform = :platform, yearPublished = :yearPublished 
            WHERE gameID = :gameID";
    
    $namedParameters = array();
    $namedParameters[':image'] = $_GET['image'];
    $namedParameters[':title'] = $_GET['title'];
    $namedParameters[':platform'] = $_GET['platform'];
    $namedParameters[':yearPublished'] = $_GET['yearPublished'];
    $namedParameters[':gameID'] = $_GET['gameID'];
 
    $statement = $conn->prepare($sql);
    $statement->execute($namedParameters);    
    echo "<br /><h2>Game has been updated!</h2>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <a href='admin.php'><h2>Home</h2></a>
  <title>Update Game</title>
  <link href="bootstrap.min.css" rel="stylesheet" type="text/css" />
</head>

<body>
  <div>
    <header><center>
      <h1>Update Game</h1>
      <br />
    </header></center>

  <div>
        
  <?php $game = getGameByID()?>
  <form><center>
    Image: <input type="text" name="image" value="<?=$game['image']?>" /> <br />
    Title: <input type="text" name="title" value="<?=$game['title']?>" /> <br />
    Platform: <textarea rows="4" cols="20" name="genre" value="<?=$game['genre']?>" /></textarea> <br />
    Year Published: <input type="text" name="author" value="<?= ($game['author'])?>"><br />
                <br />
                <input type="hidden" name="gameID" value="<?=$game['gameID']?>" />
                <br />
                <input type="submit" value="Update Game" name="updateForm" />
  </form></center>
  </div>
  </div>
</body>
</html>