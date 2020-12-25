<?php
	
header("Content-Type: text/html;charset=utf-8");
if (isset($_POST["nombre"]))
{
	$nombre = $_POST["nombre"];
	$correo = $_POST["correo"];
	$telefono = $_POST["telefono"];
	$direccion = $_POST["direccion"];
	$pwd = $_POST["pwd"];
	$pwd2 = $_POST["pwd2"];

	$con = mysqli_connect('localhost', 'root', '', 'tienda') or die(mysql_error());
	
	if (!$con)
	{
		die("No se ha podido realizar la conexión ERROR:" . mysqli_connect_error() . "<br>");
	}
	
	else
	{
		mysqli_set_charset ($con, "utf8");
	}
	
	//Inserción de datos
	
	//Primero compruebo si el nick existe
	$instruccion = "select count(*) as cuantos from clientes where nombre = '$nombre'";
	$res = mysqli_query($con, $instruccion);
	$datos = mysqli_fetch_assoc($res);
	//ahora la pwd
    if($pwd!=$pwd2){
		die("Error. Las contraseñas introducidas no coinciden");
	}
	
	if ($datos['cuantos'] == 0)
	{
		$instruccion = "insert into clientes values ('null','$nombre','$correo','$telefono','$direccion', '$pwd')";
		$res = mysqli_query($con, $instruccion);
		if (!$res) 
		{
			die("No se ha podido crear el usuario");
		}
		else
		{
			echo "Usuario creado";
			//me lleva al login para que pruebe mi contraseña
			echo "<script>alert('Usuario creado correctamente');</script>";
			include_once("login.html");
		}
	}
	else
	{
		echo "El nombre $nombre no está disponible";
	}

}
else 
{
	echo ("ERROR: No se puede introducir un nick en blanco");
}
?>