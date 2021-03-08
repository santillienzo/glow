<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/catalogo.css">
    <link rel="stylesheet" href="style/object/nav.css">
    <link rel="stylesheet" href="style/object/copy.css">
    <link rel="icon" href="Images/ico.ico">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Alata&display=swap" rel="stylesheet">    
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300&display=swap" rel="stylesheet">

    <title>GLOW STORE | COMPLEMENTOS</title>
</head>
<body>
    <?php require 'partials/nav.php' ?>
    
    <section class="masVendido-container">
        <div class="masVendidoTítulo"><h2>COMPLEMENTOS</h2></div>
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
            require 'service/producto/get_all_comple.php';
        ?>
        </div>
    </section>

    <?php require 'partials/foot.php' ?>


    <script type="text/javascript" src="js/menu.js"></script>
</body>
</html>