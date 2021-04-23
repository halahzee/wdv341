<?php
require_once 'functions.php';

$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'final_project';
$connectionError = "";

try {

    $conn = new PDO("mysql: host=$servername; dbname=$database;", $username, $password);


    //ATTR_ERR sent the PDO error type          //EMM_EXC: Throw Excep.

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // echo '<pre>'; print_r("Connected Successfully"); echo '</pre>';


} catch (PDOException $e) {
    //handle our exception

    echo '<pre>';
    print_r("Failed!!^^^^");
    echo '</pre>';
}
