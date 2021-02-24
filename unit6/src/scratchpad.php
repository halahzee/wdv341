<?php 

$value = 'foo';
$s =$conn->prepare("SELECT name FROM bar WHERE baz = :baz"); //this is a sql query inside our connection
$s->bindParam(':baz', $value); // bind the value 
$value = "Something Else";
$s->execute(); 


$value = 'foo';
$s =$conn->prepare("SELECT name FROM bar WHERE baz = :baz");
$s->bindValue(':baz', $value);
$value = "Something Else";
$s->execute(); //execute with where baz = 'foo'

?>
