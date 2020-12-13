<?php
	include 'Configuracion.php';

header("Content-Type: text/html;charset=utf-8");
if (isset($_POST["nombre"]))
{
    $id = $_POST["id"];
	$nombre = $_POST["nombre"];
	$desc = $_POST["desc"];
	$precio = $_POST["precio"];
ç

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
	$instruccion = "select count(*) as cuantos from mis_productos where nombre = '$nombre'";
	$res = mysqli_query($con, $instruccion);
	$datos = mysqli_fetch_assoc($res);
	
	if ($datos['cuantos'] == 0)
	{
		$instruccion = "UPDATE mis_productos SET nombre='$nombre', desc='$desc', precio='$precio' WHERE id = '$id'";
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
	else
	{
        echo "El nombre $nombre no está disponible";
	}

}
else 
{
    echo ("ERROR: No se puede introducir un producto en blanco");
}
?>
