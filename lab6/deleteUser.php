<?php
session_start();

if (!isset($_SESSION["username"])) {  //Check whether the admin has logged in
    header("Location: login.html"); 
}

include './Connect.php';

$dbConn = getDBConnection("Tech_Checkout");


$sql = "DELETE FROM user
        WHERE id = " . $_GET['id'];
$stmt = $dbConn->prepare($sql);
$stmt->execute();

header("Location: admin.php");

?>