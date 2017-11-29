<?php

echo "<a href='admin.php'>Home</a>";
include 'dbConn.php'; 
$conn = dbConn();
$sql = "DELETE FROM games WHERE gameID = :gameID";
$namedParameters = array();
$namedParameters[':gameID'] = $_GET['gameID'];
$statement = $conn->prepare($sql); 
$statement->execute($namedParameters);    
echo "<br>";
header("Location: admin.php"); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Delete Game</title>
</head>

<body>
    <div>
    <header>
        <h1>Delete Game</h1>
    </header>
    <div>
    <form action="deleteGame.php" onsubmit="return confirmDelete('<?=$product['productName']?>')">
        <input type="hidden" name="gameID" value="<?=$product['gameID']?>" />
        <input type="submit" value="Delete" name="deleteForm" />
    </form>
    
    <strong>Game has been deleted.</strong>
    
    </div>
    </div>
</body>
</html>