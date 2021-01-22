<?php
include 'Configuracion.php';
header("Content-Type: text/html;charset=utf-8");

if (isset($_POST["nombre"]))
{
	$nombre = $_POST["nombre"];
	$correo = $_POST["correo"];
	$telefono = $_POST["telefono"];
	$direccion = $_POST["direccion"];
	$pwd = $_POST["pwd"];
	$pwd2 = $_POST["pwd2"];

	//Inserción de datos
	
	//Primero compruebo si el nombre existe
	$instruccion = "select count(*) as cuantos from clientes where nombre = '$nombre'";
	$res = mysqli_query($db, $instruccion);
	$datos = mysqli_fetch_assoc($res);

    if($pwd!=$pwd2){
		echo "Error. Las contraseñas introducidas no coinciden";
		die("<script>setTimeout(\"location = 'nuevo_usuario.php';\",1100);</script>");
	}


	if ($datos['cuantos'] == 0)
	{
		$pass=sha1($_POST['pwd']);
		$instruccion = "insert into clientes values ('null','$nombre','$correo','$telefono','$direccion', '$pass')";
		$res = mysqli_query($db, $instruccion);
		if (!$res) 
		{
			die("No se ha podido crear el usuario");
		}
		else
		{
			//me lleva al login para que pruebe mi contraseña
			echo "<script>alert('Usuario creado correctamente');</script>";
			include_once("admin_usuarios.php");
		}
	}
	else
	{
		echo "El nombre $nombre del usuario no está disponible";
	}

}
else 
{
	echo ("ERROR: No se puede introducir un nombre en blanco");
}
?>