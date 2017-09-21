<?php
    $alphaNumerics = array("a","b","c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");
    $numbers = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
    $listOfPasswords = array ();
    $counter = 0;
    $password = "";
    
    function generatePass($alphaNumerics, $numbers){
        for($i = 0; $i < rand(5,10); $i++) {
            $chooser = rand(1,2);
            $upper = rand(1,2);
            if($counter == 3) $chooser = 1;
            switch($chooser) {
                case 1: 
                    $temp = $alphaNumerics[rand(1,26)];
                    if($upper == 1) $password .= strtoupper($temp);
                    else $password .= $temp;
                    break;
                case 2: 
                    $password .= $numbers[rand(0,9)];
                    $counter++;
                    break; 
            }
        }
        return $password;
    }
    
    function displayResults($listOfPasswords){
        for ($i=0; $i<sizeof($listOfPasswords); $i++){
            echo $listOfPasswords[$i];
            echo "<br>";
        }
    }
?>

<!DOCTYPE html>

<html>
<head>
     <style>
    @import url(styles/style.css);
      
      </style>
       <h1 style="blue; background:gray "> Extra Credit </h1>
     <meta charset="utf-8">
     <title>Extra Credit</title>
</head>

<body>
    <hr> 
    <?php
        for($i = 0; $i < 25; $i++) {
            array_push($listOfPasswords, generatePass($alphaNumerics, $numbers));
        }
        displayResults($listOfPasswords);
    ?>  
    <hr/>
</body>
    <footer>

    <footer/>
</html>