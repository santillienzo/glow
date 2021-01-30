<?php
session_start();

require 'service/_conexion.php';
error_reporting(0);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/object/nav.css">
    <link rel="stylesheet" href="style/object/copy.css">
    <link rel="stylesheet" href="style/user.css">
    <link rel="icon" href="Images/ico.ico">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Alata&display=swap" rel="stylesheet">    
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300&display=swap" rel="stylesheet">
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>

    <title>TU CUENTA</title>
</head>
<body>
    <?php require 'partials/nav.php'?>
    
    <article>
        <div class="user-info-container">
            <?php
            if (isset($_SESSION['cod_user'])) {
                echo  
                '<div class="user-elementos-container">'.
                    '<h4>Tu cuenta</h4>'.
                    '<div class="datos-container">'.
                        '<p><b>Tu ID</b><br>'.$_SESSION['cod_user'].'</p>'.
                        '<p><b>Nombre</b><br>'.$_SESSION['nom_usu'].'</p>'.
                        '<p><b>Apellido</b><br>'.$_SESSION['apellido_usu'].'</p>'.
                        '<p><b>Teléfono</b><br>'.$_SESSION['tel_usu'].'</p>'.
                        '<p><b>Correo</b><br>'.$_SESSION['email_usu'].'</p>'.
                        '<p><b>Usuario desde</b><br>'.$_SESSION['fecha_usu'].'</p>';
                        if ($_SESSION['dir_usu'] != null) {
                            echo
                            '<p><b>Ultima dirección</b><br><a class="dato" href="direccion.php" title="Editar dirección">'.$_SESSION['dir_usu'].'</a></p>'.
                            '</div>';
                        }else{
                            echo
                            '<p><b>Ultima dirección</b><br><a class="dato" href="direccion.php" title="Agregar dirección">No hay dirección asociada</a></p>'.
                            '</div>';
                        }
                        echo
                '</div>'.
                '<a class="btn_logout" href="service/sesion/cerrarSesion.php"><span>Cerrar sesión</span></a>';
            }else{
                echo
                    '<div class="error-container">'.
                        '<div class="error">NO HA INICIADO SESIÓN</div>'.
                        '<a class="errorA" href="login.php">Haz click aquí</a>'.
                    '</div>';
                
            }
            ?>
        </div>
        
    </article>
    <?php require 'partials/foot.php'?>


    <script type="text/javascript" src="js/menu.js"></script>
</body>
</html>