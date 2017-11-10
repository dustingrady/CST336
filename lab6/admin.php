<?php
session_start();

if (!isset($_SESSION["username"])) {  //Check whether the admin has logged in
    header("Location: login.html"); 
}

include './Connect.php';

$dbConn = getDBConnection("Tech_Checkout");


function getAllUsers() {
    global $dbConn;
    $sql = "SELECT * FROM user ORDER BY lastName";
    $statement = $dbConn->prepare($sql);
    $statement->execute();
    $records = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    return $records;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title> ADMIN PAGE </title>
        
        <script>

            function confirmDelete(userFullName) {
                
                var confirmDelete = confirm("Do you really want to delete " + userFullName + "?");
                if (!confirmDelete){
                    return false;
                }
                
            }            
            
        </script>
        
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        
        <style>
            
            .jumbotron {
                text-align:center;
            }
            
        </style>
    </head>
    <body>
        
        <div class="jumbotron">

            <h1> Admin Page </h1>
            
            <h3> Welcome <?=$_SESSION['adminName']?> </h3>

        </div>

        
        <hr>
        
        <form action="addNewUser.php">
          <input type="submit" value="Add New User" />
        </form>
        
        <form action="logout.php" >
            <input type="submit" value="Logout" />
        </form>
        
        <br />
        
        <div style="float:left">
        <?php
        
            $users = getAllUsers();
            foreach ($users as $user) {
                
                // echo "<a href='userInfo.php?id=".$user['id']."' target='userInfoFrame'>" . $user['firstName'] . "</a> ";
                // echo "<a href='' onclick='window.open(\"userInfo.php?id=".$user['id']." \", \"userWindow\", \"width=200, height=200\" )'>" . $user['lastName'] . " </a> ";
                // echo $user['email'];

               echo "<a href='userUpdate.php?id=".$user['id']."'>
                     <button type=\"button\" class=\"btn btn-default btn-sm\">
                     <span class=\"glyphicon glyphicon-pencil\" aria-hidden=\"true\"></span> Update
                     </button></a>";
               
               echo "<a onclick=confirmDelete()  href='deleteUser.php?id=".$user['id']."'>
                     <button type=\"button\" class=\"btn btn-danger btn-sm\">
                     <span class=\"glyphicon glyphicon-remove\" aria-hidden=\"true\"></span> Delete
                     </button></a>";               
                echo "<br />";
            }
        ?>
        </div>
    </body>
</html>