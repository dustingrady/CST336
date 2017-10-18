<style>
    <?php include './style.css'; ?>
</style>

<?php

include './Connect.php';

$dbConn = getDBConnection("Tech_Checkout");

function getDevices() {
    global $dbConn;
    
    $sql = "SELECT * FROM device WHERE 1";
    
    //Following line doesn't prevent SQL injection!
    //$sql .=" WHERE deviceName LIKE '%".$_GET['deviceName']. "%'  ";
    //following line prevents SQL injection by using a named parameter.
    
    $sql .=" AND deviceName LIKE :deviceName ";
    $namedParameters[':deviceName'] = '%' . $_GET['deviceName'] . '%';
    
    if (isset($_GET['status']) ) { //"status checkbox was checked"
        
        $sql .= " AND status = :status";
        $namedParameters[':status'] = 'Available';
        
    }
    
    if (!empty($_GET['deviceType']) ) {
    
        $sql .=" AND deviceType = :deviceType ";
        $namedParameters[':deviceType'] = $_GET['deviceType'];
        
    }
    
    if (!empty($_GET['name']) ) {
    
        $sql .=" ORDER BY deviceName ASC ";
        
    }
    
    else if (!empty($_GET['price']) ) {
        
        $sql .=" ORDER BY price DESC ";
        
    }
    
    else {
        
    $sql .=" ORDER BY deviceName ASC ";
    
    }
    
    $stmt = $dbConn -> prepare ($sql);
    $stmt -> execute($namedParameters);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    return $records;
    
}

function getDeviceTypes() {
    global $dbConn;
    
    $sql = "SELECT DISTINCT deviceType FROM device ORDER BY deviceType";
    $stmt = $dbConn -> prepare ($sql);
    $stmt -> execute( );
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    return $records;
    
}
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Lab 5 </title>
    </head>
    <body>
        <h1>Technology Checkout System</h1>
        <form>
            
            Device: <input type="text" name="deviceName"/>
            Type: <select name="deviceType">
                  <option value="">Select One</option>
                  <?php
                  $deviceTypes = getDeviceTypes();
                  foreach ($deviceTypes as $deviceType) {
                  echo "<option>" . $deviceType['deviceType'] . "</option>";
                  }
                  ?>
                     </select>
            
            <input type="checkbox" name="status" id="status" />
            <label for="status"> Available </label>
            <input type="radio" name="name" value="name"> Sort: Name
            <input type="radio" name="price" value="price"> Sort: Price
            <input type="submit" value="Search" />
            
        </form>
        
        <br />
        <hr>
        <br />
        <!--<data>-->
        <table style="width:50%">
        <tr>
            <th>Device Name</th>
            <th>ID</th>
            <th>Device Type</th>
            <th>Price</th>
            <th>Availability</th>
        </tr>
        <?php
        
            $devices = getDevices();
            
            foreach($devices as $device) {
                echo '
                <tr>
                    <td>'.$device['deviceName'].'</td>
                    <td>'.$device['id'].'</td>
                    <td>'.$device['deviceType'].'</td>
                    <td>'.$device['price'].'</td>
                    <td>'.$device['status'].'</td>
                </tr>';
            }
            /*
            foreach($devices as $device) {
                echo $device['deviceName'] . "   " . $device['id']  . "   " . $device['deviceType']  . "   " . $device['price']  . "   " . $device['status'] . "<br />";
            }
            */
        ?>
        </table>
        <!--</data>-->

    </body>
</html>