<?php
session_start();
if (!isset($_SESSION['userName'])) { //checks whether admin has logged in
    
    //header("Location: index.php");
    exit();
    
}
include '../../dbConnection.php';
$conn = getDatabaseConnection();
function displayInstruments() {
    global $conn;
    $sql = "SELECT * 
            FROM instrument
            ORDER BY Name";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $instruments = $statement->fetchAll(PDO::FETCH_ASSOC);
    //print_r($instruments);
    return $instruments;
}
function getInstrumentInfo($Id)
{
     global $conn;
    $sql = "SELECT * 
            FROM instrument";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $instruments = $statement->fetchAll(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <title>Admin Page </title>
        <script>
            
            function confirmDelete(instrumentName) {
                
                
                return confirm("Are you sure you want to delete " + instrumentName + "?");
                
            }
            
            
        </script>
    </head>
    <body>
        
<div class="col-md-1"></div>
        <h1> INSTRUMENT ADMIN PAGE </h1>
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
        
        function displayInstrumentInformation() {
    
    include '../dbConnection.php';
    $conn = getDatabaseConnection();
    
    $sql = "SELECT * 
            FROM `instrument`" ;
            
    
     $namedParam = array(":Id"=>$_POST['Id']);
   
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParam);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($records as $record) {
        
        echo  $record['Id'] . " " . $record['Name'] . " " . $record['Brand'] . " " . $record['Weight']
        . " " . $record['Price'] . " " . $record['Rating'] . " " . $record['Type'] . " " .  $record['Isin']
        . " " . $record['Description']. " " . $record['Portable'] . "<br /><br /><br />";
        
    }
    
}
        
         $instruments = displayInstruments();
        
        foreach($instruments as $instrument) {
            
            echo    $instrument['Id'] .".) ". " <a  href='instrumentInformation.php?Id=".$instrument['Id']."'>"
            . $instrument['Name'] . "  " . $instrument['Brand'] . "</a> |";
            echo "[<a href='updateInstrument.php?Id=".$instrument['Id']."'> Update </a> ]";
            //echo "[<a href='deleteUser.php?userId=".$instrument['userId']."'> Delete </a> ]";
            echo "<form action='deleteInstrument.php' style='display:inline' onsubmit='return confirmDelete(\"".$instrument['Name']."\")'>
                     <input type='hidden' name='Id' value='".$instrument['Id']."' />
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