<!DOCTYPE html>
<html>
    <head>
    <link href="css/styles.css" rel= "stylesheet" type="text/css">
    </head>
    <body>
      

      <h1 align="center"><img src="img/keyboard.jpeg" alt="picture of keyboard"/></h1>
      
      <h2>Computer Solutions</h2>


    </body>
</html>
<?php
session_start();



//include 'database.php';
//$conn = getDatabaseConnection();

/*
$servername = "localhost";
    $username = "root";
    $password = "MYSECRET";
    $dbname = "c9"; //name of the database in phpmyadmin
    
    global $conn;
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    */
    $host = "us-cdbr-iron-east-05.cleardb.net";
    $username = "b4038f71e14ee4";
    $password = "227621f2";
    $dbname = "heroku_22106684c98b3b9"; 
    
    
    // Create connection
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//-----------------    

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    
    echo "Product info <br/>";
    
function getUserInfo() {
    
    global $conn;
      
    $sql = "SELECT * FROM products where " .$_GET['productID'] ." = productID";
     $record = $conn->query($sql);
      if ($record->num_rows > 0) {
        // output data of each row
        while($row = $record->fetch_assoc()) {
             // print_r(array_values($row));
              //echo "<br/>" ."Product ID: ".$row['productID'] ."<br/> Model: " .$row['model'] ."<br/> Model Name: " .$row['modelName'] 
             // ."<br/> Model Type: ".$row['modelType'] ."<br/> Price: " .$row['price'] ."<br/> Year: " .$row['year'];
            }
    } else {
        echo "0 results";
    }
     //echo $record['price'];
    //print_r($record);
    //print_r(array_values($record));
    return $record;
}

$data = getUserInfo();

$product = getUserInfo();
    
            //
              echo "<table  ' border='1'>";
              echo"<tr>";
              echo "<th>Product ID</th>";
              echo"<th>Model</th>";
              echo"<th>Name</th>";
              echo"<th>Type</th>";
              echo"<th>Price</th>";
              echo "<th>Year</th>";
              //echo"<th>More</th>";
             foreach($product as $data) {
                
                
                 echo "<tr>";
                 
                 echo "<td> ID: ".$data['productID']."</td>" ."<td> Maker: ".$data['model']."</td>" . "<td> Name: " .$data['modelName'] ."</td>". "<td> Type: ". $data['modelType'] ."</td>". "<td> Price: " . $data['price'] ."<td> Year: ".$data['year']."</td>" ." </td>";
                 
                 //echo "<td>[<a href='moreinfo.php?productID=".$data['productID']."'> More Info </a>]</td>";
                  //echo "[<a onclick='return confirmDelete()' href='deleteUser.php?userId=".$user['id']."'> Delete </a>] <br />";
                 echo "</tr>";
                 
                }
     echo" </table>"; 

echo "<br/>";
?>

<?php


//used to return back to the search page
echo "<br/>";
echo "[<a href='grouptest.php'> Return to search </a>]";


//echo $data['price'];

//echo $data['productID'] ." " .$data['model'] ." " .$data['price'];

?>