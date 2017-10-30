<?php
session_start();

if (!isset($_SESSION['userName'])) { //checks whether admin has logged in
    
    header("Location: index.php");
    exit();
    
}

include '../../dbConnection.php';
$conn = getDatabaseConnection();


function displayUsers() {
    global $conn;
    $sql = "SELECT * 
            FROM tc_user
            ORDER BY userId";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $users = $statement->fetchAll(PDO::FETCH_ASSOC);
    //print_r($users);
    return $users;
}
function getUserInfo($userId)
{
     global $conn;
    $sql = "SELECT * 
            FROM tc_user
            WHERE 'userId' = ".$userId."";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $users = $statement->fetchAll(PDO::FETCH_ASSOC);
}

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <title>Admin Page </title>
        <script>
            
            function confirmDelete(firstName) {
                
                
                return confirm("Are you sure you want to delete " + firstName + "?");
                
            }
            
            
        </script>
    </head>
    <body>
        
<div class="col-md-1"></div>
        <h1> TCP ADMIN PAGE </h1>
        <div class="col-md-1"></div>
        <h2> Welcome <?=$_SESSION['adminFullName']?>! </h2>
        
        <hr>
        <div class="col-md-1"></div>
        <form action="addUser.php">
            
            <input type="submit" value="Add new User"/> <br/><br/>
            
        </form>
        <div class="col-md-1"></div>
          <form action="logout.php">
            
            <input type="submit" value="Logout" />
            
        </form>
        
        
        <br /><br />
        <div class="col-md-1"></div>
                <div class="col-md-7">

        
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
        
        echo  $record['firstName'] . " " . $record['lastName'] . " " . $record['email'] . " " . $record['universityId'] . " " . $record['gender'] . " " . $record['phone']. " " . $record['role'] ."<br /><br /><br />";
        
    }
    
}
        
        $users =displayUsers();
        
        foreach($users as $user) {
            
            echo    $user['userId'] . ". <a  href='userInformation.php?userId=".$user['userId']."'>"
            . $user['firstName'] . "  " . $user['lastName'] . "</a> |";
            echo "[<a href='updateUser.php?userId=".$user['userId']."'> Update </a> ]";
            //echo "[<a href='deleteUser.php?userId=".$user['userId']."'> Delete </a> ]";
            echo "<form action='deleteUser.php' style='display:inline' onsubmit='return confirmDelete(\"".$user['firstName']."\")'>
                     <input type='hidden' name='userId' value='".$user['userId']."' />
                     <input type='submit' value='Delete'>
                  </form>
                ";
            
            echo "<br />";
            
        }
        
        
        
        ?>
        </div>
        
        
        </div>
    </body>     
</html>