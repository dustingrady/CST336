<?php 

session_start(); 
include 'dbConn.php'; 
$connection = dbConn(); 
if (isset($_POST['loginForm'])) { 
     
    $username = $_POST['username']; 
    $password = $_POST['password'];  
    
    $sql = "SELECT *  
            FROM administrator 
            WHERE username = :username 
            AND password = :password";  
             
    $namedParameters = array(); 
    $namedParameters[':username'] = $username;                 
    $namedParameters[':password'] = $password;             
     
    $statement = $connection->prepare($sql);  
    $statement->execute($namedParameters); 
    $record = $statement->fetch(PDO::FETCH_ASSOC); 
     
    if (empty($record)) {  
         
        echo "Wrong username or password!"; 
         
    } 
    
    else { 
         
        $_SESSION['username'] = $record['username']; 
        $_SESSION['adminName'] = $record['name']; 
         
        header("Location: admin.php"); 
    } 
} 

?>