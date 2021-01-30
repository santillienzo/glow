<?php

include("service/_conexion.php");
session_start();
$usuario = $_SESSION['cod_user'];

if (isset($_POST['dir_btn'])) {
    if (isset($_SESSION['cod_user'])) {
        
        if (strlen($_POST['prov_envio']) >= 1 &&
        strlen($_POST['ciudad_envio']) >= 1 &&
        strlen($_POST['calle_envio']) >= 1 &&
        strlen($_POST['numero_envio']) >= 1 &&
        strlen($_POST['postal_envio']) >= 1) {
            $direccion_usu =ucwords(strtolower(trim($_POST['prov_envio']))). ' | '.
                            ucwords(strtolower(trim($_POST['ciudad_envio']))).' | '.
                            ucwords(strtolower(trim($_POST['barrio_envio']))).' | '.
                            ucwords(strtolower(trim($_POST['calle_envio']))).' | '.
                            ucwords(strtolower(trim($_POST['numero_envio']))).' | '.
                            ucwords(strtolower(trim($_POST['depart_envio']))).' | '.
                            trim($_POST['postal_envio']); 
            $sql = "UPDATE usuario SET dir_usu='$direccion_usu'
                    WHERE cod_user = '$usuario'";
            $resultado = mysqli_query($con,$sql);
    
            if ($resultado) {
                $_SESSION['dir_usu'] = $row['dir_usu'];
                header('Location: carrito.php');
            }
            else{
                header('Location: direccion.php?e=1');
            }
        }else{
            header('Location: direccion.php?e=2');
        }
    }else{
        header('Location: direccion.php?e=3');
    }
}

