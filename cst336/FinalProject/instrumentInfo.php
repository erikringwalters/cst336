<?php


function displayUserInformation() {
    
    include '../../dbConnection.php';
    $conn = getDatabaseConnection();
    
    $sql = "SELECT * 
            FROM `instrument` WHERE
            Id = :Id" ;
            
    
     $namedParam = array(":Id"=>$_GET['Id']);
   
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParam);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($records as $record) {
        
        echo  "Name: " . $record['Name'] . "<br/> " ."Brand: " . $record['Brand'] . "<br/> "
        ."Type: " . $record['Type'] . " <br/>" ."Weight: " . $record['Weight'] . "<br/> " . "Brand: " .$record['Brand'] 
        . "<br/> " . "Price: " .$record['Price'] . "<br />" ."Rating: " .$record['Rating'] . "<br />" . "Description: " .$record['Description']
        .  "<br />" ."Isin: " . $record['Isin'] . "<br />" . "Portable: " .$record['Portable'] . "<br />";
        
    }
    
}

?>

<!DOCTYPE html>
<html>
    <head>
        <!-- Latest compiled and minified CSS -->
    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <title> Instrument Information </title>
    </head>
    <body>
        <!--<div class="col-md-2">-->
        <h2> Instrument Information </h2>


        <?=displayUserInformation()?>
<!--</div>-->
    </body>
</html>

