<?php
$query = 'SELECT name, description, presenter';
$query .= 'FROM wdv431_events';
$statementObj = $conn->query($query);
$result = $statementObj->fetchAll(PDO::FETCH_ASSOC);
$conn = null;

/**
 * 
 * 
 * Get records based on specific criteria;
 */


$query = 'SELECT name, description, presenter ';
$query .= 'FROM wdv341_events ';
$query .= 'WHERE presenter = :presenter_name';
$statementObj = $conn->prepare($query);
$statementObj->bindValue(':presenter_name' , 'Drake');
$statementObj->execute();
$result = $statementObj->fetchAll(PDO::FETCH_ASSOC);

?>
