<?php

function getDatabaseConnection() {
    /*
    $host = "us-cdbr-iron-east-05.cleardb.net";
    $username = "b4038f71e14ee4";
    $password = "227621f2";
    $dbname = "heroku_22106684c98b3b9"; 
    
    
    // Create connection
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    */
    
    //used to connect to local database
    $servername = "localhost";
    $username = "root";
    $password = "MYSECRET";
    $dbname = "c9"; //name of the database in phpmyadmin
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
   
   //$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    return $dbConn; 
}


//mysql://b4038f71e14ee4:227621f2@us-cdbr-iron-east-05.cleardb.net/heroku_22106684c98b3b9?reconnect=true
        // $connect = mysqli_connect("us-cdbr-iron-east-05.cleardb.net","b4038f71e14ee4","227621f2","heroku_22106684c98b3b9");
    
?>