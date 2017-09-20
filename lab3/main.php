<?php
    $names = array(
        "Bulbasaur",
        "Ivysaur",
        "Venusaur",
        "Charmander",
        "Charmeleon",
        "Charizard",
        "Squirtle",
        "Wartortle",
        "Blastoise",
        "Caterpie",
        "Metapod",
        "Butterfree",
        "Weedle",
        "Kakuna",
        "Beedrill",
        "Pidgey",
        "Pidgeotto",
        "Pidgeot",
        "Rattata",
        "Raticate",
        "Spearow",
        "Fearow",
        "Ekans",
        "Arbok",
        "Pikachu",
        "Raichu",
        "Sandshrew",
        "Sandslash",
        "Nidorina",
        "Nidoqueen",
        "Nidoran_male",
        "Nidoran_female",
        "Nidorino",
        "Nidoking",
        "Clefairy",
        "Clefable",
        "Vulpix",
        "Ninetales");
        
    $players = array();
    $scores = array();
    $cards = array();
        
    function getPlayers($numberOfPlayers){
        global $names, $players;
        
        $players = array_rand($names, $numberOfPlayers);
    }
    
    function generateDeck()
    {
        $card = array();
        
        for($i = 0; $i < 52; $i++)
        {
            array_push($card, ($i + 1));
            // echo $i;
        }
        shuffle($card);
        
        return $card;
    }
    
    global $deck;
    $deck = generateDeck();
    
    function getHand() {
        global $deck, $names, $players;
        
        for($i = 0; $i < count($players); $i++){
            echo  "<h2>" . $names[$players[$i]] . "<h2/>", "<img src='img/pokemon/" . $names[$players[$i]] . ".png'>";
            
            $score = 0;
            
            do {
                $crd = ($deck[(count($deck) - 1)] % 13) + 1;
                $cardSuit =  floor($crd / 13);
                $suitStr = "";
            
                switch($cardSuit) {
                    case 0:
                        $suitStr = "clubs";
                        break;
                    case 1:
                        $suitStr = "diamonds";
                        break;
                    case 2:
                        $suitStr = "hearts";
                        break;
                    case 3:
                        $suitStr = "spades";
                        break;
                }
                
                echo "<img src = 'img/$suitStr/$crd.png' /> ";
            
                if ($crd >= 1 && $crd <= 13) {
                    $score = $score + $crd;
                } elseif ($crd >=14 && $crd <= 26){
                    $score = $score + $crd - 13;
                } elseif ($crd >= 27 && $crd <=39){
                    $score = ($score + $crd - 26);
                } else {
                    $score = ($score + $crd - 39);
                }
            
                array_pop($deck);
            
            } while ($score < 39);
            
            echo $score . " ";
        }
            return $score;
    }
    
    function displayWinner()
    {
    }
?>

<!DOCTYPE html>

<html>
<head>
     <style>
    @import url(styles/style.css);
      
      </style>
       <h1 style="blue; background:gray "> Silver Jack </h1>
     <meta charset="utf-8">
     <title>Lab 3: Silverjack</title>
</head>

<body>
    <hr> 
    <?php
        
        getPlayers(4);
        getHand();
        displayWinner();
    ?>  
    <hr/>
</body>
    <footer>

    <footer/>
</html>