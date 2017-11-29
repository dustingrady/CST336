<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <a href='admin.php'><h2>Home</h2></a>
  <title>Add New Game</title>
  <link href="bootstrap.min.css" rel="stylesheet" type="text/css" />
</head>

<body>
  <header><center>
    <h1>Add New Game</h1>
    <br />
  </header></center>

  <form><center>
    Title: <input type="text" name="title"/> <br />
    Platform: <input type="text" name="platform"><br />
    Year Published: <textarea rows="4" cols="20" name="yearPublished" /></textarea> <br />

    <br />
    <input type="hidden" name="gameID" />
    <br />
    <input type="submit" value="Add Game" name="addGame" />
  </form></center>
      
<?php

if (isset($_GET['addGame'])) {  
    
  include 'dbConn.php';
 
  $sql = "INSERT INTO games ( title, platform, yearPublished) 
          VALUES ( :title, :platform, :yearPublished)";
          
  $namedParameters = array();
  $namedParameters[':title'] = $_GET['title'];
  $namedParameters[':platform'] = $_GET['platform'];
  $namedParameters[':yearPublished'] = $_GET['yearPublished'];

  $conn = dbConn();    
  $statement = $conn->prepare($sql);
  $statement->execute($namedParameters);  
  
  echo "<br />";
  echo "<h2>Game has been added!</h2>";    
}
?>

</body>
</html>