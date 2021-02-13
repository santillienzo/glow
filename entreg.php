<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/object/nav.css">
    <link rel="stylesheet" href="style/object/copy.css">
    <link rel="stylesheet" href="style/entreg.css">
    <link rel="icon" href="Images/ico.ico">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Alata&display=swap" rel="stylesheet">    
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300&display=swap" rel="stylesheet">
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>

    <title>GLOW STORE | ENTREGA</title>
</head>
<body>
    <?php require 'partials/nav.php' ?>

    <article>

        <div class="opciones-container">
            <div class="title-container">
                <h3>¿Donde deseas retirar el pedido?</h3>
            </div>
            <form action="service/pedido/confirm.php" method="POST">
                <div class="option">
                    <input type="radio" name="optio-radio" value="domicilio" id="option1">
                    <label for="option1">
                        <div class="text-container">
                            <h3>Domicilio</h3>
                            <?php
                                if($_SESSION['dir_usu'] != NULL){
                                    echo
                                    '<a href="direccion.php" title="Cambiar"><span>Dirección:</span><span class="cont">'.$_SESSION['dir_usu'].'</span></a>';
                                }else{
                                    echo
                                    '<a href="direccion.php" title="Agregar dirección"><span>Dirección:</span><span class="cont">No hay ninguna dirección asociada.</span></a>';
                                }
                            ?>
                        </div>
                    </label>
                </div>
                <div class="option">
                    <input type="radio" name="optio-radio" value="local" id="option2">
                    <label for="option2"><div class="text-container">
                            <h3>Por local</h3>
                            <a href="https://www.google.com/search?q=-33.073006299995%2C+-68.49099486276725&oq=-33.073006299995%2C+-68.49099486276725&aqs=chrome..69i57.1138j0j4&sourceid=chrome&ie=UTF-8" target="_BLANK" title="Ver las coordenadas del local.">Mendoza| San Martín| Barrio San Pedro| Manzana 20| Casa 27</a>
                        </div>
                    </label>
                </div>
                <div class="option">
                    <input type="radio" name="optio-radio" value="punto_comun" id="option3">
                    <label for="option3">
                        <div class="text-container">
                            <h3>Punto en común</h3>
                            <p>Para esto: Comunicarte por WhatsApp y coordinar la entrega del producto. <a href="https://wa.me/542634759547" target="_BLANK">Haz click aquí</a> para redirigirte al número, o bien hablale al WhatsApp de la página que se encuentra en la sección 'Contactos'.</p>
                        </div>
                    </label>
                </div>
                <div class="btn-comprar-container">
                        <button class="btn-comprar">Continuar comprar</button>
                </div>
            </form>
            <?php
            if (isset($_GET['e'])) {
						switch ($_GET['e']) {
							case '1':
								echo '<p class="e">No tienes ninguna dirección a la cual enviar. Por favor agrega una.</p>';
								break;							
							case '2':
								echo '<p class="e">Por favor selecciona una opcion de entrega.</p>';
								break;							
							case '3':
								echo '<p class="e">Ya tienes un pedido pendiente. Si quieres agregar más productos completa tu <a href="pedido.php" title="Continuar pedido">pedido</a> o cancelalo.</p>';
								break;							
							default:
								break;
						}
                    }
            ?>
        </div>
        
    </article>


    <script type="text/javascript" src="js/menu.js"></script>
    
</body>
</html>