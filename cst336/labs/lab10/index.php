


<!DOCTYPE html>
<html>
    <head>
         <link rel="stylesheet" href="./styles.css"/>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        
        <title> Lab 10: Photo Gallery </title>
    </head>
    <body>

    <h2> Photo Gallery </h2>
    <form method="POST" enctype="multipart/form-data"> 


        <input type="file" name="myFile" /> 
        
        <input id="submit" type="submit" value="Upload File!" />

    </form>
    
    <script>
    // $("img").click(function() {
    //     $(".thumbnail").addClass("bigger");
    //     $(".thumbnail").removeClass("thumbnail");
    // })
    </script>
<?php

  //print_r($_FILES);
  //echo "File size " . $_FILES['myFile']['size'];
//   move_uploaded_file($_FILES["myFile"]["tmp_name"], "gallery/" . $_FILES["myFile"]["name"] );
//   {
//   $files = scandir("gallery/", 1);
//  // print_r($files);
  
 
//   }

?>

    </body>
</html>
<?php

  $files = scandir("gallery/", 1);

 
   if($_FILES['myFile']['size'] > 1000000)
  {
      echo "<h3> error : file size too big </h3>";
  }
  else{
     // echo "<div> <img class='thumbnail' src='gallery/ " . $files[i] . "'width = '50' > </div>";
     move_uploaded_file($_FILES["myFile"]["tmp_name"], "gallery/" . $_FILES['myFile']['name'] );
  }
  
  for ($i = 0; $i < count($files) - 2; $i++) {
     
     echo " <div> <img class='thumbnail' src='gallery/" .   $files[$i] . "' width='50' ></div>";
      
  }
?>