<?php

?>
<?php

include '../../../dbConnection.php';
$conn = getDatabaseConnection();

$dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

function getDeviceTypes(){
    global $dbConn;
    
    $sql = "SELECT DISTINCT(deviceType) 
    FROM 'tc_device'
    ORDER BY deviceType";

    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);


//print_r($records);

foreach ($records as $record) {
    echo "<option> ".$record['firstName'] . " " . $record['deviceType'] . "</option>";

}
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>dbPractice</title>
    </head>
    <body>
        
        <h3>Users whose name starts with A: </h3>
        <?php
        usersWithanA();
        
        ?>
    </body>
</html>