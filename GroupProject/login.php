
<?php
session_start();   //starts or resumes a session

function loginProcess() {

    if (isset($_POST['loginForm'])) {  //checks if form has been submitted
    
        include 'database.php';
        $conn = getDatabaseConnection();
      
            $username = $_POST['username'];
            $password = sha1($_POST['password']);
            
            $sql = "SELECT *
                    FROM Admin
                    WHERE username = :username 
                    AND   password = :password ";
            
            $namedParameters = array();
            $namedParameters[':username'] = $username;
            $namedParameters[':password'] = $password;

            $stmt = $conn->prepare($sql);
            $stmt->execute($namedParameters);
            $record = $stmt->fetch();
            
            if (empty($record)) {
                
                echo "Wrong Username or password";
                
            } else {
                
               $_SESSION['username'] = $record['username'];
               $_SESSION['adminName'] = $record['firstName'] . "  " . $record['lastName'];
               //echo $record['firstName'];
               header("Location: admin.php"); //redirecting to admin.php
                
            }
           // print_r($record);
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
       <link href="css/styles.css" rel= "stylesheet" type="text/css">
    </head>
    <body>
     <h1 align="center"><img src="img/keyboard.jpeg" alt="picture of keyboard"/></h1>
            <h2> Computer Solutions </h2>
            
            <form method="post">
                
               

<fieldset>
<legend>
    Log In:
 </legend>
<label for="username"></label>  Username:<br>
<input type="text" name="username" id="username"><br><br>


<label for="password"></label>Password:<br>
<input type="password" name="password" id="password"><br><br>

</fieldset>
<br>
            </form>

            <br />
            
            <?=loginProcess()?>
    </body>
</html>