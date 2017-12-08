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
            ORDER BY Id";
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
function getAveragePrice()
{
    global $conn;
    $sql = "SELECT AVG(Price)
            FROM instrument";
    $statement = $conn->prepare($sql);
    $statement->execute();
    global $average;
    $average = $statement->fetch(PDO::FETCH_ASSOC);
    
   // print_r($average);
}
function getTotalWeight()
{
    global $conn;
    $sql = "SELECT SUM(Weight)
            FROM instrument";
    $statement = $conn->prepare($sql);
    $statement->execute();
    global $weightSum;
    $weightSum = $statement->fetch(PDO::FETCH_ASSOC);
    
   // print_r($average);
}
function getAverageRating()
{
    global $conn;
    $sql = "SELECT AVG(Rating)
            FROM instrument";
    $statement = $conn->prepare($sql);
    $statement->execute();
    global $averageRating;
    $averageRating = $statement->fetch(PDO::FETCH_ASSOC);
    
   // print_r($average);
}
?>
<!DOCTYPE html>
<html>
    <head>
    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


        <title>Admin Page </title>
        <script>
            
            function confirmDelete(instrumentName) {
                
                
                return confirm("Are you sure you want to delete " + instrumentName + "?");
                
            }
            
            
        </script>
    </head>
    <body>
        

        <h1> INSTRUMENT ADMIN PAGE </h1>
        <div class="col-md-1"></div>
        <h2> Welcome <?=$_SESSION['adminFullName']?>! </h2>
        
        <hr>
        <div class="col-md-1"></div>
        <form action="addInstrument.php">
            
            <input type="submit" value="Add new Instrument"/> <br/><br/>
            
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
    //Aggregate stuff
    global $totalRating;
    $totalRating = 0;
    global $totalInstruments;
    $totalInstruments = 0;
    echo "<div class='col-md-6'>";
    foreach ($records as $record) {
        
        echo  $record['Id'] . " " . $record['Name'] . " " . $record['Brand'] . " " . $record['Weight']
        . " " . $record['Price'] . " " . $record['Rating'] . " " . $record['Type'] . " " .  $record['Isin']
        . " " . $record['Description']. " " . $record['Portable'] . "<br /><br /><br />";
        
        $totalRating += $record['Rating'];
        $totalInstruments++;
        echo "TR: ".  $totalRating . "  TI: ". $totalInstruments; 
    }
    
}
        
         $instruments = displayInstruments();
        
        foreach($instruments as $instrument) {
            
            echo    $instrument['Id'] .".) ". " <a  href='instrumentInfo.php?Id=".$instrument['Id']."'>"
            . $instrument['Name'] . "  </a>" . $instrument['Brand'] . "   ";
            echo "<a  class='btn btn-info' href='updateInstrument.php?Id=".$instrument['Id']."'> Update </a> ";
            //echo "[<a href='deleteUser.php?userId=".$instrument['userId']."'> Delete </a> ]";
            echo "<form action='deleteInstrument.php' style='display:inline' onsubmit='return confirmDelete(\"".$instrument['Name']."\")'>
                     <input class='btn btn-danger'type='hidden' name='Id' value='".$instrument['Id']."' />
                     <input type='submit' value='Delete'>
                  </form>
                ";
            
            echo "<br />";
            
        }
echo "</div>";



    echo "<div class='col-md-6'>";
            getAveragePrice();
            getTotalWeight();
            getAverageRating();
            echo "<h4>Aggregate Info<h4> <br>";
            echo "<br> <p>Average price: $". number_format($average['AVG(Price)'], 2) . " ";
            echo "<br> <p>Total weight: ". number_format($weightSum['SUM(Weight)'], 2) . "lb ";
            echo "<br> <p>Average rating: ". number_format($averageRating['AVG(Rating)'], 2) . "% ";

echo "</div>";
        
        ?>
        
        
        </div>
    </body>     
</html>