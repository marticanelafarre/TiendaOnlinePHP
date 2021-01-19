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
				<h3 style="text-align:center">NUEVO PRODUCTO</h3>
			</div>
			
			<form class="form-horizontal" method="POST" action="guardar_producto.php" autocomplete="off">
				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Nombre del Producto:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
					</div>
				</div>
				
				<div class="form-group">
					<label for="email" class="col-sm-2 control-label">Descripcion:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="desc" name="desc" placeholder="Descripcion" required>
					</div>
				</div>
				
				<div class="form-group">
					<label for="telefono" class="col-sm-2 control-label">Precio:</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" id="precio" name="precio" placeholder="Precio">
					</div>
				</div>
					
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<a href="acion_admin.php" class="btn btn-info">Volver</a>
                        <button type="submit" class="btn btn-warning">Guardar</button>
                    </div>
				</div>
			</form>
		</div>
	</body>
</html>
