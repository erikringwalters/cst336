<head>
    <title>Card Game</title>
</head>
<body>
    <center>
        <h1>Random Card Game</h1>
    </center>
    <?php
    function getRandomNumToThree()
    {
        return rand(0,3);
    }
    function getRandomSuite(int $num){
        switch($num){
                case 0: $suite = "clubs";
                break;
                case 1: $suite = "diamonds";
                break;
                case 2: $suite = "hearts";
                break;
                case 3: $suite = "spades";
                break;
        }   
          return $suite;
    }
    function getRandomNumToFour()
    {
        return rand(0,4);
    }
    function getFace(int $num){
        switch($num){
                case 0: $face = "ten";
                break;
                case 1: $face = "jack";
                break;
                case 2: $face = "queen";
                break;
                case 3: $face = "king";
                break;
                case 4: $face = "ace";
        }   
        return $face;
    }
    $toThree = getRandomNumToThree();
    getRandomSuite($toThree);
    $toFour = getRandomNumToFour();
    getFace($toFour);
    $suite = getRandomSuite();
    $face = getFace();
    // <img src="./cards/$suite/$face.png"/>;
    echo $face;
    ?>
    <img src="<?php echo "./cards/$suite/$face.png" ?>" />
    <p>hello</p>
</body>