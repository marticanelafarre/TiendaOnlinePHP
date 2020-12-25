<?php
	include 'Configuracion.php';

header("Content-Type: text/html;charset=utf-8");
if (isset($_POST["nombre"]))
{
    $id = $_POST["id"];
	$nombre = $_POST["nombre"];
	$descripcion = $_POST["descripcion"];
	$precio = $_POST["precio"];

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
	
	//Primero compruebo si el nombre existe
		$instruccion = "UPDATE mis_productos SET id='$id', nombre='$nombre', descripcion='$descripcion', precio='$precio', estado=1 WHERE id = '$id'";
		$res = mysqli_query($con, $instruccion);
				
		if (!$res) 
		{
			die("No se ha podido modificar el producto");
		}
		else
		{
			//me lleva al login para que pruebe mi contraseña
			echo "<script>alert('Producto modificado correctamente');</script>";
			include_once("acion_admin.php");
		}
	}
?>
