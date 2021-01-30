<?php

$inc = include("../service/_conexion.php");



$sql = "SELECT * FROM productos";
$result= mysqli_query($con,$sql);

if ($result) {
    while($row = $result->fetch_array()){
        $id = $row['id_producto'];
        $nombre = $row['nombre_producto'];
        $descri = $row['des_producto'];
        $pre = $row['pre_pro'];
        $estado = $row['estado'];
        $rut_imagen = $row['rut_imagen'];
        ?>
        <tr>
            <th scope="row"><?php echo $id?></th>
            <td><?php echo $nombre?></td>
            <td><?php echo $descri?></td>
            <td><?php echo $pre?></td>
            <td><?php echo $estado?></td>
            <td><?php echo $rut_imagen?></td>
            <?php
            echo '<td><a href="eliminar/eliminar_producto.php?id='.$id.'"><i class="fas fa-times"></i></a></td>';
            ?>
        </tr>
        <?php
    }
}


