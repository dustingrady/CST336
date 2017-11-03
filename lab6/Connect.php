<?php

function getDBConnection($dbname) {

    $host = "us-cdbr-iron-east-05.cleardb.net";
    $dbname = "heroku_93ec6bcdbdbee3b";
    $username = "b042540094e49c";
    $password = "0698fced";
    
    try {
        //Creating database connection
        $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        // Setting Errorhandling to Exception
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    }
    catch (PDOException $e) {
        
        echo "Error: $e";
        exit();
        
    }
    return $dbConn;
}

?>