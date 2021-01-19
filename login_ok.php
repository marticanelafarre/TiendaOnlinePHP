<?php

include 'Configuracion.php';

session_start();

$logueado=0;

	
header("Content-Type: text/html;charset=utf-8");

$nombre = $_POST["nombre"];
$pwd = $_POST["pwd"];

	
	$instruccion = "select count(*) as cuantos from clientes where nombre = '$nombre'";
	$resultado = mysqli_query($db, $instruccion);
		while ($fila = $resultado->fetch_assoc()) {
		$numero=$fila["cuantos"];
	}
	if($numero==0){
		echo "ERROR. El usuario introducido no existe";
		echo "<script>setTimeout(\"location = 'login.html';\",1500);</script>";
	}
	else{
	$instruccion = "select pwd as cuantos from clientes where nombre = '$nombre'";
	$resultado = mysqli_query($db, $instruccion);

	while ($fila = $resultado->fetch_assoc()) {
		$pwd2=$fila["cuantos"];
	}
	
	/////////////////

	if (!strcmp($pwd2 , $pwd) == 0){
			echo "ERROR. Contraseña incorrecta";
			echo "<script>setTimeout(\"location = 'login.html';\",1500);</script>";

	}
	
	else{
		$logueado=1;
		if ($nombre=="admin"){
			header('Location: menu_admin.html');	
		}
		else{			
			header('Location: index.php');		
		}		
	}
	}

?>