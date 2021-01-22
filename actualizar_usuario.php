<?php
include 'Configuracion.php';// incluimos archivo de conexion

header("Content-Type: text/html;charset=utf-8");
if (isset($_POST["nombre"]))
{
	$id = $_POST["id"];
	$nombre = $_POST["nombre"];
	$correo = $_POST["correo"];
	$telefono = $_POST["telefono"];
	$direccion = $_POST["direccion"];
	$pwd=sha1($_POST['pwd']);

	//hacemos una instrucion de sql, en este caso un update y lo ponemos a instruccion 
		$instruccion = "UPDATE clientes SET id='$id', nombre='$nombre', correo='$correo', telefono='$telefono', direccion='$direccion', pwd='$pwd' WHERE id = '$id'";
		$res = mysqli_query($db, $instruccion);//ahora ejecutamos la instruccon en la bbdd
				
		if (!$res) //en caso de no hacer la connexion. 
		{
			die("No se ha podido modificar el usuario");
		}
		else //si es correcto 
		{
			//me lleva al login para que pruebe mi contraseña
			echo "<script>alert('Usuario modificado correctamente');</script>";
			include_once("admin_usuarios.php");
		}
	}
?>
