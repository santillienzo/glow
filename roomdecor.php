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
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300&display=swap" rel="stylesheet">
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>

    <title>GLOW STORE | ROOM DECOR</title>
</head>
<body>
    <?php require 'partials/nav.php' ?>
    
    <section class="masVendido-container">
        <div class="masVendidoTítulo"><h2>ROOM DECOR</h2></div>
        <div class="objetosMasVendidos-container" id="space-list">
        <?php
            require 'service/producto/get_all_room.php';
        ?>
        </div>
    </section>

    <?php require 'partials/foot.php' ?>


    <script type="text/javascript" src="js/menu.js"></script>

</body>
</html>