<!Doctype html>
<?php
print_r($_FILES);
echo $_FILES['myFile'][''];
?>
<html>
<head>
    <title>Lab 10: Photo Gallery</title>
</head>
<body>
    
    <form method="POST" ectype="multipart/form-data">
        
        <input type="file" name="fileName"/>
        
        <input type="submit" name="Upload File!"/>
        
    </form>
    
</body>
</html>