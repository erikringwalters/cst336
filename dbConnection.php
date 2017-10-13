<?php

function getDatabaseConnection(){
    $host = 'localhost';
$dbname = 'tcp';
$username = "root";
$password = '';
//create db connection
$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

$dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

return $dbConn;
}

?>
