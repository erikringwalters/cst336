
<head>
<title>Pasta Results!</title>
<link href="css/styles.css" type="text/css" rel="stylesheet"/>
    <link rel="shortcut icon" type="image/x-icon" href="img/bowtieIcon.png"/>
    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" 
    href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" 
    crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

</head>
<body>
     <div class="col-md-2"></div>
    <div id="rContent" class="col-md-8">
        <div id="pad">
    <?php
    // echo "$_POST['uname']";
    if ( ! empty($_POST['uname'])){
    $name = $_POST['uname'];
}
    //$name = $name . "!";
$bowtie = $linguini = $spaghetti = $pene = $spiral = 0;
$question = 'q';

 for($i = 0; $i < 9; $i++)
{
    $question = 'q'.$i;
   // echo $question;
    $answer = $_POST[$question];
   // echo "answer = ".$answer.", i = ".$i;
    switch($answer){
    case 'bowtie': $bowtie++;
    break;
    case 'linguini': $linguini++;
    break;
    case 'spaghetti': $spaghetti++;
    break;
    case 'pene': $pene++;
    break;
    case 'spiral': $spiral++;
    break;
    }
    
}
?>
    <h1>
        Results!
    </h1>
    <hr/>
    
    
    <?php
    $max = "";
    $msg = "";
    if($bowtie > $max)
    {
        $max = "bowtie";
        $msg = "You always know right from wrong and are often complimented on being a fine gentleman/woman!";
    }
    if($linguini > $max)
    {
        $max = "linguini";
        $msg = "You are intelligent and make sure everyone knows it! Maybe a little more than they want.";
    }
    if($spaghetti > $max)
    {
        $max = "spaghetti";
        $msg = "You may not be the nicest or smartest, but you know how to get ahead and have a good time!";
    }
    if($pene > $max)
    {
        $max = "penne";
        $msg = "I'm sorry to hear that /:";
    }
    if($spiral > $max)
    {
        $max = "spiral";
        $msg = "Congratulations! You're a weird person!";
    }
    ?>
         <h3><?php echo "$name"." "?> You're a <?php echo "$max"?> noodle!</h3>
    <center>
    <?php
    echo "<img id='resultPic' src='img/".$max.".png'>";
    ?>
    </center>
    <p id="message"><?php echo "$msg" ?></p>
    </div>
    </div>
     <div class="col-md-2"></div>
     
     

</body>