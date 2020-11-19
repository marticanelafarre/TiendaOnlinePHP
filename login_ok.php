<?php
session_start();

$logueado=0;
	
header("Content-Type: text/html;charset=utf-8");


		$nick = $_POST["nick"];
		$password = $_POST["password"];

	$con = mysqli_connect('localhost', 'root', 'usbw', 'tienda') or die(mysql_error());
	
	if (!$con)
	{
		die("No se ha podido realizar la conexión ERROR:" . mysqli_connect_error() . "<br>");
	}
	else
	{
		mysqli_set_charset ($con, "utf8");
		echo "Bienvenido/a ". $nick . "<br>";
	}
	
	$instruccion = "select count(*) as cuantos from clientes where nick = '$nick'";
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
	$instruccion = "select password as cuantos from clientes where nick = '$nick'";
	$resultado = mysqli_query($con, $instruccion);

	while ($fila = $resultado->fetch_assoc()) {
		$password2=$fila["cuantos"];
	}
	
	/////////////////

	if (!strcmp($password2 , $password) == 0){
			echo "ERROR. Contraseña incorrecta";
	}
	
	else{
		$logueado=1;
		if ($nick=="admin"){
			header('Location: menu_admin.html');	
		}
		else{
			header('Location: lista_productos.php');		
		}		
	}
	}

?>