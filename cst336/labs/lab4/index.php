<!Doctype html>
<html>
    <head>
        <title>Image Carousel</title>
        <?php
            $backgroundImage = "img/sea.jpg";
            ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" 
        crossorigin="anonymous">
        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" 
        crossorigin="anonymous"></script>
        
        <style>
            @import url("css/styles.css");
            body {
                background-image: url('<?=$backgroundImage ?>');
            }
        </style>
        
        </head>
        <body>
            <br/> <br/>
            <?php
            if(!isset($imageURLs)) {
                echo "<h2> Type a keyword to display a slideshow <br/> with random images from Pixabay.com </h2>";
            } else {
                //Display carousel here
            }
            //API call goes here
            if(isset($_GET['keyword'])) { 
                // echo "You searched for: " . $_GET['keyword'];
                include 'api/pixabayAPI.php';
                $imageURLs = getImageURLs($_GET['keyword']);
                print_r($imageURLs);
            }
            ?>
            <form>
                <input type="text" name="keyword" placeholder="Keyword">
                <input type="submit" value="Submit" />
            </form>
            <br/> <br/>
        </body>
    </head>
</html>