<?php


$inc = include("../service/_conexion.php");

$sql = "SELECT * FROM pedido 
INNER JOIN productos ON pedido.id_producto = productos.id_producto
INNER JOIN estados_ped ON pedido.estado_ped = estados_ped.estado_ped
WHERE pedido.estado_ped = 3";
$resultado= mysqli_query($con, $sql);

if ($resultado){
    while($row = $resultado->fetch_array()){
        $codped = $row['codped'];
        $coduser = $row['cod_user'];
        $producto = $row['nombre_producto'];
        $cantidad = $row['cantidad'];
        $estado = $row['estado_ped'];
        $descri = $row['descri_estado'];
        
        ?>
        <tr>
            <form action="edit/editEstado.php?id=<?php echo $codped?>&pag=1" method="POST">
                <th scope="row"><?php echo $codped;?></th>
                <th scope="row"><?php echo $coduser;?></th>
                <th scope="row"><?php echo $producto;?></th>
                <th scope="row"><?php echo $cantidad;?></th>
                <th scope="row"><input type="text" value="<?php echo $estado;?>" name="estado"></th>
                <th scope="row"><?php echo $descri;?></th>
            </form>
            <?php
            echo '<td><a href="eliminar/eliminar_pedido.php?id='.$codped.'&pag=1"><i class="fas fa-times"></i></a></td>';
            ?>
        </tr>
        <?php
    }
}