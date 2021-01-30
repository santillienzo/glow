<?php

$inc = include("../service/_conexion.php");




$sql = "SELECT * FROM roomdecor";
$result= mysqli_query($con,$sql);

if ($result) {
    while($row = $result->fetch_array()){
        $room_id = $row['room_id'];
        $id = $row['id_producto'];
        ?>
        <tr>
            <th scope="row"><?php echo $room_id?></th>
            <td><?php echo $id?></td>
            <?php
            echo '<td><a href="eliminar/eliminar_roomdecor.php?id='.$room_id.'"><i class="fas fa-times"></i></a></td>';
            ?>
        </tr>
        <?php
    }
}