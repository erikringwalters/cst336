<?php


function displayUserInformation() {
    
    include '../../../dbConnection.php';
    $conn = getDatabaseConnection();
    
    $sql = "SELECT * 
            FROM `tc_user` WHERE
            userId = :userId" ;
            
    
     $namedParam = array(":userId"=>$_POST['userId']);
   
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParam);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($records as $record) {
        
        echo  $record['firstName'] . " " . $record['lastName'] . " " . $record['email'] . " " . $record['universityId'] . " " . $record['gender'] . " " . $record['phone']. " " . $record['role'] ."<br />";
        
    }
    
}

?>

<!DOCTYPE html>
<html>
    <head>
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <title> User Information </title>
    </head>
    <body>
        
        <h2> User Information </h2>


        <?=displayUserInformation()?>

    </body>
</html>

