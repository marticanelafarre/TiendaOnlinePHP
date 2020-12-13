<?php
	
    include 'Configuracion.php';
 
	$id = $_GET['id'];
	
	$query_eliminar = "DELETE * FROM mis_productos WHERE id = '$id'";
    

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
	
	<body>
		<div class="container">
			<div class="row">
				<div class="row" style="text-align:center">
				<?php if($query_eliminar) { ?>
				<h3>PRODUCTO ELIMINADO</h3>
				<?php } else { ?>
				<h3>ERROR. EL PRODUCTO NO SE HA ELIMINADO</h3>
				<?php } ?>
				
				<a href="acion_admin.php" class="btn btn-primary">Volver</a>
				
				</div>
			</div>
		</div>
	</body>
</html>