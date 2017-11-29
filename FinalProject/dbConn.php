<?php

function dbConn(){
    $host = "us-cdbr-iron-east-05.cleardb.net";
    $dbname = "heroku_93ec6bcdbdbee3b";
    $username = "b042540094e49c";
    $password = "0698fced";

    // Create connection
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    return $conn;
    
 }

function getDataBySQL($sql) {
    global $connection;
    $statment = $connection -> prepare($sql);
    $statment -> execute();
    $records = $statment -> fetchALL (PDO::FETCH_ASSOC);
    return $records;
}

?>