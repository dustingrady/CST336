<?php
session_start();  //start or resume an existing session

include './Connect.php';

function error() {

$conn = getDBConnection("Tech_Checkout");

$username = $_POST['username'];
$password = sha1($_POST['password']);   //hash("sha1",$_POST['password']);

//USE NAMEDPARAMETERS TO PREVENT SQL INJECTION
//$sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
$sql = "SELECT * FROM admin WHERE username = :username AND password = :password";

$namedParameters[':username'] = $username;
$namedParameters[':password'] = $password;


$statement = $conn->prepare($sql);
$statement->execute($namedParameters);
$record = $statement->fetch(PDO::FETCH_ASSOC);

//print_r($record);

 if (empty($record)) { //wrong credentials
     
     echo "Wrong username or password!";
     
 } else {
     
     $_SESSION["adminName"] = $record['firstname'] . " " . $record['lastname'];
     $_SESSION["username"]  = $record['username'];
     header("Location: admin.php"); //redirect to the main admin program
     
 }
 
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin Section: Login Screen</title>
    </head>
    <body>
        
        <h1> Admin Section</h1>
        
        <form method="post" action="login.php">
            
            Username: <input type="text" name="username">  <br />
            
            Password: <input type="password" name="password"> 
            
            <input type="submit" name='login' value="Login!"/>
            <br /><br />
            <?php
            if(isset($_POST['login'])) {
                error();
            }
            ?>
            
        </form>

    </body>
</html>