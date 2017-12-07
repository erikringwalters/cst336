<?php

    include("../../dbConnection.php");
    $conn = getDatabaseConnection();
    $sql = "DELETE FROM instrument 
            WHERE Id = " . $_GET['Id'];

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    header("Location: admin.php");
    
?>