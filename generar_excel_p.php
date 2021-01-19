<?php
header('Content-type:application/xls');
header('Content-Disposition: attachment; filename=productosTIENDA.xls');
include 'Configuracion.php';// incluimos archivo de conexion
$query = $db->query("SELECT * FROM mis_productos ORDER BY id");

if($query->num_rows > 0){ 
    while($row = $query->fetch_assoc()){
?>
<table border="1">
<tr>
    <th>Nombre</th>
    <th>Descripcion</th>
    <th>Precio</th>
</tr>
<tr>
    <th><?php echo $row["nombre"]; ?></th>
    <th><?php echo $row["descripcion"]; ?></th>
    <th><?php echo $row["precio"]; ?></th>
</tr>
</table>
    <?php } }?>



