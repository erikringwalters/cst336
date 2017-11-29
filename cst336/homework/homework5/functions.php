<?php
include '../../dbConnection.php';
$conn = getDatabaseConnection();


$sql = "SELECT *
        FROM tc_product
        WHERE Asin = :asin"; 
        
$namedParameters = array();
$namedParameters[':Asin'] = $_GET['asin'];

$stmt = $conn->prepare($sql);
$stmt->execute($namedParameters);
$record = $stmt->fetch(PDO::FETCH_ASSOC);//expecting only one record

print_r($record);

echo json_encode($record);
?>