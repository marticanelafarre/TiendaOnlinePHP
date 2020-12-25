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
		echo "Bienvenido/a ". $nombre . "<br>";
	}
	
	$instruccion = "select count(*) as cuantos from clientes where nombre = '$nombre'";
	$resultado = mysqli_query($con, $instruccion);
		while ($fila = $resultado->fetch_assoc()) {
		$numero=$fila["cuantos"];
	}
	if($numero==0){
		echo "ERROR. El usuario no existe";
?>
		<br>
		<a  href="login.html">Volver al Login</a>
<?php
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
?>
		<br>
		<a  href="login.html">Volver al Login</a>
<?php
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