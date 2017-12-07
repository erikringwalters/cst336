<?php
session_start();

if (!isset($_SESSION['userName'])) { //validates that admin has indeed logged in
    
    header("Location: index.php");
    
}

 include("../../dbConnection.php");
 $conn = getDatabaseConnection();

function getDepartmentInfo(){
    global $conn;        
    $sql = "SELECT Id, Name 
            FROM instrument 
            ORDER BY Name";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll();
    
    return $records;
    
}

function getInstrumentInfo($Id) {
    global $conn;    
    $sql = "SELECT * 
            FROM instrument
            WHERE Id = $Id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch();
    //print_r($record);
    return $record;
}

if (isset($_GET['updateUserForm'])) { //admin has submitted form to update user
    global $conn;
    $sql = "UPDATE instrument
            SET Name = :Name,
                Brand = :Brand
			WHERE Id = :Id";
	$namedParameters = array();
	$namedParameters[":Name"] = $_GET['Name'];
	$namedParameters[":Brand"] = $_GET['Brand'];
	$namedParameters[":Id"] = $_GET['Id'];
	
	
    $stmt = $conn->prepare($sql);
    
    
    $stmt->execute($namedParameters);
    
}



if (isset($_GET['Id'])) {
    
    $instrumentInfo = getInstrumentInfo($_GET['Id']);
    
    
}



?>

<!DOCTYPE html>
<html>
    <head>
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <title> Admin: Updating User </title>
    </head>
    <body>

    <h1> Admin Section </h1>
    <h2> Updating User Info </h2>

    <fieldset>
        
        <legend> Update User </legend>
        
    
         <form>
            
            Name: <input type="text" name="Name" value="<?=$userInfo['Name']?>"required /> <br>
            Brand: <input type="text" name="Brand" value="<?=$userInfo['Brand']?>"required/> <br>
            Description: <input type="text" name="Description" value="<?=$userInfo['Description']?>"required /> <br>
            Price: <input type="number" name="Price" value="<?=$userInfo['Price']?>"required/> <br>
            
            Rating: <input type="number" name="Rating" max="100"value="<?=$userInfo['Rating']?>"/> <br>
            Weight: <input type="number" name="Weight"value="<?=$userInfo['Weight']?>"/> <br>
            Portable: <input type="radio" name="Portable" value="1" id="portY" required/> 
                    <label for="genderF">Yes</label>
                    <input type="radio" name="Portable" value="0" id="portN"  required/> 
                    <label for="genderM">No</label><br>
            Type:   <select name="Type">
                        <option value="<?=$userInfo['Type']?>"> Select One </option>
                        <option>Brass</option>
                        <option>Percussion</option>
                        <option>Stringed</option>
                        <option>Woodwind</option>
                        <option>Scientific</option>
                    </select>
            <br />
           Isin (optional): <input type="text" name="Isin" value="<?=$userInfo['Isin']?>"/> <br> 
                        <br />
                <input type="submit" name="addInstrumentForm" value="Add Instrument!"/>
        </form>
        
        
    </fieldset>


    </body>
</html>