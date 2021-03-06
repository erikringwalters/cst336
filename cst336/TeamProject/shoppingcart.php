<?php
session_start();
include '../dbConnection.php';
$conn = getDatabaseConnection();

if(isset($_SESSION['cartItems']))
{
    //don't initialize "cartItems" if it already exists
}
else
{
    $_SESSION['cartItems'] = array();
}

if(isset($_SESSION['itemNum']))
{
    $_SESSION['itemNum'] = $_SESSION['itemNum'] + 1;
}
else
{
    $_SESSION['itemNum'] = 0;
}

function displayCart() {
    global $conn;
    $sql = "SELECT movieName 
            FROM movie 
            WHERE movieId=" .$_GET['movieId'];
    $statement = $conn->prepare($sql);
    $statement->execute();
    $movies = $statement->fetchAll(PDO::FETCH_ASSOC);
    //print_r($movies);
    return $movies;
}
function addToCart()
{
    //$_SESSION['cartItems'] = array();
    global $newItem;
    $newItem = displayCart();
    //echo $newItem[0]['movieName'];
    //array_push($_SESSION['cartItems'],$newItem);
    //if($_SESSION['itemNum'] != 0)
    //{
        $_SESSION['cartItems'][] = $newItem;
    //}
   // else
    //{
     //   $_SESSION['cartItems'][$_SESSION['itemNum']] = $newItem;
   // }
    
    
    //echo $item;
    //return $_SESSION['cartItems'][0][0]['movieName'];
    //return $_SESSION[0];
}

function removeItem($i)
{
   unset($_SESSION['cartItems'][$i]);
   array_values($_SESSION['cartItems']);
}

?>
<html>
    <head>
        <title>Shopping Cart</title>
          <!--<link href="css/main.css" rel="stylesheet" type="text/css" />-->
          <link href="css/styles.css" rel="stylesheet" type="text/css" />
          <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


          
    </head>
    <body>
                  <link href="css/styles.css" rel="stylesheet" type="text/css" />

        <center>
            <h1> Shopping Cart </h1>
            
         
        
    <form method = "post">
        
        <input type ='submit' value='Clear Cart' id = 'click' name = 'submit' />
        <br><br><br>
            <?php
             for($i = 0;$i<count($_SESSION['cartItems']);$i++)
                {
                    if(array_key_exists('submit',$_POST))
                    {
                        $_SESSION['cartItems'] = array();
                    }
                }
              
                if(isset ($_GET['movieId']))
                {
                    addToCart();
                }
                
                for($i = 0;$i<count($_SESSION['cartItems']);$i++)
                {
                    echo "Movie Title: ". $_SESSION['cartItems'][$i][0]['movieName'] . "<br><br>";
                }
              
            ?>
            
    </form>
    </center>
    </body>
</html>