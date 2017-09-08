<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title> 777 Slot Machine </title>
    </head>
    <body>
        
        <?php
        
        $randomValue = rand(0,3);
        
        switch($randomValue)
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
        
        echo "<img src='img/$symbol.png' alt='$symbol' title='$symbol' width='70' />";
        
        ?>
        <!--<img src="img/cherry.png" alt="Cherry" title="Cherry" width="70" />-->
        <!--<img src="img/lemon.png" alt="Lemon" title="Lemon" width="70"/>-->
        <!--<img src="img/.png" alt="" title="" width="70"/>-->
    </body>
</html>