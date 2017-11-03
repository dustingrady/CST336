<?php

session_start();

if(!isset($_SESSION['username'])){
    header("Location: login.html");
}
include './Connect.php';
    $conn = getDBConnection("Tech_Checkout");
    include 'includes/phpFunctions.php';


if(isset($_GET['submit'])) {  //admin has submitted the "update user" form
    
    $sql = "UPDATE user
            SET id = :id,
            firstName = :fName
            WHERE id = :id";
    $np = array();        
    $np[':id'] = $_GET['id'];       
    $np[':fName']  = $_GET['userFirstName'];       
    $stmt = $conn->prepare($sql);
    $stmt->execute($np);
    echo " Record was updated!";
}    

if(isset($_GET['id'])) {
   $userInfo = getUserInfo($_GET['id']);
   //print_r($userInfo);
}

    function selectRole($role){
        global $userInfo;
        if (strtoupper($userInfo['role']) == strtoupper($role)) {
            return "selected";
        }
    }
    

    function selectDepartment($deptId){
        global $userInfo;
        if ($userInfo['deptId'] == $deptId) {
            return "selected";
        }
    }

    
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        
        <fieldset>
            <legend>Update User Info</legend>
            <form>
                <input type="submit" name="submit" value="Update"><br>
            User Id: <input type="text" name="id" value="<?=$userInfo['id']   ?>"/>
                <br>
                First Name: <input type="text" name="userFirstName" value="<?=$userInfo['firstName']?>"/>
                <br/>
                Last Name: <input type="text" name="userLastName" value="<?=$userInfo['lastName']?>"/>
                <br/>
                Email: <input type="email" name="email" value="<?=$userInfo['email']?>"/>
                <br/>
                Phone: <input type="tel" name="phone" value="<?=$userInfo['phone']?>"/>
                <br/>
                Role: <select name="role">
                    <option value="Student" <?=($userInfo['role']=="student")?' selected':'' ?> >Student</option>
                    <option value="Faculty" <?= selectRole('Faculty')?> >Faculty</option>
                    <option value="Staff"   <?= selectRole('Staff')?>>Staff</option>
                </select>
                <br/>
                Department:
                <select name="department">
                           <option value="">Select One</option>
                           <?php
                              $departments = getDepartments();
                              foreach ($departments as $department) {
                                  echo "<option ".selectDepartment($department['id'])." value ='" . $department['id']. "'>" . $department['name']    ." </option>";
                              }
                            ?>
                         </select>
                <br/>
               <!--<input type="submit" name="submit" value="Update">-->
                
            </form>
        </fieldset>

    </body>
</html>