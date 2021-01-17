<?php
//paramentros de la BBDD
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'tienda';

//creamos la connexion
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    die("ERROR. No hay connexión." . $db->connect_error);
} 
?>