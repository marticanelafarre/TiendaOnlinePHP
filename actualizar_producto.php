<?php
	include 'Configuracion.php';// incluimos el archivo de conexion

header("Content-Type: text/html;charset=utf-8");
if (isset($_POST["nombre"])){
    $id = $_POST["id"];
	$nombre = $_POST["nombre"];
	$descripcion = $_POST["descripcion"];
	$precio = $_POST["precio"];

	//Inserción de datos
	//Primero compruebo si el nombre existe
		$instruccion = "UPDATE mis_productos SET id='$id', nombre='$nombre', descripcion='$descripcion', precio='$precio' WHERE id = '$id'";
		$res = mysqli_query($db, $instruccion);
				
		if(!$res){
			die("No se ha podido modificar el producto");
		}else{
			//me lleva al login para que pruebe mi contraseña
			echo "<script>alert('Producto modificado correctamente');</script>";
			include_once("acion_admin.php");
		}
	}
?>

