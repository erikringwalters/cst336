<?php
include '../../dbConnection.php';
$conn = getDatabaseConnection();

//Inserting into history
$sql = "INSERT INTO productHistory (Asin)
        VALUES (:Asin)";
         
        
$namedParameters = array();
$namedParameters[':Asin'] =   $_GET['asin'] ;

print_r($namedParameters);

$stmt = $conn->prepare($sql);
$stmt->execute($namedParameters);

$sql = "SELECT *
        FROM tc_product
        WHERE 1
        AND Asin LIKE :Asin";
         
        
$namedParameters = array();
$namedParameters[':Asin'] = "%" . $_GET['asin'] . "%";

 //print_r($namedParameters);

// $stmt = $conn->prepare($sql);
// $stmt->execute($namedParameters);
//$record = $stmt->fetch(PDO::FETCH_ASSOC);//expecting only one record


//$record = $stmt->fetch(PDO::FETCH_ASSOC);//expecting only one record


//print_r($namedParameters);

//echo json_encode($record['Asin']);
?>