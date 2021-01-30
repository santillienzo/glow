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
                        <li><i class="fab fa-whatsapp"></i><p>+54 9 263 475-9547</p></li>
                        <li><i class="fas fa-phone"></i><p>4425129</p></li>
                        <li><i class="far fa-envelope"></i><p>emaildeglow@gmail.com</p></li>
                        <li><i class="fas fa-map-marker-alt"></i><p>San Martín - Mendoza | Barrio San Pedro M11 C6</p></li>
                    </div>
                </div>
            </div>
        </section>
        <section class="enviar_email">
            <div class="pregunta">
                <h4>¿Querés enviarno un email?</h4>
                <p>Facil, rellena tus datos aquí debajo, envialo y listo!</p>
            </div>
            <form class="campos_email">
                <input type="text" id="campo_nombre" placeholder="Ingrese su nombre">
                <input type="email" id="campo_email" placeholder="Ingrese su email">
                <input type="text" id="campo_telefono" placeholder="Escriba su número telefónico">
                <textarea id="campo_mensaje" placeholder="Escriba su mensaje"></textarea>
                <input type="submit" id="btn_enviar">
            </for>
        </section>
    </article>

    <?php require 'partials/foot.php' ?>
    

    <script type="text/javascript" src="js/menu.js"></script>
</body>
</html>