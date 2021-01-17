<?php
	include 'Configuracion.php';//ponemos el fichero de configuracion para conectarse a la bbdd
	
	$id = $_GET['id'];
	$query =  $db->query("SELECT * FROM mis_productos WHERE id = '$id'");//cremos la sentencia select
	$row = $query->fetch_assoc();//obtenimos las filas de los resultados. 


?>
<html lang="es">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
				<h3 style="text-align:center">MODIFICAR PRODUCTO</h3>
			</div>
			<!-- FORMULARIO -->
			<form class="form-horizontal" method="POST" action="actualizar_producto.php" autocomplete="off"><!-- Pasamos los datos como post a actualizar_producto.php -->
			
				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">ID:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="id" name="id" value="<?php echo $row['id']; ?>" disabled>
					</div>
				</div>

				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Nombre del Producto:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $row['nombre']; ?>" required>
					</div>
				</div>
								
				<div class="form-group">
					<label for="email" class="col-sm-2 control-label">Descripcion:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion" value="<?php echo $row['descripcion']; ?>"  required>
					</div>
				</div>
				
				<div class="form-group">
					<label for="telefono" class="col-sm-2 control-label">Precio:</label>
					<div class="col-sm-10">
						<input type="tel" class="form-control" id="precio" name="precio" placeholder="Precio" value="<?php echo $row['precio']; ?>" >
					</div>
				</div>
			<!-- BOTONES -->
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<a href="acion_admin.php" class="btn btn-default">Volver</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>