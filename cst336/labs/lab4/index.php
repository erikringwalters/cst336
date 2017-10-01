       <?php
                   $backgroundImage = "./Slider/img/sea.jpg";

            //API call goes here
            if(isset($_GET['keyword'])) 
            {
              
                // echo "You searched for: " . $_GET['keyword'];
               include 'Slider/api/pixabayAPI.php';
                $keyword = $_GET['keyword'];
                $imageURLs = getImageURLs($keyword);
                $backgroundImage = $imageURLs[array_rand($imageURLs)];
                
            }
            ?>
<!Doctype html>
<html>
    <head>
        <title>Image Carousel</title>
     <meta charset="utf-8">
       
       
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" 
        crossorigin="anonymous">
        
        <style>
            @import url("./Slider/css/styles.css");
            body {
                background-image: url(<?=$backgroundImage?>);
            }
        </style>
        </head>
        
        <body>
            
            <br/> <br/>
           <form>
              <div class="orientation row">
                <input type="text" name="keyword" placeholder="keyword" value="<?=$_GET['keyword']?>"/>
                <container class="radio">
                <span id="horizontal">
                <input type= "radio" id= "lhorizontal" name="layout" value = "horizontal">
                <label for="Horizontal"></label><label for="lhorizontal"> Horizontal </label>
                </span>
                <span id="vertical">
                <input type="radio" id="lvertical" name="layout" value="vertical">
                <label for="Vertical"></label> <label for="lvertical"> Vertical </label>
                </span>
                </container>
                </div>
                <br/> <br/>
                <select name= "category">
                    <option value = "">-Select One-</option>
                    <option value="ocean">Sea</option>
                    <option>Forest</option>
                    <option>Mountain</option>
                    <option>Snow</option>
                </select>
                </br>
                </br>
                <input id="submit" type="submit" value="Submit" />
            </form>
        
       
            <br/>
            <?php
            if(!isset($imageURLs)) {
                echo "<h2> Type a keyword to display a slideshow <br/> with random images from Pixabay.com </h2>";
            } else {
                 if($keyword == "")
                {
                    echo "<h2 id='err'> You must type a keyword or select a category. </h2>"; 
                }else{
                
               echo " <div id='carousel-example-generic' class='carousel slide' data-ride='carousel'>";
                    //  <!-- Indicators -->
                echo "<ol class='carousel-indicators'>";
                    
                    for($i = 0; $i < 7; $i++) {
                        echo "<li data-target='#carousel-example-generic' data-slide-to='$i'";
                        echo ($i == 0)?" class='active'" : "";
                        echo "></li>";
                    }
                
               ?>
                </ol>
           
                <div class="carousel-inner" role= "listbox">
                    <?php
                     for($i = 0; $i < 7; $i++)
                {
                    do {
                        $randomIndex = rand(0,count($imageURLs));
                    }
                    while(!isset($imageURLs[$randomIndex]));
                    
                        
                        echo '<div class="item ';
                        echo($i == 0 ) ? "active": "";
                        echo '">';
                        echo '<img src="' . $imageURLs[$randomIndex] . '">';
                        echo '</div>';
                        unset($imageURLs[$randomIndex]);
                }
                
                ?>
                </div>
                
                <!--Controls-->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>

                </a>
                </div>
                     <?php 
            }//end of else statement
            }//end of err else statement
            ?>
               <br>
               
     
         
              
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
               
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" 
        crossorigin="anonymous"></script>
        
        </body>
    
         
      
</html>