<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="relojes, aros, complementos, room decor, decoración, glow, Mendoza">
    <meta name="description" content="GLOW STORE es una tienda de complementos y room decor ubicada en Mendoza.">
    <meta name="application-name" content="GLOW STORE - Tienda online">
    <meta name="copyright" content="Glow Store - 2021 ©">
    <meta name="author" content="Victoria Malovini">
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/index.css">
    <link rel="stylesheet" href="style/object/copy.css">
    <link rel="stylesheet" href="style/object/nav.css">
    <link rel="icon" href="Images/ico.ico">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Alata&display=swap" rel="stylesheet">    
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300&display=swap" rel="stylesheet">
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>


    <title>GLOW STORE | Tienda de complementos y room decor en Mendoza</title>
</head>
<body>
    <?php require 'partials/nav.php' ?>
    
    
    <article class="article">
        <div class="slider">
            <ul class="lista-slider">
                <li class="elemento-slider">
                    <img src="Images/imagenesSlider/glow.jpg" alt="glowstore glow tienda room decor complementos handmade">
                </li>
                <li class="elemento-slider">
                    <img src="Images/imagenesSlider/love.jpg" alt="glowstore glow tienda room decor complementos handmade">
                </li>
                <li class="elemento-slider">
                    <img src="Images/imagenesSlider/sweet.jpg" alt="glowstore glow tienda room decor complementos handmade">
                </li>
            </ul>
            <ul class="lista-slider-responsive">
                <li class="elemento-slider">
                    <img src="Images/imagenesSlider/glow.jpg" alt="">
                </li>
                <li class="elemento-slider">
                    <img src="Images/imagenesSlider/loveResponsive.jpg" alt="">
                </li>
                <li class="elemento-slider">
                    <img src="Images/imagenesSlider/sweetResponsive.jpg" alt="">
                </li>
            </ul>
        </div>
        <section class="masVendido-container">
            <div class="masVendidoTítulo"><h2>MÁS VENDIDO</h2></div>
            <div class="objetosMasVendidos-container" id="space-list">
                <div class="MVcard">
                    <a href="relojes">
                        <div class="imgMV-container">
                            <img src="Images/productos/153445060_456549769032192_8857576872071765558_n.jpg" alt="relojes glow catalogo">
                        </div>
                        <div class="tituloMV-container"><h3>Relojes</h3></div>
                        <div class="descripcionMV-container"><p>Haz click aquí y seguí las intrucciones para poder encargar tu reloj!</p></div>
                        <div class="precioMV-container"><p>Precios varios</p></div>
                    </a>
                </div>
                <?php
                    require 'service/producto/get_all_productsMV.php';
                ?>
            </div>
        </section>

        <section class="accesorios-container">
            <div class="accesoriosTitulo"><h2>CATÁLOGO</h2></div>
            <div class="cardAccesorios-container">
                <div class="accCard complementoCard">
                    <a href="complementos.php">
                        <div class="titleAcc-container">
                            <p class="accTitle">COMPLEMENTOS</p>
                        </div>
                    </a>
                </div>

                <div class="accCard roomCard">
                    <a href="room-decor.php">
                        <div class="titleAcc-container">
                            <p class="accTitle">ROOM DECOR</p>
                        </div>
                    </a>
                </div>
            </div>
        </section>
    </article>
    
    <?php require 'partials/foot.php' ?>
    
    
    
    <script type="text/javascript" src="js/menu.js"></script>
</body>
</html>