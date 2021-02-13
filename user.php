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
        <?php
        if (isset($_SESSION['cod_user'])) {
            echo
            '<div class="title"><h4>'.$_SESSION['nom_usu']." ".$_SESSION['apellido_usu'].'</h4></div>';
        }
        
        ?>
        <div class="user-info-container">
            <?php
            if (isset($_SESSION['cod_user'])) {
                echo  
                '<div class="user-elementos-container">'.
                    '<div class="info-title"><h4>Tus datos</h4></div>'.
                    '<div class="datos-container">'.
                        '<div><h5>Nombre</h5><p>'.$_SESSION['nom_usu'].'</p></div>'.                    
                        '<div><h5>Apellido</h5><p>'.$_SESSION['apellido_usu'].'</div>'.
                        '<div><h5>Tu ID</h5><p>'.$_SESSION['cod_user'].'</p></div>'.
                        '<div><h5>Teléfono</h5><p>'.$_SESSION['tel_usu'].'</p></div>'.
                        '<div><h5>Correo</h5><p>'.$_SESSION['email_usu'].'</p></div>'.
                        '<div><h5>Usuario desde</h4><p>'.$_SESSION['fecha_usu'].'</p></div>';
                        if ($_SESSION['dir_usu'] != null) {
                            echo
                            '<div><h5>Ultima dirección</h5><p><a class="dato" href="direccion.php" title="Editar dirección">'.$_SESSION['dir_usu'].'</a></p></div>'.
                            '</div>';
                        }else{
                            echo
                            '<div><h5>Ultima dirección</h5><p><a class="dato" href="direccion.php" title="Agregar dirección">No hay dirección asociada</a></p></div>'.
                            '</div>';
                        }
                        echo
                        '<div class="editar"><a href="editUser.php">Editar datos</a></div>';
					if (isset($_GET['congrat'])) {
						switch ($_GET['congrat']) {
							case '1':
								echo '<p class="congrat">¡Datos cambiados correctamente!</p>';
								break;							
							default:
								break;
						}
					}
				
                echo
                '</div>';
                
            }else{
                echo
                    '<div class="error-container">'.
                        '<div class="error">NO HA INICIADO SESIÓN</div>'.
                        '<a class="errorA" href="login.php">Haz click aquí</a>'.
                    '</div>';
                
            }
            ?>
            
        </div>
        <a href="service/sesion/cerrarSesion.php">CERRAR</a>
        
    </article>
    <?php require 'partials/foot.php'?>


    <script type="text/javascript" src="js/menu.js"></script>
</body>
</html>