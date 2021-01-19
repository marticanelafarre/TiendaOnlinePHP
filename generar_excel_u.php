<?php
header('Content-type:application/xls');
header('Content-Disposition: attachment; filename=usuariosTIENDA.xls');
include 'Configuracion.php';// incluimos archivo de conexion
$query = $db->query("SELECT * FROM clientes ORDER BY id");

if($query->num_rows > 0){ 
    while($row = $query->fetch_assoc()){
?>
<table border="1">
<tr>
    <th>Nombre</th>
    <th>Correo</th>
    <th>Telefono</th>
    <th>direccion</th>
</tr>
<tr>
    <th><?php echo $row["nombre"]; ?></th>
    <th><?php echo $row["correo"]; ?></th>
    <th><?php echo $row["telefono"]; ?></th>
    <th><?php echo $row["direccion"]; ?></th>
</tr>
</table>
    <?php } }?>


