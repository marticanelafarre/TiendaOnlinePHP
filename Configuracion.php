<?php
//DB details
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = 'usbw';
$dbName = 'tienda';

//Create connection and select DB
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    die("ERROR. No hay connexión." . $db->connect_error);
} 
?>