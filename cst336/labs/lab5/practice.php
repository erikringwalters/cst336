<?php

$host = 'localhost';
$dbname = 'tcp';
$username = "root";
$password = "";
//create db connection
$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

$dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

function usersWithanA(){
$sql = "SELECT * FROM tc_user WHERE firstName LIKE 'A%'";

$stmt = $dbConn->prepare($sql);
$stmt->execute();
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);


//print_r($records);

foreach ($records as $record) {
    echo $record['firstName'] . " " . $record['lastName'] . " " . $record['email'] . "<br/>";

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