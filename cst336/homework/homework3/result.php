<?php
$bowtie = $linguini = $spaghetti = $pene = $spiral = 0;

for($i = 0; $i < 9; $i++)
{
    $answer = $_POST['q'.i];
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
<head>
<title>Pasta Results!</title>
</head>
<body>
    <h1>
        Results!
    </h1>
   <?php $j = 5 ?>
        <p><?php echo "q".$j; ?></p>

    <p><?php echo "$bowtie"; ?></p>
    <p><?php echo "$linguini"; ?></p>
    <p><?php echo "$spaghetti"; ?></p>
    <p><?php echo "$pene"; ?></p>
    <p><?php echo "$spiral"; ?></p>

</body>