<?php

$inc = include("../service/_conexion.php");

$sql = "SELECT * FROM productosmv";
$result= mysqli_query($con,$sql);

if ($result) {
    while($row = $result->fetch_array()){
        $pro_mv = $row['pro_mv'];
        $id = $row['id_producto'];
        ?>
        <tr>
            <th scope="row"><?php echo $pro_mv?></th>
            <td><?php echo $id?></td>
            <?php
            echo '<td><a href="eliminar/eliminar_productomv.php?id='.$pro_mv.'"><i class="fas fa-times"></i></a></td>';
            ?>
        </tr>
        <?php
    }
}