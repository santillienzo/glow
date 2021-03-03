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
    <link rel="stylesheet" href="style/rellenoCarrito.css">
    <link rel="icon" href="Images/ico.ico">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Alata&display=swap" rel="stylesheet">    
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

    <title>CARRITO</title>
</head>
<body>
    <?php require 'partials/nav.php' ?>
    
    <?php
    if (isset($_SESSION['cod_user'])) {
        echo
    '<article id="article">';
        require 'service/pedido/get_all.php';
    echo
    '</article>';
        
    }else{
        echo
        '<article>'.
        '<div class="error">'.
            '<h3>UPS! no has iniciado sesión, <a href="login.php"><span>haz click aquí para hacerlo</span>.</a></h3>'.
        '</div>'.
        '</article>';
    }
    ?>

    <?php require 'partials/foot.php' ?>


    <script type="text/javascript">
        function elegirEntrega(){
            window.location.href="service/pedido/confirm.php";
        }
    </script>

<script type="text/javascript" src="js/menu.js"></script>

</body>
</html>