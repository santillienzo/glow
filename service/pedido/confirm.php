<?php
    session_start();
    $response=new stdClass();
    $cod_user= $_SESSION['cod_user'];
    include('../_conexion.php');

    $sql = "UPDATE pedido SET estado_ped = 2 WHERE estado_ped = 1 AND cod_user = '$cod_user'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        header("Location: ../../pedido.php");
    }



    ?>
