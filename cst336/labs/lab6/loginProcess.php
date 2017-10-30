<?php
session_start();
//print_r($_POST);

include '../../dbConnection.php';
$conn = getDatabaseConnection();

//print_r($conn);

$userName = $_POST['userName'];
$password = sha1($_POST['password']);

//The following SQL allows SQL injection
// $sql = "SELECT *
//         FROM tc_admin
//         WHERE userName = '$userName' 
//         AND   password = '$password'";

$sql = "SELECT *
        FROM tc_admin
        WHERE userName = :userName 
        AND   password = :password";

$namedParameters = array();
$namedParameters[':userName'] = $userName;
$namedParameters[':password'] = $password;        
        
$stmt = $conn->prepare($sql);
$stmt->execute($namedParameters);
$record = $stmt->fetch(PDO::FETCH_ASSOC);//expecting only one record

//print_r($record);

if (empty($record)) {
    
    echo "wrong userName or password!";
    
} else {
    
    //echo "right credentials!";
    $_SESSION['userName'] = $record['userName'];
    $_SESSION['adminFullName'] = $record['firstName'] . " " . $record['lastName'];
    //echo $_SESSION['adminFullName'] . "<br>";
    //echo $record['firstName'] . " " . $record['lastName'];
   header("Location: admin.php"); //redirecting to admin portal
}
?>