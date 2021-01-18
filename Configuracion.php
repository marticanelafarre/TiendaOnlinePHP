<?php
//paramentros de la BBDD
$hostname = 'localhost';
$nombre = 'root';
$pwd = 'usbw';
$bbdd = 'tienda';

//creamos la connexion
$db = new mysqli($hostname, $nombre, $pwd, $bbdd);

if ($db->connect_error) {
    die("ERROR. No hay connexión." . $db->connect_error);
} 
?>