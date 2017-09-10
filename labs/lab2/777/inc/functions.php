        <?php
        function play(){
        $randomValue1 = rand(0,3);
        $randomValue2 = rand(0,3);
        $randomValue3 = rand(0,3);
        
        function displaySymbol($value, $pos)
        {
             switch($value)
        {
            case 0: $symbol = "seven";
            break;
            case 1: $symbol = "lemon";
            break;
            case 2: $symbol = "grapes";
            break;
            case 3: $symbol = "orange";
            break;
        }
           echo "<img id='reel$pos' src='img/$symbol.png' alt='$symbol' title='". ucfirst($symbol) ."' width='70' />";
        }
        
        function displayPoints($value1, $value2, $value3)
        {
            echo"<div id= 'output'>";
            if($value1 == $value2 & $value1 == $value3)
            {
                switch($value1) {
                    case 0: $totalPoints = 1000;
                    echo "<h1>Jackpot!</h1>";
                    break;
                    case 1: $totalPoints = 500;
                    break;
                    case 3: $totalPoints = 250;
                    break;
                }
               echo "<h2> You won $totalPoints points!</h2>";

            }
            else{
            echo "<h3> Try again! </h3>";
            }echo "</div>";
        }
        
       
          
        echo "<div id='output'>";
        
         for($i=1; $i<4; $i++){
            ${"randomValue" .$i } = rand(0,2);
             displaySymbol(${"randomValue" . $i}, $i);
        }
        displayPoints($randomValue1, $randomValue2, $randomValue3);
        }
        ?>