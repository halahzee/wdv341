<?php

require_once('exception_handlers.php'); // will include the file once in the page.

$servername = '127.0.0.1';
$username = 'root';
$password = 'root';
$database = 'wdv341';


try {
$conn = new PDO("mysql: host=$servername; dbname=$database;", $username, $password);


//ATTR_ERR sent the PDO error type          //EMM_EXC: Throw Exception.

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

write_log('Connection Successful', 'debug.log');

} catch(PDOException $e) {

    write_log('Connection Failed', 'debug.loh');
    write_log($e->getMessage(), 'debug.log');


    return 0;

}


?>
