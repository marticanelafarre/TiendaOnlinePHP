<?php
include 'Configuracion.php';// incluimos archivo de conexion

header("Content-Type: text/html;charset=utf-8");
if (isset($_POST["nombre"])){
	$id = $_POST["id"];
	$nombre = $_POST["nombre"];
	$correo = $_POST["correo"];
	$telefono = $_POST["telefono"];
	$direccion = $_POST["direccion"];
	$pwd = $_POST["pwd"];	
	//hacemos un update de los datos que nos pasa el archivo perfil_usuario.php
		$instruccion = "UPDATE clientes SET id='$id', nombre='$nombre', correo='$correo', telefono='$telefono', direccion='$direccion', pwd='$pwd' WHERE id = '$id'";
		$res = mysqli_query($db, $instruccion);
				
		if(!$res){
			die("No se ha podido modificar el usuario");
		}else{
			//me lleva al login para que pruebe mi contraseña
			echo "Enhorabuena! Perfil Modificado.";
			echo "<script>setTimeout(\"location = 'index.php';\",1100);</script>";
		}
	}
?>
