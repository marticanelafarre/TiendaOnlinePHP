<?php

include 'Configuracion.php';//ponemos el fichero de configuracion para conectarse a la bbdd

session_start();

$logueado=0;

	
header("Content-Type: text/html;charset=utf-8");

$nombre = $_POST["nombre"];
$pwd = $_POST["pwd"];

	
	$instruccion = "select count(*) as cuantos from clientes where nombre = '$nombre'";//creamos sentencia, en este caso un select para ver si el nombre existe, y guardamos esta sentecia en la instruccion 
	$resultado = mysqli_query($db, $instruccion);//ejecutamos la sentencia anterior.
	while ($fila = $resultado->fetch_assoc()) {//miramos si exisite.
		$numero=$fila["cuantos"];
	}
	if($numero==0){//en caso de no haver encotrado a nadie entrara en este if y volvera a la pàgina login.html
		echo "ERROR. El usuario introducido no existe";
		echo "<script>setTimeout(\"location = 'login.html';\",1500);</script>";//he puesto tiempo, es decir va a salir el mensaje de arriba y cuando pase 1500s se va a ir al login automaticamente.
	}
	else{
	$instruccion = "select pwd as cuantos from clientes where nombre = '$nombre'";//ahora hacemos esta sentecia para ver si la pwd es correcta. 
	$resultado = mysqli_query($db, $instruccion);//ejecutamos instruccion con bd (que son los parametros de config).
	while ($fila = $resultado->fetch_assoc()) {//miramos si conciden.
		$pwd2=$fila["cuantos"];
	}
		
	if (!strcmp($pwd2 , $pwd) == 0){//ahora comprovamos si la pwd conicide con la introducida por el usuario,esto lo acemos comparando con este if. 
			echo "ERROR. Contraseña incorrecta";
			echo "<script>setTimeout(\"location = 'login.html';\",1500);</script>";

	}
	
	else{//en caso de que este todo correcto entrara en este if. 
		$logueado=1;
		if ($nombre=="admin"){//si el nombre conicide con admin, va a entrar en el panel de administrador.
			header('Location: menu_admin.html');	
		}
		else{//en caso de ser qualquier usuario va a entrar a index.php. 			
			header('Location: index.php');		
		}		
	}
	}

?>