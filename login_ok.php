<?php
session_start();

$logueado=0;
	
header("Content-Type: text/html;charset=utf-8");


		$nombre = $_POST["nombre"];
		$pwd = $_POST["pwd"];

	$con = mysqli_connect('localhost', 'root', '', 'tienda') or die(mysql_error());
	
	if (!$con)
	{
		die("No se ha podido realizar la conexión ERROR:" . mysqli_connect_error() . "<br>");
	}
	else
	{
		mysqli_set_charset ($con, "utf8");
	}
	
	$instruccion = "select count(*) as cuantos from clientes where nombre = '$nombre'";
	$resultado = mysqli_query($con, $instruccion);
		while ($fila = $resultado->fetch_assoc()) {
		$numero=$fila["cuantos"];
	}
	if($numero==0){
		echo "ERROR. El usuario introducido no existe";
		echo "<script>setTimeout(\"location = 'login.html';\",1500);</script>";
	}
	else{
	$instruccion = "select pwd as cuantos from clientes where nombre = '$nombre'";
	$resultado = mysqli_query($con, $instruccion);

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