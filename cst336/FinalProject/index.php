
<?php

include '../../dbConnection.php';

$conn = getDatabaseConnection();

function getInstrumentName() 
{
    global $conn;
    $sql = "SELECT distinct(Name)
            FROM `instrument` 
            ORDER BY Name";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($records as $record) 
    {
        
        echo "<option> "  . $record['Name'] . "</option>";
    }
}
function getInstrumentBrand() 
{
    global $conn;
    $sql = "SELECT Name
            FROM `brand` 
            ORDER BY Name";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($records as $record) 
    {
        echo "<option> "  . $record['Name'] . "</option>";
    }
}

function getInstrumentInfo($Id)
{
     global $conn;
    $sql = "SELECT * 
            FROM instrument";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $users = $statement->fetchAll(PDO::FETCH_ASSOC);
}

function getInstrumentType() 
{
    global $conn;
    $sql = "SELECT Name
            FROM `type` 
            ORDER BY Name";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($records as $record) 
    {
        echo "<option> "  . $record['Name'] . "</option>";
    }
}

function displayInstrumentInformation() {
    
    include '../../dbConnection.php';
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

function displayInstruments(){
    global $conn;
    
    $sql = "SELECT * FROM instrument WHERE 1 ";
    
    
    if (isset($_GET['submit']))
        {
        $namedParameters = array();
        
    if (!empty($_GET['Name'])) 
        {
  
            $sql .= " AND Name LIKE :Name"; 
            $namedParameters[':Name'] = "%" . $_GET['Name'] . "%";
        }     
       
    if (!empty($_GET['Brand']))
        {
         
           $sql .= " AND Brand = :Brand";
            $namedParameters[':Brand'] =   $_GET['Brand'] ;
        }     
        
    if (!empty($_GET['Price'])) 
        {
       
            $sql .= " AND Price = :Price"; 
            $namedParameters[':Price'] =   $_GET['Price'] ;
        }   
              
    if (!empty($_GET['Rating'])) 
        {
            $sql .= " AND Rating LIKE :Rating"; 
            $namedParameters[':Rating'] =   $_GET['Rating'] ;
        }  
    
    if (!empty($_GET['Type']))
        {
         
            $sql .= " AND Type LIKE :Type"; 
            $namedParameters[':Price'] = "$" . $_GET['Price'];
        } 
         
    if(!empty($_GET['asc']))
        {
             $sql .= "  ORDER BY Name" . " " . $_GET['asc'];
           
        }
    }
 
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <table>
        <tr>
            <th>Name</th>
            <th>Brand</th>
            <th>Type</th>
            <th>Price</th>
            <th>Rating</th>
        </tr>
    
        
    <?php
     foreach ($records as $record) 
     {
          $url = $record['Id'];
        echo "<tr>".
        "<td>" . "<a href='instrumentInfo.php?Id=" . $url . "''>" . $record['Name'] . "</a></td>".
        "<td> " .  $record['Brand']. "</td>". 
        "<td> " . $record['Type'] . "</td>" .
        "<td> $" . $record['Price'] . "</td>".
        "<td> " . $record['Rating'] . "</td>".
        "</tr>";
        
    }
} 
        
    
  

?>


</table>


<!DOCTYPE html>
<html>
<head>
    <title>Music Shop</title>
    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


</head>
<body>
    <div class="col-md-6">
    <h1>Music Shop</h1>
   
    <form>
    <!--<div id="filter" class="col-md-6">-->
      Name: <input type="text" name="Name" placeholder="type here"/>
            <br></br>
            Brand: 
            <select name="Brand">
                <option value="">Select One</option>
                <?=getInstrumentBrand()?>
            </select>
            <br></br>
            
                 Type: 
            <select name="Type">
                <option value="">Select One</option>
                <?=getInstrumentType()?>
            </select>
            <br></br>
               Rating (%): 
            <input id="rating" type="number" name="Rating"/>
               
            </select>
            
            <br>
                        <br>

          
                 Sort by:
          <input type="radio" name="asc" value="ASC" /> Ascending
          <input type="radio" name="asc" value="DESC"/> Descending<br />
          <br><br>
            <input class="btn btn-default"type="submit" value="Search for an Instrument!" name="submit" >
          
        </form>  
         <a href="adminLogin.php">[Admin login]</a> 
            </div>
     
    <div class="col-md-6" id="info">
    <?php
    //getInstrumentInfo(1); 
    displayInstruments();
    ?>
    </div>

        
   
</body>
</html>