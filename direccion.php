<?php
    include('service/direccion/agregarDireccion.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/direccion.css">
    <link rel="stylesheet" href="style/object/nav.css">
    <link rel="icon" href="Images/ico.ico">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Alata&display=swap" rel="stylesheet">    
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300&display=swap" rel="stylesheet">
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>

    <title>DIRECCIÓN</title>
</head>
<body>
    <?php require 'partials/nav.php' ?>

    <article class="article">
        <div class="formulario">
            <form action="direccion.php" method="POST">
                <h3>Cambia o agrega una dirección</h3>
                <input type="text" name="prov_envio" placeholder="Provincia">
                <input type="text" name="ciudad_envio" placeholder="Ciudad" >
                <input type="text" name="barrio_envio" placeholder="Barrio (Opcional)">
                <input type="text" name="calle_envio" placeholder="Calle/Cuadra/Manzana" >
                <input type="text" name="numero_envio" placeholder="Número" >
                <input type="text" name="depart_envio" placeholder="Departamento (Opcional)">
                <input type="text" name="postal_envio" placeholder="Código Postal" >

                        <?php
                            if (isset($_GET['e'])) {
                                switch ($_GET['e']) {
                                    case '1':
                                        echo '<p class="error">Ha ocurrido un error, por favor intentalo de nuevo más tarde</p>';
                                        break;							
                                    case '2':
                                        echo '<p class="error">Por favor rellena todos los campos requeridos</p>';
                                        break;							
                                    case '3':
                                        echo '<p class="error">No has iniciado sesión. <a href="login">Haz click aquí para hacerlo</a></p>';
                                        break;							
                                    default:
                                        break;
                                }
                            }
                        ?>
                <button type="submit" name="dir_btn">Enviar</button>
                        
            </form>
        </div>
    </article>

    <script type="text/javascript" src="js/menu.js"></script>
</body>
</html>