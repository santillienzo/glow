<?php

$inc = include("../service/_conexion.php");



$sql = "SELECT * FROM complementos";
$result= mysqli_query($con,$sql);

if ($result) {
    while($row = $result->fetch_array()){
        $comple_id = $row['comple_id'];
        $id = $row['id_producto'];
        ?>
        <tr>
            <th scope="row"><?php echo $comple_id?></th>
            <td><?php echo $id?></td>
            <?php
            echo '<td><a href="eliminar/eliminar_complemento.php?id='.$comple_id.'"><i class="fas fa-times"></i></a></td>';
            ?>
        </tr>
        <?php
    }
}