<?php


$inc = include("../service/_conexion.php");

$sql = "SELECT * FROM pedido 
INNER JOIN productos ON pedido.id_producto = productos.id_producto
INNER JOIN usuario ON pedido.cod_user = usuario.cod_user
INNER JOIN estados_ped ON estados_ped.estado_ped = pedido.estado_ped 
WHERE pedido.estado_ped != 1";
$resultado= mysqli_query($con, $sql);

if ($resultado){
    while($row = $resultado->fetch_array()){
        $pedido = $row['codped'];
        $usuario = $row['cod_user'];
        $nombre = $row['nom_usu'];
        $apellido = $row['apellido_usu'];
        $producto = $row['id_producto'];
        $producto_name = $row['nombre_producto'];
        $cantidad = $row['cantidad'];
        $fecha = $row['fecha_pedido'];
        $estado = $row['descri_estado'];
        $dir = $row['dirusuped'];
        $tel = $row['telusuped'];
        ?>
        <tr>
            <th scope="row"><?php echo $pedido;?></th>
            <td><?php echo $usuario;?></td>
            <td><?php echo $nombre;?></td>
            <td><?php echo $apellido;?></td>
            <td><?php echo $producto;?></td>
            <td><?php echo $producto_name;?></td>
            <td><?php echo $cantidad;?></td>
            <td><?php echo $fecha;?></td>
            <td><?php echo $estado;?></td>
            <td><?php echo $dir;?></td>
            <td><?php echo $tel;?></td>
            <?php
            echo '<td><a href="eliminar/eliminar_pedido.php?id='.$pedido.'"><i class="fas fa-times"></i></a></td>';
            ?>
        </tr>
        <?php
}
}