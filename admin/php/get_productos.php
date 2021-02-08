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
            <form action="edit/editar_pro.php?id=<?php echo $id?>" method="POST">
                <th scope="row"><?php echo $id?></th>
                <td><input name="nombre_pro-in" type="text" value="<?php echo $nombre?>"></td>
                <td><input name="descri_pro-in" id="descri_inp" type="text" value="<?php echo $descri?>"></td>
                <td><input name="precio_pro-in" type="text" value="<?php echo $pre?>"></td>
                <td><input name="estado_pro-in" type="text" value="<?php echo $estado?>"></td>
                <td><input name="ruta_pro-in" type="text" value="<?php echo $rut_imagen?>"></td>
                <td><button><i class="fas fa-pen"></i></button></td>
            </form>
            <?php
            echo    
                    '<td><a href="eliminar/eliminar_producto.php?id='.$id.'"><i class="fas fa-times"></i></a></td>';
            ?>
        </tr>
        <?php
    }
}


