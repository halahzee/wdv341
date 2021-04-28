<?php
//use current session
session_start();

//user is not longer a valid user
$_SESSION["is_logged_in"] = "no";

//remove session variables
session_unset();

//remove current session
session_destroy();

//redirect to login page
header('location: movieHome.php');
?>