<?php

include 'Configuracion.php';

if(!isset($_REQUEST['id'])){
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <meta charset="utf-8">
    <style>
    .container{padding: 20px;}
    p{color: #66D45B;font-size: 18px;}
    </style>
</head>
</head>
<body>
<div class="container">
<div class="panel-heading">
<div class="panel-body">
    <h1>Estado del pedido</h1>
    <h3><p>Estimado Cliente,</p></h3>
    <p>Su pedido ha sido enviado exitosamente. La ID del pedido es #<?php echo $_GET['id']; ?></p>
    </div>
 </div><!--Panek cierra-->
 </div>
</div>
</body>
</html>