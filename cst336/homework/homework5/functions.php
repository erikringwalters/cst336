<?php
include '../../dbConnection.php';
$conn = getDatabaseConnection();

//Inserting into history
$sql = "INSERT INTO productHistory (Asin)
        VALUES (:Asin)";
         
        
$namedParameters = array();
$namedParameters[':Asin'] =   $_GET['asin'] ;

// print_r($namedParameters);

$stmt = $conn->prepare($sql);
$stmt->execute($namedParameters);

$sql = "SELECT *
        FROM productHistory
        WHERE asin = :Asin";
        //WHERE Asin = :Asin";
         
        
$namedParameters = array();
$namedParameters[':Asin'] = $_GET['asin'];

//print_r($namedParameters);

 $stmt = $conn->prepare($sql);
 $stmt->execute($namedParameters);
$record = $stmt->fetchAll(PDO::FETCH_ASSOC);//expecting only one record


//$record = $stmt->fetch(PDO::FETCH_ASSOC);//expecting only one record
$count = 0;
foreach($record as $records)
{
    $count++;
echo json_encode(//$records['Asin']." ". 
$records['time'] . "<br>");
}
echo "<p id='count'> Item searched for " . $count . " times. </p>";

//print_r($namedParameters);

?>