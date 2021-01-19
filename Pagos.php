<?php

include 'Configuracion.php';
include 'La-carta.php';
$cart = new Cart;

// nos vamos a index.php si el carrito esta vacio. 
if($cart->total_items() <= 0){
    header("Location: index.php");
}

// ponemos por defecto el usuario 1 (provisional)
$_SESSION['sessCustomerID'] =2;

// cogemos los datos del usuario selecionado
$query = $db->query("SELECT * FROM clientes WHERE id = ".$_SESSION['sessCustomerID']);
$custRow = $query->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
    .container{padding: 20px;}
    .table{width: 65%;float: left;}
    .shipAddr{width: 30%;float: left;margin-left: 40px; margin-top:-40px}
    .orderBtn {float: right;}
    </style>
</head>
<body>
<div class="container">
<div class="panel-body">
    <h1>Resumen</h1>
    <table class="table">
    <thead>
        <tr>
            <th>Producto</th>
            <th>Pricio</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if($cart->total_items() > 0){
            //cogemos los datos del carrito y lo printamos. 
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
        ?>
        <tr>
            <td><?php echo $item["nombre"]; ?></td>
            <td><?php echo $item["precio"].' €'; ?></td>
            <td><?php echo $item["qty"]; ?></td>
            <td><?php echo $item["subtotal"].' €'; ?></td>
        </tr>
        <?php } }else{ ?>
        <tr><td colspan="4"><p>No has selecionado ningun producto.</p></td>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3"></td>
            <?php if($cart->total_items() > 0){ ?>
            <td class="text-center"><strong>Total <?php echo $cart->total().' €'; ?></strong></td>
            <?php } ?>
        </tr>
    </tfoot>
    </table>
    <div class="shipAddr">
        <h4><b>Detalles de envio:</b></h4>
        <p><?php echo 'Nombre: ' . $custRow['nombre']; ?></p>
        <p><?php echo 'Correo: ' . $custRow['correo']; ?></p>
        <p><?php echo 'Telefono: ' . $custRow['telefono']; ?></p>
        <p><?php echo 'Dirección: ' . $custRow['direccion']; ?></p>
    </div>
    <div class="footBtn">
    <a href="index.php" class="btn btn-info"><i class="glyphicon glyphicon-circle-arrow-left"></i> Seguir Comprando</a>
    <a href="AccionCarta.php?action=placeOrder" class="btn btn-success orderBtn">Realizar pedido <i class="glyphicon glyphicon-saved"></i></a>   
</div>
        </div>
 </div>
</div>
</body>
</html>