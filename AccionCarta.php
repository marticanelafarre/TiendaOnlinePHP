<?php
// Iniciamos la clase de la carta
include 'La-carta.php';
$cart = new Cart;

// incluimos el archivo para los parametros de conexion con la BBDD.
include 'Configuracion.php';
if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){
    if($_REQUEST['action'] == 'addToCart' && !empty($_REQUEST['id'])){
        $idProducto = $_REQUEST['id'];
        // get product details
        $query = $db->query("SELECT * FROM mis_productos WHERE id = ".$idProducto);
        $row = $query->fetch_assoc();
        $itemData = array(
            'id' => $row['id'],
            'nombre' => $row['nombre'],
            'precio' => $row['precio'],
            'qty' => 1
        );
        
        $insertItem = $cart->insert($itemData);
        $redirectLoc = $insertItem?'carrito.php':'index.php';
        header("Location: ".$redirectLoc);
    }elseif($_REQUEST['action'] == 'updateCartItem' && !empty($_REQUEST['id'])){
        $itemData = array(
            'rowid' => $_REQUEST['id'],
            'qty' => $_REQUEST['qty']
        );
        $updateItem = $cart->update($itemData);
        echo $updateItem?'ok':'err';die;
    }elseif($_REQUEST['action'] == 'removeCartItem' && !empty($_REQUEST['id'])){
        $deleteItem = $cart->remove($_REQUEST['id']);
        header("Location: carrito.php");
    }elseif($_REQUEST['action'] == 'placeOrder' && $cart->total_items() > 0 && !empty($_SESSION['sessCustomerID'])){
        // hacemos un insert del pedido que quiere hacer el usuario. 
        $insertOrder = $db->query("INSERT INTO pedido (idCliente, precioTotal) VALUES ('".$_SESSION['sessCustomerID']."', '".$cart->total()."')");
        
        if($insertOrder){
            $idPedido = $db->insert_id;
            $sql = '';
            // cogemos los intem del carrito y lo guardamos en cartItmens
            $cartItems = $cart->contents();
            
            if($insertOrderItems){
                $cart->destroy();
                header("Location: OrdenExito.php?id=$idPedido");
            }else{
                $cart->destroy();
                header("Location: OrdenExito.php?id=$idPedido");
            }
        }else{
            header("Location: Pagos.php");
        }
    }else{
        header("Location: index.php");
    }
}else{
    header("Location: index.php");
}