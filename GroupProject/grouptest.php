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
$SESSION= "user";
//include 'database.php';
//$conn = getDatabaseConnection();

//this way works for local host
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
    //echo "Connected successfully" ."<br>";
    
    $sql = "SELECT DISTINCT model FROM `products` WHERE 1"; //query statement
    
    echo "<form>";
    
    //checks for computer or part
    ?>
    <html>
        <br>
        <select name ='category' required>
    </html>
    
    <?php
   // echo "<br>" ."<select name='category'>";
    echo "<option value=" .'"' ."products" .'"' .">" ."---Category---" ."</option>";
    echo "<option value=" .'"' ."comps" .'"' .">" ."Computer" ."</option>";
    echo "<option value=" .'"' ."products" .'"' .">" ."Parts" ."</option>";
    
    echo "</select>";
    
    echo "<select required name='model'>";
    echo "<option value=" .'"' ."" .'"' .">" ."---Maker---" ."</option>";

    //fills the selections for the model
    echo "<option value=" .'"'  ."GTX"  .'"' .">" ."GTX" ."</option>";
    echo "<option value=" .'"'  ."RX"  .'"' .">" ."RX" ."</option>";
    echo "<option value=" .'"'  ."Intel"  .'"' .">" ."Intel" ."</option>";
    echo "<option value=" .'"'  ."AMD"  .'"' .">" ."AMD" ."</option>";
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            //echo "<option value=" .'"' .'=' .$row['model'] .'"' .">" .$row['model'] ."</option>";
            echo "<option value=" .'"' .'=' .'\'' .$row['model'] .'\'' .'"' .">" .$row['model'] ."</option>";
            }
    } else {
        echo "0 results";
    }
    echo "</select>";
    
    //used for the type: GPU, CPU
    $sql = "SELECT DISTINCT modelType FROM `products` WHERE 1";
    
    echo "<select required name='type'>";
    echo "<option value=" .'"' ."" .'"' .">" ."---type---" ."</option>";

    //fills the selections for the model
    echo "<option value=" .'"'  ."GPU"  .'"' .">" ."GPU" ."</option>";
    echo "<option value=" .'"'  ."CPU"  .'"' .">" ."CPU" ."</option>";
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            //echo "<option value=" .'"' .'=' .$row['modelType'] .'"' .">" .$row['modelType'] ."</option>";
            echo "<option value=" .'"' .'=' .'\'' .$row['modelType'] .'\'' .'"' .">" .$row['modelType'] ."</option>";
            }
    } else {
        echo "0 results";
    }
    echo "</select>";
    
    //used for sorting by price
    echo "<select name='price'>";
    
    echo "<option value=" .'"' ."" .'"' .">" ."---sort by---" ."</option>";
    
    echo "<option value=" .'"' ." ORDER BY price ASC" .'"' .">" ."price: low to high" ."</option>";
    echo "<option value=" .'"' ." ORDER BY price DESC" .'"' .">" ."price: high to low" ."</option>";
    
    echo "</select>";
    
    echo "<input type='submit' value='Submit'/>";
    
    echo "</form>";
    
//_____________________________
  
  //third filter could be a text field to enter the model name 
  //button to sort low to high/high to low
    
//_____________________________

//this is for if they pick prebuilt computers
if($_GET['category'] == "products")
{
function dataList(){
    global $conn;
  $sql= "SELECT * FROM " .$_GET['category'] ." WHERE " ."model =" .'\''  .$_GET['model'] .'\'' ." AND modelType =" .'\'' .$_GET['type'] .'\'' .$_GET['price'];
  
  /*
  $stmt = $conn->prepare($sql);
  //$stmt->execute();
  $records = $stmt->fetchAll(PDO::FETCH_ASSOC);*/
  //echo $sql;
  $result = $conn->query($sql);
  
   
  //print_r($records);
  return $result;
    
} 


$product = dataList();
    
            //
              echo "<table  ' border='1'>";
              echo"<tr>";
              echo"<th>Model</th>";
              echo"<th>Name</th>";
              echo"<th>Type</th>";
              echo"<th>Price</th>";
              echo"<th>More</th>";
             foreach($product as $data) {
                
                
                 echo "<tr>";
                 
                 echo "<td> Maker: ".$data['model']."</td>" . "<td> Name: " .$data['modelName'] ."</td>". "<td> Type: ". $data['modelType'] ."</td>". "<td> Price: " . $data['price'] ." </td>";
                 
                 echo "<td>[<a href='moreinfo.php?productID=".$data['productID']."'> More Info </a>]</td>";
                  //echo "[<a onclick='return confirmDelete()' href='deleteUser.php?userId=".$user['id']."'> Delete </a>] <br />";
                 echo "</tr>";
                 
                }
     echo" </table>"; 
}
    //echo "<br/> SQL statement: <br/>" .$sql;
             
    //does the actual query
    /*
    $sql= "SELECT * FROM `products` WHERE " ."model " .$_GET['model'] ." AND modelType " .$_GET['type'] .$_GET['price'];
    //echo $sql ."<br/>";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo $row['model'] ."   " .$row['modelType'] ."   " .$row['year'] ."     " .$row['price'];
            echo "<br/>";
        }
    } else {
        echo "0 results";
    }
    */
    
    //_________used if they pick computers
if($_GET['category'] == "comps")
{
function dataList2(){
    global $conn;
  //$sql= "SELECT * FROM " .$_GET['category'] ." WHERE 1"; //."model " .$_GET['model'] ." AND modelType " .$_GET['type'] .$_GET['price']; //Working
  $sql= "SELECT * FROM " .$_GET['category'] ." WHERE " ."cpu LIKE " ."'%" .$_GET['model'] ."%'" ;// AND modelType " .$_GET['type'] .$_GET['price']; //Testing

  //echo $sql; //TESTING
  $result = $conn->query($sql);
  
   //echo $sql;
  //print_r($records);
  return $result;
    
} 

$product = dataList2();
            //
            
              echo "<table  ' border='1'>";
              echo"<tr>";
              echo"<th>Model</th>";
              echo"<th>Name</th>";
              echo"<th>Type</th>";
              echo"<th>Price</th>";
              //echo"<th>More</th>";
             foreach($product as $data) {
                
                
                 echo "<tr>";
                 
                 echo "<td> Maker: ".$data['model']."</td>" . "<td> Name: " .$data['modelName'] ."</td>". "<td> Type: ". $data['modelType'] ."</td>". "<td> Price: " . $data['price'] ." </td>";
                 
                 //echo "<td>[<a href='moreinfo.php?productID=".$data['productID']."'> More Info </a>]</td>";
                  //echo "[<a onclick='return confirmDelete()' href='deleteUser.php?userId=".$user['id']."'> Delete </a>] <br />";
                 echo "</tr>";
                 
                }
     echo" </table>"; 
}

    
    //$conn->close();
?>