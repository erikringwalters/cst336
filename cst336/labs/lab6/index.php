<?php
session_start();
//print_r($_POST);


function getInfo(){
include '../../dbConnection.php';
$conn = getDatabaseConnection();

//print_r($conn);

$userName = $_POST['userName'];
$password = sha1($_POST['password']);



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

print_r($record);

if (empty($record)) {
    
    echo "<h1>Wrong userName or Password!</h1>";
    
} else {
    
    //echo "right credentials!";
    $_SESSION['userName'] = $record['userName'];
    $_SESSION['adminFullName'] = $record['firstName'] . " " . $record['lastName'];
    //echo $_SESSION['adminFullName'] . "<br>";
    //echo $record['firstName'] . " " . $record['lastName'];
   header("Location: admin.php"); //redirecting to admin portal
}
}

function isPressed(){
if (isset($_POST['login'])){
    getInfo();
}
}
?>

<!DOCTYPE html>
<html>
    <head>
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <title> Lab 6: Admin Login Page </title>
    </head>
    <body>
        
       <h1> Admin Login </h1>
        
        <form method="POST">
            
            userName: <input type="text" name="userName"/> <br />
            
            Password: <input type="password" name="password"/> <br />
            
            <input type="submit" name="login" value="Login"/>
            
            
        </form>
    <?=isPressed() ?>
    
    <hr>
    
    
    </body>
</html>