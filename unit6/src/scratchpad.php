<?php 

$value = 'foo';
$s =$conn->prepare("SELECT name FROM bar WHERE baz = :baz");
$s->bindParam(':baz', $value);
$value = "Something Else";
$s->execute(); 


$value = 'foo';
$s =$conn->prepare("SELECT name FROM bar WHERE baz = :baz");
$s->bindValue(':baz', $value);
$value = "Something Else";
$s->execute(); //execute with where baz = 'foo'

?>
