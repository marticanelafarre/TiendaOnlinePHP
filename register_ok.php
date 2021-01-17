<?php
include 'Configuracion.php';//ponemos el fichero de configuracion para conectarse a la bbdd


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
	//Primero compruebo si el nick existe
	$instruccion = "select count(*) as cuantos from clientes where nombre = '$nombre'";//creamos un select y guardamos la sentencia en instruccion. 
	$res = mysqli_query($db, $instruccion);//ejecutamos en la bbdd
	$datos = mysqli_fetch_assoc($res);//obtenemos los valores por filas y lo guardamos en este caso en datos. 
	
    if($pwd!=$pwd2){//ahora miramos si coniciden las pwd
		echo "Error. Las contraseñas introducidas no coinciden";//en caso que no printa el mensaje.
		die("<script>setTimeout(\"location = 'register.html';\",1100);</script>");
	}
	
	if ($datos['cuantos'] == 0)	{
		$instruccion = "insert into clientes values ('null','$nombre','$correo','$telefono','$direccion', '$pwd')";//hacemos un insert para crear el usuario en la bbdd.
		$res = mysqli_query($db, $instruccion);//ejecutamos la sentencia anterior. 
		if (!$res){ //en caso de haver un fallo con la conexion de la bbdd.
			die("No se ha podido crear el usuario");
		}
		else {//en caso de que este todo correcto. 
			echo "Usuario creado";
			//me lleva al login para que pruebe mi contraseña
			echo "<script>alert('Usuario creado correctamente');</script>";
			include_once("login.html");
		}
	} else{
		echo "El nombre $nombre no está disponible";
	}

} else {
	echo ("ERROR: No se puede introducir un nick en blanco");
}
?>