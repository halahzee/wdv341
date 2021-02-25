<?php

$servername = '127.0.0.1';
$username = 'root';
$password = 'root';
$database = 'wdv341';


try {

    $connection = new PDO("mysql:host=$servername; dbname=$database;",$username, $password);
   
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    
    } catch(PDOException $e) {
        //handle our exception

        echo '<pre>'; print_r("Failed!!"); echo '</pre>';
}



?>