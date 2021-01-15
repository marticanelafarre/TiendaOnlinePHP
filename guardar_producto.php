<?php
	include 'Configuracion.php';

if (isset($_POST["nombre"]))
{
	$nombre = $_POST["nombre"];
	$desc = $_POST["desc"];
	$precio = $_POST["precio"];
	//Inserción de datos
	
	//Primero compruebo si el nombre existe
	$instruccion = "select count(*) as cuantos from mis_productos where nombre = '$nombre'";
	$res = mysqli_query($db, $instruccion);
	$datos = mysqli_fetch_assoc($res);
	
	if ($datos['cuantos'] == 0)
	{
		$instruccion = "insert into mis_productos values ('null','$nombre','$desc','$precio')";
		$res = mysqli_query($db, $instruccion);
		if (!$res) 
		{
			die("No se ha podido crear el producto");
		}
		else
		{
			//me lleva al login para que pruebe mi contraseña
			echo "<script>alert('Producto creado correctamente');</script>";
			include_once("acion_admin.php");
		}
	}
	else
	{
		echo "El nombre $nombre del producto no está disponible";
	}

}
else 
{
	echo ("ERROR: No se puede introducir el nombre del producto en blanco");
}
?>