<?php
session_start();

if (!isset($_SESSION['userName'])) { //validates that admin has indeed logged in
    
    header("Location: index.php");
    
}

 include("../../dbConnection.php");
 $conn = getDatabaseConnection();

function getDepartmentInfo(){
    global $conn;        
    $sql = "SELECT Name, Id 
            FROM instrument 
            ORDER BY Id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll();
    
    return $records;
    
}


if (isset($_GET['addInstrumentForm'])){
    //the administrator clicked on the "Add User" button
    $Id = $_GET['Id'];
    $Name = $_GET['Name'];
    $Brand = $_GET['Brand'];
    $Rating    = $_GET['Rating'];
    $Price = $_GET['Price'];
    $Description    = $_GET['Description'];
    $Type = $_GET['Type'];
    $Weight = $_GET['Weight'];
    $Isin = $_GET['Isin'];
    $Portable  = $_GET['Portable'];
    
    //"INSERT INTO `tc_user` (`userId`, `firstName`, `lastName`, `email`, `universityId`, `gender`, `phone`, `role`, `deptId`) VALUES (NULL, 'a', 'a', 'a', '1', 'm', '1', '1', '1');
    
    $sql = "INSERT INTO instrument
            (Id, Name, Brand, Rating, Price, Description, Type, Weight, Isin, Portable)
            VALUES
            (:Id, :Name, :Brand, :Rating, :Price, :Description, :Type, :Weight, :Isin, :Portable)";
    $namedParameters = array();
    $namedParameters[':Id'] =  $Id;
    $namedParameters[':Name'] =  $Name;
    $namedParameters[':Brand'] =  $Brand;
    $namedParameters[':Rating'] =  $Rating;
    $namedParameters[':Price'] = $Price;
    $namedParameters[':Description']  = $Description;
    $namedParameters[':Type']   = $Type;
    $namedParameters[':Weight'] = $Weight;
    $namedParameters[':Isin'] = $Isin;
    $namedParameters[':Portable'] = $Portable;

    
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    
    echo "User has been added successfully!";
            
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin: Adding New User </title>
    </head>
    <body>

    <h1> Admin Section </h1>
    <h2> Adding New Instrument </h2>
        <a type="button" href="admin.php">Back to admin home page</a> 

    <fieldset>
        
        <legend> Add New Instrument </legend>
        <form>
            
            Name: <input type="text" name="Name" required /> <br>
            Brand: <input type="text" name="Brand" required/> <br>
            Description: <input type="text" name="Description" required /> <br>
            Price: <input type="number" name="Price" required/> <br>
            
            Rating: <input type="number" name="Rating" max="100"/> <br>
            Weight: <input type="number" name="Weight"/> <br>
            Portable: <input type="radio" name="Portable" value="1" id="portY" required/> 
                    <label for="portY">Yes</label>
                    <input type="radio" name="Portable" value="0" id="portN"  required/> 
                    <label for="portN">No</label><br>
            Type:   <select name="Type">
                        <option value=""> Select One </option>
                        <option>Brass</option>
                        <option>Percussion</option>
                        <option>Stringed</option>
                        <option>Woodwind</option>
                        <option>Scientific</option>
                    </select>
            <br />
           Isin (optional): <input type="text" name="Isin"/> <br> 
                        <br />
                <input type="submit" name="addInstrumentForm" value="Add Instrument!"/>
        </form>
        
    </fieldset>
    
    


    </body>
</html>