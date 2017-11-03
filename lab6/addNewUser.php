<?php
   session_start();
   
   if (!isset($_SESSION["username"])) {
    header("Location: login.html"); 
   }
   
    include './Connect.php';
    $conn = getDBConnection("Tech_Checkout");
    
    

    include 'includes/phpFunctions.php';
    
    function addUser(){
       global $conn;
       $sql = "INSERT INTO user (
                id,
                firstName,
                lastName,
                email,
                phone,
                role,
                deptId
                )
                VALUES (
                :id, :fName, :lName, :email, :phone, :role, :deptId
                )";
                
    $nameOfarray = array() ;
    $nameOfarray[':id']= $_GET['id'];
    $nameOfarray[':fName'] = $_GET['firstName'];
    $nameOfarray[':lName'] = $_GET['lastName'];
    $nameOfarray[':email'] = $_GET['email'];    
    $nameOfarray[':phone'] = $_GET['phone'];
    $nameOfarray[':role'] = $_GET['role'];    
    $nameOfarray[':deptId'] = $_GET['id'];
    
    // $nameOfarray = array() ;
    // $nameOfarray[':id']= $_GET['id'];
    // $nameOfarray[':fName'] = $_GET['userFirstName'];
    // $nameOfarray[':lName'] = $_GET['userLastName'];
    // $nameOfarray[':email'] = $_GET['email'];    
    // $nameOfarray[':phone'] = $_GET['phone'];
    // $nameOfarray[':role'] = $_GET['role'];    
    // $nameOfarray[':deptId'] = $_GET['department'];
    
    $stmt = $conn -> prepare ($sql);
    $stmt -> execute($nameOfarray);
    }
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin: Add New User </title>
    </head>
    <body>
        
        <h1> Add New User</h1>
        
        <form>
            <input type="submit" name="Submit"><br>

            User Id: <input type="text" name="id" />
            <br>
            First Name: <input type="text" name="firstName" />
            <br/>
            Last Name: <input type="text" name="lastName" />
            <br/>
            Email: <input type="email" name="email"/>
            <br/>
            Phone: <input type="tel" name="phone"/>
            <br/>
            Role: <select name="role">
                <option value="Student">Student</option>
                <option value="Faculty">Faculty</option>
                <option value="Staff">Staff</option>
            </select>
            <br />
            
            Department:
                <select name="departments">
                <?php 
                    $departments = getDepartments();
                    foreach($departments as $department){
                        echo "<option value='" . $department['id']. "'>" . $department['name'] . "</option>";
                    }
                ?>
                </select>
        </form>
    <?php
        if (isset($_GET['Submit'])){
            //echo "form was submitted";
            addUser();
            echo "The user was added sucessfully";
        }
    ?>
    </body>
</html>