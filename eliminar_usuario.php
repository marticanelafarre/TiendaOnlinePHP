<?php
	
    include 'Configuracion.php';//ponemos el fichero de configuracion para conectarse a la bbdd
 
	$id = $_GET['id'];//cojemos la id y la guardmos a la variable $id
		
	$query_eliminar = "DELETE FROM clientes WHERE id = '$id'";// creamos setencia para en este caso elimnar el usuario que queremos. 
    $db->query($query_eliminar);//ejecutamos la setencia en la bbdd.

?>
 
<html lang="es">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-theme.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- /Bootstrap --> 	
	</head>
	<!-- MENSAJE QUE SALDRA -->
	<body>
		<div class="container">
			<div class="row">
				<div class="row" style="text-align:center">
				<?php if($query_eliminar) { ?>
				<h3>USUARIO ELIMINADO</h3>
				<?php } else { ?>
				<h3>ERROR. EL USUARIO NO SE HA ELIMINADO</h3>
				<?php } ?>
				
				<a href="admin_usuarios.php" class="btn btn-primary">Volver</a>
				
				</div>
			</div>
		</div>
	</body>
</html>