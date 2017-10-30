 <?php 
    $host = 'localhost';//cloud 9
    $dbname = 'midterm';
    $username = 'root';
    $password = '';
    
    
        $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);


    echo "#1: Name of country and birth of female actresses who were not born in USA ordered by last name";
    $sql = "SELECT country_of_birth, gender
            FROM celebrity c
            WHERE gender='F'
            AND
            country_of_birth != 'USA'
            ORDER BY lastName DESC";
            
            $stmt = $dbConn-> prepare($sql);
            
            $results = $stmt->fetchAll();
            foreach($results as $record) {
                echo $record['firstName'];
                echo $record ['lastName'];
                echo  $record['country_of_birth'];
            }
            
            
            echo"#2 Num of movies per category and avg duration";
           $sql = "SELECT category, AVG( duration )
		FROM movie t
		
		<br/>
		";
		
$stmt = $dbConn->prepare($sql);	
$results = $stmt->fetchAll();
foreach ($results as $record) {
	echo $record['movie_title']  . " - " . $record['total'] .  "<br />";
}	

            echo"#3 Top three longest movies released after 2000";
    $sql = "SELECT 3
            FROM movie
            WHERE duration 
            ORDER BY DESC";
            
            
$stmt = $dbConn->prepare($sql);	
$results = $stmt->fetchAll();
foreach ($results as $record) {
	echo $record['movie_title']  . " - " . $record['total'] .  "<br />";
}

  echo"#4 List of actors and actresses who have not won an academy award, ordered by last name";
$sql = "SELECT celebrity_id
        FROM oscar AND celebrity
        JOIN celebrityId = NULL ";
        
    $stmt = $dbConn->prepare($sql);	
$results = $stmt->fetchAll();
foreach ($results as $record) {
	echo $record['movie_title']  . " - " . $record['total'] .  "<br />";
}	

  echo"#5 List of actors and actresses who have not won an academy award, ordered by last name";
  $sql = "SELECT * 
        FROM oscar
        ORDER BY award_year ASC";
        
        
   $stmt = $dbConn->prepare($sql);	
$results = $stmt->fetchAll();
foreach ($results as $record) {
	echo $record['firstName']  . " - " . $record['total'] .  "<br />";
}	

    ?>
    
    <br/><br/><br/><br/><br/><br/>
      
  <table border="1" width="600">
    <tbody><tr><th>#</th><th>Task Description</th><th>Points</th></tr>
    <tr style="background-color:white">
      <td>1</td>
      <td>Name and country of birth of female actresses who were NOT born in the USA, ordered by last name</td>
      <td width="20" align="center">10</td>
    </tr>  
    <tr style="background-color:white">
      <td>2</td>
      <td>Number of movies per category and their average duration</td>
      <td width="20" align="center">10</td>
    </tr>  
    <tr style="background-color:white">
      <td>3</td>
      <td>All info about the top three longest movies released after 2000</td>
      <td width="20" align="center">15</td>
    </tr>     
     <tr style="background-color:white">
       <td>4</td>
       <td>List of  actors and actresses who have not won an academy award, ordered by last name </td>
       <td align="center">15</td>
     </tr>
     <tr style="background-color:white">
      <td>5</td>
      <td>List of celebrities who have won an oscar, ordered by "award_year". Include full name, movie title, oscar year, and award category.</td>
      <td width="20" align="center">15</td>
    </tr>     
     <tr style="background-color:#99E999">
      <td>6</td>
      <td>This rubric is properly included AND UPDATED (BONUS)</td>
      <td width="20" align="center">2</td>
    </tr>     
     <tr>
      <td></td>
      <td>T O T A L </td>
      <td width="20" align="center"><b></b></td>
    </tr> 
  </tbody></table>    
