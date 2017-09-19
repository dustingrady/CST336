<!DOCTYPE html>
<?php
    include './functions.php';
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
                ?>
                
                <p><b>Note: </b>A prime number (or a prime) is a natural number greater than 1</p>
                <p>that has no positive divisors other than 1 and itself.</p>
                
                <br /><br />
                <blockquote><i>"I think computer viruses should count as life.  I think it says something about human nature that the only form of life we have created so far is purely destructive.  We’ve created life in our own image."</i></blockquote>
                – Stephen Hawking<br />
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
    
