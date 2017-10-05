<?php
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Top Shelf Coffee Roasters </title>
        <link rel="stylesheet" type="text/css" href="./CSS/Styles.css"> 
    </head>
    <body>
        <div class="container">
            <div class="content">
                <h1> Coffee Shop </h1>
                <div class="banner">
                    <img src="./Img/coffeeBanner.png"></img>
                </div>
                
                <div class="entryForm">
                    <form action="Output.php" method="POST">
                        <div class="formEntry">
                            <div id="nameField">
                                <p>Enter Name:
                                <input type="text" name="name" required/></p> 
                            </div>
                            
                            <div id="ageField">
                                <p>Enter your age (must be 18 or older):
                                <input type="number" name="age" min="18" max="120" required/>
                                </p>
                            </div>
                            
                            <div id="CoffeeType">
                                <p>Random question of the day (preferred coffee type):
                                <select name="Type" required/>
                                    <option selected disabled hidden value = ''></option>
                                    <option value="Light Roast">Light Roast</option>
                                    <option value="Medium Roast">Medium Roast</option>
                                    <option value="Medium-Dark Roast">Medium-Dark Roasts</option>
                                    <option value="Dark Roasts">Dark Roasts</option>
                                </select>
                                </p>
                            </div>
                            
                            <div id="merchandise">
                                <h3>Website Inventory</h3>
                                <p><input type="checkbox" name="merchandise[]" value="Light Roast ($25)">Light Roast ($25)</p>
                                <p><input type="checkbox" name="merchandise[]" value="Medium Roast ($20)">Medium Roast ($25)</p>
                                <p><input type="checkbox" name="merchandise[]" value="Medium-Dark Roast ($22.50)">Medium-Dark Roast ($22.50)</p>
                                <p><input type="checkbox" name="merchandise[]" value="Dark Roast ($15)">Dark Roast ($22.50)</p>
                            </div>
                            
                            <div>
                                <h3>Coffee Delivery Subscription ($19.99 Per Month)</h3>
                                <div class="radios">
                                    <input type="radio" name="month" value="1"> 1 month
                                    <input type="radio" name="month" value="3"> 3 months
                                    <input type="radio" name="month" value="6"> 6 months
                                    <input type="radio" name="month" value="12"> 12 months
                                </div>
                            </div>
    
                        </div>
                        <br /><br />
                        <div class="formSubmission">
                            <input class="submit" type="image" src="./Img/submit.png" alt="Submit">
                        </div>
                        <br />
                    </form>
                </div>
            </div>
        </div>
    </body>
     <footer>
            <hr>  
            <img src = "./Img/csumb.png" alt = "CSUMB logo" />
        </footer>
</html>