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
    $sql = "SELECT Brand
            FROM `instrument` 
            ORDER BY Brand";
    
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
        }
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
            $sql .= " AND Rating = :Rating"; 
            $namedParameters[':Rating'] =   $_GET['Rating'] ;
        }  
    
    if (!empty($_GET['Type']))
        {
         
            $sql .= " AND Type LIKE :Type"; 
            $namedParameters[':Price'] = "$" . $_GET['
           Price'] . "%";
        } 
         
    if(!empty($_GET['asc']))
        {
             $sql .= "  ORDER BY Name" . " " . $_GET['asc'];
           
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
          $url = $record['movieId'];
        echo "<tr>".
        "<td>" . "<a href='instrumentInfo.php?Id=" . $url . "' target='movieInfoFrame'>" . $record['Name'] . "</a></td>".
        "<td> " .  $record['Brand']. "</td>". 
        "<td> ". $record['Type'] . "</td>" .
        "<td>" . $record['Price'] . "</td>".
        "<td> <a target='shoppingcart' href='shoppingcart.php?movieId=".$record['Id']."'> [Add to Cart] </a> <br /> </td>".
        "</tr>";
        
    }

    } 
        
    
  

?>
</table>

?>
<!Doctype html>
<html>
<head>
    <title>Yea</title>
    <link href="css/styles.css" rel="stylesheet" type="text/css">
</head>
<body>
    <h1>Music Shop</h1>
    <a href="admin.php">Admin login</a>
    <?php
    getInstrumentInfo(1); 
    displayInstruments();
    ?>
    
</body>
</html>