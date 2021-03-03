<?php
    session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/editusu.css">
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/object/nav.css">
    <link rel="stylesheet" href="style/object/copy.css">
    <link rel="icon" href="Images/ico.ico">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Alata&display=swap" rel="stylesheet">    
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300&display=swap" rel="stylesheet">

    <title>EDITAR DATOS</title>
</head>
<body>
    <?php require'partials/nav.php';?>

    <article>
    <?php
        if (isset($_SESSION['cod_user'])) {
            echo
            '<div class="title"><h4>'.$_SESSION['nom_usu']." ".$_SESSION['apellido_usu'].'</h4></div>';
        }
        
        ?>
        <div class="user-info-container">
            <div class="form-container">
                <div class="title-editar">
                    <h4>Editar datos</h4>
                </div>
                <form action="service/sesion/editUsu.php" method="POST">
                    <input type="text" placeholder ="Ingrese su nombre" name="name" value="<?php echo $_SESSION['nom_usu'];?>">
                    <input type="text" placeholder ="Ingresa tu apellido" name="surname" value="<?php echo $_SESSION['apellido_usu'];?>">
                    <input type="text" placeholder ="Dime tu email" name="email" value="<?php echo $_SESSION['email_usu'];?>">
                    <input type="text" placeholder ="Dime tu número de telefono" name="phone" value="<?php echo $_SESSION['tel_usu'];?>">
                    <button>Guardar cambios</button>
            
                    <?php
                        if (isset($_GET['e'])) {
                            switch ($_GET['e']) {
                                case '1':
                                    echo '<p class="error">No se ha podido actualizar los datos. Intentalo nuevamente</p>';
                                    break;							
                                default:
                                    break;
                            }
                        }
                    ?>
                </form>
            </div>
        </div>
    </article>



    <?php require'partials/foot.php';?>
</body>
</html>