<?php
session_start();

include '../dbConnection.php';
$conn = getDatabaseConnection();


function displayUsers()
{
    global $conn;
     $sql = "SELECT * FROM `movie` 
     JOIN director on movie.directorId = director.directorId 
    JOIN genre ON movie.genreId = genre.genreId 
    where movie.movieId=" . $_GET['movieId'];
    
    $statement = $conn->prepare($sql);
    $statement->execute();
    $users = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $users;
}


?>
<!DOCTYPE html>
<html>
    <head>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
          <link href="css/main.css" rel="stylesheet" type="text/css" />
           <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
           <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


        <center>
        <div>
        <title>Movie Information </title>
    </head>
    <body>
        <div>
<center>
        <h1> Movie Information </h1>
        <br /><br />
        
        <?php
        
        $users =displayUsers();
        
         foreach($users as $user)
         {
            
            echo " Movie Name: " . $user['movieName']. "<br> " . 'Movie Genre: ' . $user['genreName'] 
            . "<br>" .' Movie Length: '  .$user['length'] ." mins"
            . "<br> " . ' Year of Release: '  .$user['release_year'] . "<br> " . ' Director Name: '.$user['directorName'];
        }
        ?>
        </div>
        </center>
        </div>
    </body>     
</html>

