<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Confirmation Page </title>
        <link rel="stylesheet" type="text/css" href="./CSS/Styles.css"> 
    </head>
    <body>
        <div class="container">
            <div class="content">
                <p>Thank you, <strong><?= $_POST["name"] ?></strong>!</p>
                <p>Your order has been placed. <strong><?= $_POST["Anime"] ?></strong></p>
                <br />                
                <p><b>You ordered:</b></p>
            
                <?php
                    echo "<div class=\"center\">";
                        $price = 0;
                        if(!empty($_POST['merchandise']))
                        {
                            foreach($_POST['merchandise'] as $value)
                            {
                                echo $value . "<br />";
                                switch ($value)
                                {
                                    case "Light Roast (\$25)":
                                        $price += 25;
                                        break;
                                    case "Medium Roast (\$25)":
                                        $price += 20;
                                        break;
                                    case "Medium-Dark Roast (\$22.50)":
                                        $price += 22.50;
                                        break;
                                    case "Dark Roasts (\$22.50)":
                                        $price += 15;
                                        break;
                                }
                            }
                        }
                        else
                        {
                            echo "No Merchandise Purchased :(<br />";
                        }
                        $month = $_POST["month"];
                        if (empty($month))
                        {
                            echo "0 Month Coffee Subscription";
                        }
                        else
                        {
                            echo $month . " Month Coffee Subscription";    
                        }
                        $price += $_POST["month"] * 19.99;
                    echo "</div>";
                    echo "<p><b>Total: $" . $price . "</b></p>";
                ?>
            </div>
        </div>
    </body>
</html>
