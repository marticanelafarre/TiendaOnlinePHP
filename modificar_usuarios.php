<?php
	include 'Configuracion.php';

	$conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);
		
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	
	}   
	if(isset($_GET['id'])){
	$id=$_GET['id'];
	$sql="SELECT * FROM clientes WHERE ID='$id'";
	$result=mysql_query($sql); 
}

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
				<h3 style="text-align:center">MODIFICAR USUARIO</h3>
			</div>
			
			<form class="form-horizontal" method="POST" action="actualizar_usuario.php?id=<?php echo $_GET['$id']?>">
				<input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>" />
				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Nombre</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre"  required>
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
						<input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Telefono" >
					</div>
				</div>
                
                <div class="form-group">
					<label for="telefono" class="col-sm-2 control-label">Direccion</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion" >
					</div>
                </div>
                
                <div class="form-group">
					<label for="telefono" class="col-sm-2 control-label">Constraseña</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="pwd" name="pwd" placeholder="Constraseña" >
					</div>
				</div>
	
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<a href="admin_usuarios.php" class="btn btn-default">Volver</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>