<?php

if(isset($_FILES["fileToUpload"])){
   // pre_r($_FILES);

$phpFileUploadErrors = array(

    0 => 'There is no error, the file uploaded successfully',
    1 => 'The uploaded file is too big',
    2 => 'The uploaded file bigger than what was specified in the HTML form',
    3 => 'The uploaded file was only partially uploaded',
    4 => 'No file was uploaded',
    5 => 'Missing temporary folder',
    6 => 'Failed to write file to disk',
    7 => 'A PHP extension stopped the file upload',
);

    $ext_error = false;
    $extensions = array('jpg', 'jpeg' , 'gif' , 'png');
    $file_ext = explode('.' , $_FILES['fileToUpload']['name']);
    $file_ext = end($file_ext);

    if(!in_array($file_ext, $extensions)){
        $ext_error = true;
    }

//if error is not 0
if ($_FILES['fileToUpload']['error']){

echo $phpFileUploadErrors[$_FILES['fileToUpload']['error']];

}
elseif ($ext_error){
    echo 'Invalid file extension';

}
else {
    echo "Success! Image has been uploaded";
}


    move_uploaded_file($_FILES['fileToUpload']['name'], 'images/' . $_FILES['fileToUpload']['name']);
    
    print_r($file_ext);

}

function pre_r($array){

echo '<pre>';
print_r($array);
echo '</pre>';

}


?>