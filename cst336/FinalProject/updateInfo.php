<?php
 //admin has submitted form to update user
    
     include("../../dbConnection.php");
     $conn = getDatabaseConnection();

    $sql = "UPDATE instrument
            SET Id = :Id,
                Name = :Name,
                Type = :Type,
                Weight = :Weight,
                Brand = :Brand,
                Price = :Price,
                Rating = :Rating,
                Description = :Description,
                Isin = :Isin,
                Portable = :Portable
                
			WHERE Id = :Id";
	$namedParameters = array();
	$namedParameters[":Id"] = $_POST['Id'];
	$namedParameters[":Name"] = $_POST['Name'];
	$namedParameters[":Type"] = $_POST['Type'];
	$namedParameters[":Weight"] = $_POST['Weight'];
	$namedParameters[":Brand"] = $_POST['Brand'];
	$namedParameters[":Price"] = $_POST['Price'];
	$namedParameters[":Rating"] = $_POST['Rating'];
	$namedParameters[":Description"] = $_POST['Description'];
	$namedParameters[":Isin"] = $_POST['Isin'];
	$namedParameters[":Portable"] = $_POST['Portable'];
	
	
	
    $stmt = $conn->prepare($sql);
    
    
    $stmt->execute($namedParameters);
    
    echo"Deez NUTS!\n";
    

?>