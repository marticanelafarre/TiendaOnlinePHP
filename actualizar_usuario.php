<?php
	include 'Configuracion.php';

header("Content-Type: text/html;charset=utf-8");
if (isset($_POST["nombre"]))
{
    $id = $_POST["id"];
	$nombre = $_POST["nombre"];
	$correo = $_POST["correo"];
	$telefono = $_POST["telefono"];
	$direccion = $_POST["direccion"];
	$pwd = $_POST["pwd"];

	$con = mysqli_connect('localhost', 'root', 'usbw', 'tienda') or die(mysql_error());
	
	if (!$con)
	{
		die("No se ha podido realizar la conexión ERROR:" . mysqli_connect_error() . "<br>");
	}
	
	else
	{
		mysqli_set_charset ($con, "utf8");
	}
	
	//Inserción de datos
	
	//Primero compruebo si el nombre existe
	$instruccion = "select count(*) as cuantos from clientes where nombre = '$nombre'";
	$res = mysqli_query($con, $instruccion);
	$datos = mysqli_fetch_assoc($res);
	
	if ($datos['cuantos'] == 0)
	{
		$instruccion = "UPDATE clientes SET nombre='$nombre', correo='$correo', telefono='$telefono', pwd='$pwd' WHERE id = '$id'";
		$res = mysqli_query($con, $instruccion);
		if (!$res) 
		{
			die("No se ha podido modificar el usuario");
		}
		else
		{
			//me lleva al login para que pruebe mi contraseña
			echo "<script>alert('Usuario modificado correctamente');</script>";
			include_once("admin_usuarios.php");
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
