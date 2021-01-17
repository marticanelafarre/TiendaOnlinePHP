<?php
	include 'Configuracion.php';//ponemos el fichero de configuracion para conectarse a la bbdd

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
	$instruccion = "select count(*) as cuantos from clientes where nombre = '$nombre'";// y lo hacemos con una sentencia sql
	$res = mysqli_query($db, $instruccion);//ejecutamos la funciona
	$datos = mysqli_fetch_assoc($res);

    if($pwd!=$pwd2){//hacemos una if para ver si la pwd y la pwd2 conciden. En caso de que no conicidan retornara a la pagina nuevo_usuario.
		echo "Error. Las contraseñas introducidas no coinciden";
		die("<script>setTimeout(\"location = 'nuevo_usuario.php';\",1100);</script>");
	}

	//si es todo correcto: 
	if ($datos['cuantos'] == 0)
	{
		$instruccion = "insert into clientes values ('null','$nombre','$correo','$telefono','$direccion', '$pwd')";//cremaos la sentencia en este caso un insert y la guardamos a instruccion
		$res = mysqli_query($db, $instruccion);//ejecutamos la sentencia creada anteriormente
		if (!$res)// en caso de haver un error con la bbdd. 
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