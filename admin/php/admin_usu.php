<?php


$inc = include("../service/_conexion.php");
session_start();

if ($inc) {
    $sql = "SELECT * FROM usuario";
    $resultado= mysqli_query($con, $sql);
    if ($resultado) {
        while($row = $resultado->fetch_array()){
            $id = $row['cod_user'];
            $nombre = $row['nom_usu'];
            $apellido = $row['apellido_usu'];
            $email = $row['email_usu'];
            $tel = $row['tel_usu'];
            $dir = $row['dir_usu'];
            $fecha = $row['fecha_creada'];
            ?>
            <div class="carta_user">
                <p class="nombre_user"><?php echo $nombre.' '.$apellido;?></p>
                <div class="info_user_container">
                    <p><span>ID:</span><?php echo $id;?></p>
                    <p><span>EMAIL:</span><?php echo $email;?></p>
                    <p><span>N° TELÉFONO:</span><?php echo $tel;?></p>
                    <p><span>DIRECCIÓN:</span><?php echo $dir;?></p>
                    <p><span>REGISTRO:</span><?php echo $fecha;?></p>
                    <?php
                    if ($id != 1) {
                        echo
                        '<a class="eliminar" href="eliminar/eliminar_user.php?id='.$id.'"><span>Eliminar usuario</span></a>';
                    }else{
                        echo
                        '<p class="admin">Cuenta admin. Imposible borrar</p>';
                    }
                    ?>
                </div>
            </div>
            <?php
        }
    }
}