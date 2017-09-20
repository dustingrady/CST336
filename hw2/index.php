<!DOCTYPE html>
<?php
    include './functions.php';
    $descriptionArray = array_fill(0,100," ");
    $descriptionArray=array("<h4>Note:", "A", "prime", "number", "is", "a", "natural", "number", "greater", "than", "1", "that", "has", "no", "positive", "divisors", "other", "than", "1", "and", "itself. </h4>");
?>

<html>
    
<!-- This is the head -->
<!-- All styles and javascript go inside the head -->
    <head>
        <meta charset="utf-8" />
        <title>Prime Number Checker</title>
        <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="style.css">
        
    </head>
<!-- closing head -->

    <!-- This is the body -->
    <!-- This is where we place the content of our website -->
    <body>
        <header>
            <h1>Prime Number Checker</h1>
        </header>
        <nav>
            <!-- Navigation stuff here -->
        </nav>
        
        <br /><br />
        <main>
            <img src="img/OptimusPrime.png" alt="OptimusPrime">
            <div id="content">
            
            <div id="main">
                <?php
                    generateNumber(); //Call our generateNumber function to kick things off
                    echo "<br>";
                    //Print our description using a string array
                    //Uses "sizeof", "array_fill" and "array" functions
                    
                    for($i=0; $i<sizeof($descriptionArray); $i++){
                        array ($descriptionArray[$i], $descriptionArray[$i] .= " ");//Append spaces to values
                        echo $descriptionArray[$i];
                    }
                ?>
                
                <!--<p><b>Note: </b>A prime number (or a prime) is a natural number greater than 1</p>
                <p>that has no positive divisors other than 1 and itself.</p> -->
                
                <br /><br />
                <blockquote><i>"God may not play dice with the universe, but something strange is going on with the prime numbers."</i></blockquote>
                – Paul Erdos<br />
            </div>
        </main>
        
        <!-- This is the footer -->
        <!-- The footer goes inside the body but not always -->
        <footer>
            <hr>
            CST336 Internet Programming. 2017 Grady<br />
            Disclaimer: The information in this webpage is fictitous.<br />
            It is used for academic purposes only. <br />
            <img src="img/csumb.png" alt="CSUMB">
        </footer>
        <!-- closing footer -->
        
    </body>
    <!-- closing body -->
</html>
    
