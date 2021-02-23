<?php
    session_start();
    
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/contacto.css">
    <link rel="stylesheet" href="style/object/nav.css">
    <link rel="stylesheet" href="style/object/copy.css">
    <link rel="icon" href="Images/ico.ico">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Alata&display=swap" rel="stylesheet">    
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300&display=swap" rel="stylesheet">
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
    
    <title>CONTACTO</title>
</head>
<body>
    
    <?php require 'partials/nav.php' ?>
    
    
    <article class="article">
    <?php
            if (isset($_GET['congrat'])) {
                switch ($_GET['congrat']) {
                    case '1':
                        echo 
                        '<div class="mensaje-exito" id="mensaje_email">'.
                            '<div class="mensaje-container">'.
                                '<i class="fas fa-check-circle"></i>'.
                                '<p>Mensaje enviado exitosamente!</p>'.
                            '</div>'.
                        '</div>';
                        break;							
                        default:
                        break;
                    }
                }
                ?>

        
        <section class="contact-container">
            <div class="contact">
                <div class="title">
                    <h3>Contacto</h3>
                </div>
                <div class="caja_contacto_container">
                    <div class="imagen_contacto_container">
                        <img class="imagen_contact" src="Images/iconos/formulario-de-contacto.png" alt="contacto" title="Contacto">
                    </div>
                    <div class="contacto_cont">
                        <li><i class="fab fa-whatsapp"></i><br><p>+54 9 263 475-9547</p></li>
                        <li><i class="fas fa-phone"></i><br><p>4425129</p></li>
                        <li><i class="far fa-envelope"></i><p>glowstorevm@gmail.com</p></li>
                        <li><i class="fas fa-map-marker-alt"></i><p>San Martín - Mendoza | Barrio San Pedro M11 C6</p></li>
                    </div>
                </div>
            </div>
        </section>
        <section class="enviar_email">
            <div class="pregunta">
                <h4>¿Querés enviarnos un e-mail?</h4>
                <p>Fácil, rellená tus datos aquí debajo, envialo y listo!</p>
            </div>
            <form class="campos_email" action="service/correo/correo.php" method="POST">
                <input type="text" id="campo_nombre" placeholder="Ingrese su nombre y apellido" name="nombre">
                <input type="text" id="campo_asunto" placeholder="Ingrese un asunto" name="asunto">
                <input type="email" id="campo_email" placeholder="Ingrese su email" name="email">
                <input type="text" id="campo_telefono" placeholder="Escriba su número telefónico" name="phone">
                <textarea id="campo_mensaje" placeholder="Escriba su mensaje" name="mensaje"></textarea>
                <input type="submit" id="btn_enviar" name="btn">
                <?php
                if (isset($_GET['e'])) {
                        switch ($_GET['e']) {
                            case '1':
                                echo '<p class="error">Rellena todos los campos</p>';break;
                            case '2':
                                echo '<p class="error">No es un número de teléfono válido</p>';break;								
                            case '3':
                                echo '<p class="error">Email no válido</p>';break;								
                            default:break;
                            }
                        }
                        ?>
            </form>
        </section>
    </article>
    
    <?php require 'partials/foot.php' ?>
    

    <script type="text/javascript" src="js/menu.js"></script>
    <script type="text/javascript" src="js/modales.js"></script>
</body>
</html>