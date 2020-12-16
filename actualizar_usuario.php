<?php
	include 'Configuracion.php';


if (isset($_POST["nombre"]))
{

	$id=$_GET['id'];
	$nombre = $_POST["nombre"];
	$correo = $_POST["correo"];
	$telefono = $_POST["telefono"];
	$direccion = $_POST["direccion"];
	$pwd = $_POST["pwd"];

	$instruccion = "UPDATE clientes SET id = '".$id."', nombre = '".$nombre."', correo = '".$correo."', telefono = '".$telefono."', direccion = '".$telefono."', estado = '1', pwd = '".$pwd."'
	WHERE id = '".$id."' ";
	$db->query($instruccion);
	$res = mysqli_query($db, $instruccion);
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
		echo "El nombre $nombre del usuario no está disponible";
	}

?>