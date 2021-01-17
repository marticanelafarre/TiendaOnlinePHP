<?php
	include 'Configuracion.php';//ponemos el fichero de configuracion para conectarse a la bbdd


	$query = $db->query("SELECT * FROM clientes WHERE id=1");//creamos la sentencia en este caso un select para ver el perfil que se ha registrado y obtener sus datos. 
	$row = $query->fetch_assoc();//lo recogemos por filas y lo ponemos al row. 


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
				<h3 style="text-align:center">PERFIL USUARIO</h3>
			</div>
			<!-- FOMRULARIO PARA MODIFICAR EL USUARIO -->
			<form class="form-horizontal" method="POST" action="actualizar_usuario_paraclientes.php" autocomplete="off"><!-- Vamos a pasar los datos via post a actualizar_usuario_paraclientes.php  -->
					<!-- hidden para que el user no lo vea -->
				<input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>" />

				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Nombre</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $row['nombre']?>" required>
					</div>
				</div>
								
				<div class="form-group">
					<label for="email" class="col-sm-2 control-label">Correo</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" id="correo" name="correo" placeholder="Correo" value="<?php echo $row['correo']?>" required>
					</div>
				</div>
				
				<div class="form-group">
					<label for="telefono" class="col-sm-2 control-label">Telefono</label>
					<div class="col-sm-10">
						<input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Telefono" value="<?php echo $row['telefono']?>" >
					</div>
				</div>
                
                <div class="form-group">
					<label for="telefono" class="col-sm-2 control-label">Direccion</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion" value="<?php echo $row['direccion']?>" >
					</div>
                </div>
                
                <div class="form-group">
					<label for="telefono" class="col-sm-2 control-label">Constraseña</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="pwd" name="pwd" placeholder="Constraseña" value="<?php echo $row['pwd']?>">
					</div>
				</div>
	
				<!-- BOTONES -->
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<a href="index.php" class="btn btn-default">Volver</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>