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

if (isset($_GET['Id'])) {
    
    $instrumentInfo = getInstrumentInfo($_GET['Id']);
    //echo "Id: " . $instrumentInfo['Id'];
    
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







?>

<!DOCTYPE html>
<html>
    <head>
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <title> Admin: Updating User </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    </head>
    <body>

    <h1> Admin Section </h1>
    <h2> Updating User Info </h2>

    
        
        <legend> Update User </legend>
        
    
        
            <input type="hidden" id="Id" name="Id" value="<?=$instrumentInfo['Id']?>">
            Name: <input id="Name" type="text" name="Name" value="<?=$instrumentInfo['Name']?>"required /> <br>
            Brand: <input id="Brand" type="text" name="Brand" value="<?=$instrumentInfo['Brand']?>"required/> <br>
            Description: <input id="Description" type="text" name="Description" value="<?=$instrumentInfo['Description']?>"required /> <br>
            Price: <input id="Price" type="number" name="Price" value="<?=$instrumentInfo['Price']?>"required/> <br>
            
            Rating: <input id="Rating" type="number" name="Rating" max="100"value="<?=$instrumentInfo['Rating']?>"/> <br>
            Weight: <input id="Weight" type="number" name="Weight"value="<?=$instrumentInfo['Weight']?>"/> <br>
            Portable: <input id="Portable" type="radio" name="Portable" value="1" id="portY" <?=($instrumentInfo['Portable']=='1')?"checked":"" ?> required/> 
                    <label for="genderF">Yes</label>
                    <input type="radio" name="Portable" value="0" id="portN"  <?=($instrumentInfo['Portable']=='0')?"checked":"" ?> required/> 
                    <label for="genderM">No</label><br>
            Type:   <select id="Type" name="Type">
                        <option value="<?=$instrumentInfo['Type']?>"> Select One </option>
                        <option>Brass</option>
                        <option>Percussion</option>
                        <option>Stringed</option>
                        <option>Woodwind</option>
                        <option>Scientific</option>
                    </select>
            <br />
           Isin (optional): <input id="Isin" type="text" name="Isin" value="<?=$instrumentInfo['Isin']?>"/> <br> 
                        <br />
                <input id="updateButton" type="submit" name="updateInstrumentForm" value="Update Instrument!"/>
       
   
<script>
    function updateInfo(){
        console.log($("#Id").val());
        $.ajax({
            type: "POST",
            url: "updateInfo.php",
            data: {
                Id: $("#Id").val(),
                Name: $("#Name").val(),
                Type: $("#Type").val(),
                Weight: $("#Weight").val(),
                Brand: $("#Brand").val(),
                Price: $("#Price").val(),
                Rating: $("#Rating").val(),
                Description: $("#Description").val(),
                Isin: $("#Isin").val(),
                Portable: $("#Portable").val()
                
            },
            success: function() {
                
                window.location.href = "admin.php";

            }
        })
        
        
    }
    
    
    $(document).ready(function () {
        
   
    $('#updateButton').click(function() {
        updateInfo();
    })
    });
</script>

    </body>
</html>