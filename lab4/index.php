<?php
$backgroundImage = "img/sea.jpg";
// API call goes here
if (isset($_GET['keyword'])) { 
    include 'api/pixabayAPI.php';
    $keyword = $_GET['keyword'];
    if(!empty($_GET['category'])) { 
    $keyword = $_GET['category'];
    }
    if(isset($_GET['layout'])) {
        $imageURLs = getImageURLs($keyword, $_GET['layout']);
    }else{
        $imageURLs = getImageURLs($keyword);
    }
     $backgroundImage = $imageURLs[array_rand($imageURLs)];
} 
function checkIfSelected($option){
    if ($option == $_GET['category']) {
            return "selected";
        }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Lab 4: Pixabay Carousel </title>
         <meta charset="utf-8">
            <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <style>
           @import url("css/styles.css");
           
           body {
               background-image: url(<?=$backgroundImage?>);
               background-size: 100% 100%;
               background-attachment:fixed;
           }
           
         </style>
    </head>
    <body>
        <br /><br />
        <!-- html form goes here -->
        <form>
            <input type="text" name="keyword" placeholder="keyword" value="<?=$_GET['keyword']?>"/>
            <div id="rgroup">
            <input type="radio"id="lvertical" name="layout" value="vertical" <?= ($_GET['layout']=='vertical') ? "checked" : "" ?> >
            <label for="lvertical"> Vertical</label>
            <br/>
            <input type="radio" id="lhorizontal" name="layout" value="horizontal" <?= ($_GET['layout']=='horizontal') ? "checked" : "" ?> >
            <label for="lhorizontal"> Horizontal</label>
            </div>
            <br/>
            
            <select name="category">
                <option value=""> - Select One - </option>
                <option <?=checkIfSelected('earth')?> value="earth">Earth</option>
                <option <?=checkIfSelected('wind')?>  value="wind">Wind</option>
                <option <?=checkIfSelected('fire')?> value="fire">Fire</option>
                 <option <?=checkIfSelected('water')?> value="water">Water</option>
                  <option <?=checkIfSelected('heart')?> value="heart">Heart</option>
            </select>
          <br/>
            <input id="submit-btn" type="submit" value="Search" />
            
        </form>
     
         <br /><br />
         <?php
            if(!isset($_GET['keyword'])) { // form has not been submitted
                echo "<h2> Enter a keyword to begin.</h2>";
            }else { // form has been submitted
                 
            if(empty($_GET['keyword']) && empty($_GET['category']) ) {
            echo "<h2 style='color:red;'> Please enter a keyword to continue. </h2>";
            return;
            exit;
        }
        ?>
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators here -->
        <ol class="carousel-indicators">
        <?php
             for($i=0;$i <7;$i++){
                echo "<li data-target='#carousel-example-generic' data-slide-to='$i'";
                echo ($i == 0) ? " class='active'": "";
                echo "></li>";
             }
          ?>
          </ol>
        <!-- Wrapper for Images -->
        <div class="carousel-inner" role="listbox">
            <?php
            // Display Carasoul here
                for($i=0;$i<7;$i++){
                    do {
                        $randomIndex = rand(0,count($imageURLs));
                    } while(!isset($imageURLs[$randomIndex]));
                    echo '<div class="item ';
                    echo ($i == 0) ? "active" : "";
                    echo '">';
                    echo '<img src="' . $imageURLs[$randomIndex] . '" width="700" >';
                    echo '</div>';
                    unset($imageURLs[$randomIndex]);
                }
            ?>
        </div>
        <!-- controls here -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
        <!--<h1> reg h1 tag statemnet </h1>-->
        <?php
        } // end of else statemnet
        ?>
        <br>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>     
    </body>
</html>