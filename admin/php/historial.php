<?php


$inc = include("../service/_conexion.php");

$sql = "SELECT * FROM compras
INNER JOIN entregas ON entregas.id_entrega = compras.id_entrega
INNER JOIN estado_compras ON estado_compras.estado_compra = compras.estado_compra
WHERE compras.estado_compra  = 3";
$resultado= mysqli_query($con, $sql);

if ($resultado){
    while($row = $resultado->fetch_array()){
        $compra = $row['id_compra'];
        $cod_user = $row['cod_user'];
        $nom_usu = $row['nom_usu'];
        $apellido_usu = $row['apellido_usu'];
        $tel_usu = $row['tel_usu'];
        $email_usu = $row['email_usu'];
        $descri_entrega = $row['descri_entrega'];
        $cantidad = $row['cantidad_pro'];
        $precio = $row['precio_final'];
        $provincia = $row['provincia'];
        $ciudad = $row['ciudad'];
        $barrio = $row['barrio'];
        $calle = $row['calle'];
        $numero = $row['numero'];
        $departamento = $row['departamento'];
        $postal = $row['postal'];
        $fecha = $row['fecha_pedido'];
        $estado = $row['estado_compra'];
        $descri_compras = $row['descri_compra'];
        ?>
        <tr>
            <form action="edit/editEstado_compra.php?id=<?php echo $compra;?>&pag=3" method="POST">
                <th scope="row"><?php echo $compra;?></th>
                <td><?php echo $cod_user;?></td>
                <td><?php echo $nom_usu;?></td>
                <td><?php echo $apellido_usu;?></td>
                <td><?php echo $tel_usu;?></td>
                <td><?php echo $email_usu;?></td>
                <td><?php echo $descri_entrega;?></td>
                <td><?php echo $cantidad;?></td>
                <td><?php echo $precio;?></td>
                <td><?php echo $fecha;?></td>
                <td><?php echo $provincia;?></td>
                <td><?php echo $ciudad;?></td>
                <td><?php echo $barrio;?></td>
                <td><?php echo $calle;?></td>
                <td><?php echo $numero;?></td>
                <td><?php echo $departamento;?></td>
                <td><?php echo $postal;?></td>
                <td><input type="text" value="<?php echo $estado;?>" name="estado"></td>
                <td><?php echo $descri_compras;?></td>
                <?php
                echo '<td><a href="eliminar/eliminar_compra.php?id='.$compra.'&pag=3"><i class="fas fa-times"></i></a></td>';
                ?>
            </form>
        </tr>
        <?php
    }
}