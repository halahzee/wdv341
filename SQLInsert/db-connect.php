<?php 
require_once('exception_handlers.php');

function db_connect() {
    $serverName = 'localhost';
    $username = 'root';
    $password = 'root';
    $database = 'wdv341';

    try {
        $conn = new PDO("mysql:host=$serverName; dbname=$database;", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

        return $conn;
    } catch(PDOException $e) {
        set_connection_exception_handler($conn, $e);
    }

    return false;
}
?>