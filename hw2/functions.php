<?php
    function generateNumber(){
    $randomValue = rand(0,999);
        echo "<h1>$randomValue</h1>";
        $a = IsPrime($randomValue);
        if ($a==0){
            echo 'This is not a Prime Number.....'."\n";
        }
        else{
            echo "<h3><font color=blue>'This is a Prime Number!'</font></h3>"."\n";
        }
    }
    
    function IsPrime($number)
    {
        for($i=2; $i<$number; $i++)
        {
            if($number %$i ==0)
	        {
		        return 0;
		    }
        }
        return 1;
    }
?>