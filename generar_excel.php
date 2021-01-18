<?php
$query = $db->query("SELECT * FROM mis_productos ORDER BY id");
        if($query->num_rows > 0){ 
            while($row = $query->fetch_assoc()){
?>

<table style=border: 1>
<tr>
    <th>Nombre</th>
    <th>Descripcion</th>
    <th>Precio</th>
</tr>
<tr>
    <td><?php echo $row['nombre']; ?></td>
    <td><?php echo $row['descripcion']; ?></td>
    <td><?php echo $row['precio']; ?></td>
</tr>   
</table>

<?php
header('Content-type:application/xls');
header('Content-Disposition: attachment; filename=productostienda.xls');
?>
