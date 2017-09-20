<!Doctype php>
<head>
    <meta charset="utf-8"/>
    <title>Wizard Generator</title>
    <link href="./css/styles.css" type="text/css" rel="stylesheet"/>
</head>
<body>
    <h1>Wizard Generator</h1>
    <?php
    $r1 = rand(0,31);
    $r2 = rand(0,2);
   
    
    $names = array("Lomrouro", "Gnaogo", "Basterluno", "Guakilo", "Richtie", "Caeliso", "Cyzeto", "Graseto", "Zeelo", "Cylal", "Minalno", "Jokoth", "Caemano", "Saularo", "Eliuri",
    "Cyzeph", "Gobul", "Oplugo", "Lorog", "Yeghubo", "Tarkil", "Zorhar", "Zugush", "Unil", "Vudag", "Shaort", "Muzbubo", "Gomhat", "Gnakil", "Opkubo", "Loogo", "Dororgo");
    $name = $names[$r1];
    $powers = array("fire", "ice", "electric");
    $power = $powers[$r2];
    function displayPower($power, $p)
    {
            echo "<img id='".$power."$p' src='./img/".$power."$p.png' title='". ucfirst($power) ."' alt='$power'";
    }
    
     
     function getTitle($power)
     {
         switch($power){
         case "fire": return "Firemonger";
         break;
         case "ice": return "Frostwielder";
         break;
         case "electric": return "Electromancer";
         break;
         }
     }
     $title = getTitle($power);
    function getFullName($name, $title)
    {
        return "$name the $title";
    }
    $fullName = getFullName($firstName, $title);
    //discarded due to relativity issues
    //  echo "<img src='../homework2/img/leatherBoots.png' alt='wizard robes' id='boots'>";
    //  echo "<br />";
    //  echo "<img src='../homework2/img/wizardRobes.png' alt='wizard robes' id='robes'>";
    //  echo "<br />";
    //  echo "<img src='../homework2/img/whiteBeard.png' alt='beard' id='beard'>";
    //  echo "<br/>";
    //  echo "<img src='../homework2/img/wizardHat.png' alt='wizard hat' id='hat'>";
     echo "<img src='./img/wiz.png' alt='wizard outfit' id='wiz'>";
   
    //     for($i = 1; $i <= 3; $i++){
    //         echo"the value is " .$i;
    //      echo displayPower($power, $i);
    //      $i=$i+1;
    //     }
    //   echo" <br/>";
    $level = rand(1,5);
    function getLevel($level)
    {
        $str;
        for($i = 0; $i < $level; $i++)
        {
            $str = $str . "*";
        }
        return $str;
    }
    $stars = getLevel($level);
     for($p = 1; $p < 3; $p++)
     {
         echo displayPower($power, $p);
         echo "<p></p>";
     }
     echo "<br/>";
    
     echo "<h2 class=title>$name $fullName</h2> <br/>";
     echo "<br/>";
     echo "<br/><p id='level$level' class='lvl'>( Power Level: $stars )</p>";
     if($level == 5)
     {
         echo"<p class=woah>Woah.</p>";
     }
     
    ?>
</body>
