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
        
    function getPlayers($num){
        global $names, $players;
    
        $players = array_rand($names, $num);
    }
    
    function getHand(){
        global $names, $players, $scores, $cards;
        for($i = 0; $i < count($players); $i++){
           // echo "<img src='img/pokemon/" . $names[$players[$i]] . ".png'>";
            echo  "<h2>" . $names[$players[$i]] . "<h2/>", "<img src='img/pokemon/" . $names[$players[$i]] . ".png'>";
            $total = 0;
            while($total < 42){
                $card = rand(1,52);
                while(in_array($card, $cards)){
                    $card = rand(1,52);
                }
                if(($total+(($card%13 == 0 ? 13 : $card%13))) <= 42){
                    $total += $card % 13;
                    if($card < 14){
                        echo "<img src='img/clubs/" . $card . ".png'>";
                    }
                    else if($card < 27){
                        echo "<img src='img/diamonds/" . ($card%13 == 0 ? 13 : $card%13) . ".png'>";
                    }
                    else if($card < 40){
                        if($card%13 == 0){
                            $card = 13;
                        }
                        echo "<img src='img/hearts/" . ($card%13 == 0 ? 13 : $card%13) . ".png'>";
                    }
                    else{
                        if($card%13 == 0){
                            $card = 13;
                        }
                        echo "<img src='img/spades/" . ($card%13 == 0 ? 13 : $card%13) . ".png'>";
                    }
                    $cards[] = $card;
                }
                else{
                    break;
                }
            }
            $scores[] = $total;
            echo "<h1>"."<span style=color:red>".$total ."</span>". "<h1/>";
            echo "<hr> <hr/>";
            echo "<br>";
        }
    }
    
    function displayWinner()
    {
        global $names,$players,$scores;
        $max=0;
        
        for($i = 0; $i < count($players); $i++)
        {
            if($scores[$i]>$max)
            {
               $max=$scores[$i];
               
            }
        }
         for($i = 0; $i < count($players); $i++)
        {
            if($scores[$i]==$max)
            {
               echo "<img src='img/pokemon/" . $names[$players[$i]] . ".png'>";
               echo "<h1>" . $names[$players[$i]]." Wins!" . "<hr/>";
               echo "<br/>";
            }
        }
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
