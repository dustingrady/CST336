<?php
    $server = 'localhost';
    $user = 'root';
    $pass = 'root';
    $dbname = 'midterm';
    $con = mysql_connect($server, $user, $pass) or die("Can't connect");
    mysql_select_db($dbname);
    
   // Performing SQL query
    $query = "SELECT firstName, lastName, country_of_birth FROM celebrity WHERE country_of_birth != 'USA' and gender = 'F' ORDER BY lastName ASC";
    $result = mysql_query($query) or die('Query failed: ' . mysql_error());
    
    //print_r($result);
    echo "<table>\n";
    while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
        echo "\t<tr>\n";
        foreach ($line as $col_value) {
            echo "\t\t<td>$col_value</td>\n";
        }
        echo "\t</tr>\n";
    }
    echo "</table>\n";
?>

