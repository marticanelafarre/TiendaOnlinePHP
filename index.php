<?php

include 'Configuracion.php';

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
    .container{padding: 20px;}
    .boton{margin-left: 50px; margin-top: 10px}
    .carrito{margin-left: 826px; margin-top: -127px;}
    .boton2{margin-left: 940px; margin-top: -87px;}
    .salir{float: right; margin-left:10px; margin-top: -55px}
    </style>
</head>
</head>
<body>
<div class="container">
<div class="panel-body">
    <h1>Tienda</h1>
    <a href="#" data-href="login.html" class="btn btn-danger btn-lg salir" data-toggle="modal" data-target="#salir"><span data-toggle="modal" class="glyphicon glyphicon-off"> Salir</span></a>
    <!-- Modal -->
		<div class="modal fade" id="salir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">Cerrar Sesión</h4>
					</div>
					
					<div class="modal-body">
						Seguro que quiere salir de la sesión?
					</div>
					
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						<a class="btn btn-danger btn-ok">Salir</a>
					</div>
				</div>
			</div>
        </div>
        <script>
			$('#salir').on('show.bs.modal', function(e) {
				$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
				
				$('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
			});
		</script>	
    <a href="perfil_usuario.php" class="btn btn-success btn-lg boton2"><span class="glyphicon glyphicon-user"></span></a>
    <a href="VerCarta.php" class="btn btn-info btn-lg carrito"><span class="glyphicon glyphicon-shopping-cart"></span> Carrito</a>
    <div id="products" class="row list-group">
        <?php
        //cogemos las filas de la tabla productos. 
        $query = $db->query("SELECT * FROM mis_productos ORDER BY id DESC LIMIT 10");
        if($query->num_rows > 0){ 
            while($row = $query->fetch_assoc()){
        ?>
        <!-- y los printamos  -->
        <div class="item col-lg-4">
            <div class="thumbnail">
                <div class="caption">
                    <h4 class="list-group-item-heading"><?php echo $row["nombre"]; ?></h4>
                    <p class="list-group-item-text"><?php echo $row["descripcion"]; ?></p>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="lead"><?php echo $row["precio"].' €'; ?></p>
                        </div>
                        <div class="col-md-6">
                            <a class="btn btn-warning boton" href="AccionCarta.php?action=addToCart&id=<?php echo $row["id"]; ?>">Comprar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } }else{ ?>
        <p>Sin productos</p>
        <?php } ?>
    </div>
        </div>
 </div>
</body>
</html>