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
    .carrito{margin-left: 880px; margin-top: -87px;}
    .salir{float: right; margin-left:10px; margin-top: -55px}
    </style>
</head>
</head>
<body>
<div class="container">
<div class="panel-body">
    <h1>Tienda</h1>
    <a href="login.html" class="btn btn-danger btn-lg salir"><span class="glyphicon glyphicon-off"> Salir</span></a>
    <a href="menu_admin.html" class="btn btn-info btn-lg carrito"><i class="glyphicon glyphicon-circle-arrow-left"></i> Volver</a>

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
                    <p class="list-group-item-text"><?php echo $row["desc"]; ?></p>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="lead"><?php echo $row["precio"].' €'; ?></p>
                        </div>
                        <div class="col-md-6">
                            <a class="btn btn-warning boton" href="#" onclick="return confirm('Seguro que lo quieres eliminar?')"><i class="glyphicon glyphicon-trash"></i> Eliminar</a>
                            <a class="btn btn-primary boton" href="#"><i class="glyphicon glyphicon-pencil"></i> Modificar</a>
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
 </div>< 
</body>
</html>