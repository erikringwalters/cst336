<?php
session_start();

if (!isset($_SESSION['userName'])) { //validates that admin has indeed logged in
    
    header("Location: index.php");
    
}

 include("../../../dbConnection.php");
 $conn = getDatabaseConnection();

function getDepartmentInfo(){
    global $conn;        
    $sql = "SELECT deptName, departmentId 
            FROM tc_department 
            ORDER BY deptName";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll();
    
    return $records;
    
}

function getUserInfo($userId) {
    global $conn;    
    $sql = "SELECT * 
            FROM tc_user
            WHERE userId = $userId";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch();
    //print_r($record);
    return $record;
}

if (isset($_GET['updateUserForm'])) { //admin has submitted form to update user
    global $conn;
    $sql = "UPDATE tc_user
            SET firstName = :fName,
                lastName = :lName
			WHERE userId = :userId";
	$namedParameters = array();
	$namedParameters[":fName"] = $_GET['firstName'];
	$namedParameters[":lName"] = $_GET['lastName'];
	$namedParameters[":userId"] = $_GET['userId'];
	
	
    $stmt = $conn->prepare($sql);
    
    
    $stmt->execute($namedParameters);
    
}



if (isset($_GET['userId'])) {
    
    $userInfo = getUserInfo($_GET['userId']);
    
    
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
            
            <input type="hidden" name="userId" value="<?=$userInfo['userId']?>" />
            First Name: <input type="text" name="firstName" required value="<?=$userInfo['firstName']?>" /> <br>
            Last Name: <input type="text" name="lastName" required value="<?=$userInfo['lastName']?>"/> <br>
            Email: <input type="text" name="email"/> <br>
            University Id: <input type="text" name="universityId"/> <br>
            Phone: <input type="text" name="phone"/> <br>
            Gender: <input type="radio" name="gender" value="F" id="genderF"  <?=($userInfo['gender']=='F')?"checked":"" ?> required/> 
                    <label for="genderF">Female</label>
                    <input type="radio" name="gender" value="M" id="genderM"  required/> 
                    <label for="genderM">Male</label><br>
            Role:   <select name="role">
                        <option value=""> Select One </option>
                         <option <?php if ('Faculty'==$userInfo['role']) echo ' selected="selected"'?>>Faculty</option>
                        <option <?php if ('Student'==$userInfo['role']) echo ' selected="selected"'?>>Student</option>
                        <option <?php if ('Staff'==$userInfo['role']) echo ' selected="selected"'?>>Staff</option>
                    </select>
            <br />
            Department: <select name="deptId">
                            <option value=""> Select One </option>
                            <?php
                            
                                $departments = getDepartmentInfo();
                                foreach ($departments as $record) {
                                    echo "<option value='$record[departmentId]'>$record[deptName]</option>";
                                }
                            
                            ?>
                            
                        </select>
                        <br />
                <input type="submit" name="updateUserForm" value="Update User!"/>
        </form>
        
    </fieldset>


    </body>
</html>