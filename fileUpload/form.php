<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
    <style>
        form{
            background: linear-gradient(#e66465, #9198e4);
            padding: 10%;
            font-size: 20px;
        }

        input{
            padding: 10px;
            font-size: 20px;
          
        }
    </style>
</head>

<body>
       <form action="upload.php" method="post" enctype="multipart/form-data">
        
        <h1>WDV341 PHP File Upload</h1><br>
        <br>
        <h2>Select file to upload:</h2><br><br>
        <p>
        <input type="file" name="fileToUpload" id="fileToUpload"></p>
        <br><br><br>
       <p>
        <input type="submit" value="Upload Image" name="submit">
       </p> 
    </form>
</body>
</html>