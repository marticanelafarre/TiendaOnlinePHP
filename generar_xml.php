<?php
include 'Configuracion.php';
$cont=0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archivo XML</title>
</head>
<body>
    <h1>Archivo XML</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Telefono</th>
                <th>Direccion</th>
                <th>Contrasenya</th>
            </tr>
        </thead>
        <tbody>       
<?php
$query = $db->query("SELECT * FROM clientes ORDER BY id");
if($query->num_rows > 0){ 
    while($row = $query->fetch_assoc()){
?>
      
        <tr>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['correo']; ?></td>
            <td><?php echo $row['telefono']; ?></td>
            <td><?php echo $row['direccion']; ?></td>
            <td><?php echo $row['pwd']; ?></td>
        </tr>
    
<?php
}
}
?>
<?php
header('Content-type:application/xml');
header('Content-Disposition: attachment; filename=productostienda.xml');
?>
        </tbody>
    </table>
    
</body>
</html>