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
				<h3 style="text-align:center">NUEVO USUARIO</h3>
			</div>
			<!-- FORMULARIO PARA CREAR UN NUEVO USUARIO -->
			<form class="form-horizontal" method="POST" action="guardar_usuario.php" autocomplete="off"><!-- pasamos los valores con el metodo post al archivo guardar_usuario.php -->
				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Nombre</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
					</div>
				</div>
				
				<div class="form-group">
					<label for="email" class="col-sm-2 control-label">Correo</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" id="correo" name="correo" placeholder="Correo" required>
					</div>
				</div>
				
				<div class="form-group">
					<label for="telefono" class="col-sm-2 control-label">Telefono</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono">
					</div>
				</div>
				
				<div class="form-group">
					<label for="telefono" class="col-sm-2 control-label">Direccion</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion">
					</div>
				</div>
				
				<div class="form-group">
					<label for="telefono" class="col-sm-2 control-label">Contraseña</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="pwd" name="pwd" placeholder="Contraseña">
					</div>
				</div>

				<div class="form-group">
					<label for="telefono" class="col-sm-2 control-label">Repetir Contraseña</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="pwd2" name="pwd2" placeholder="Contraseña">
					</div>
				</div>
				<!-- BOTONES -->	
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<a href="admin_usuarios.php" class="btn btn-info">Volver</a>
                        <button type="submit" class="btn btn-warning">Guardar</button>
                    </div>
				</div>
			</form>
		</div>
	</body>
</html>
