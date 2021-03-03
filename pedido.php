<?php
    session_start();
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
    <link rel="stylesheet" href="style/rellenoCarrito.css">
    <link rel="stylesheet" href="style/res-rellenoCarrito.css">
    <link rel="icon" href="Images/ico.ico">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Alata&display=swap" rel="stylesheet">    
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300&display=swap" rel="stylesheet">

    <title>PEDIDO</title>
</head>
<body>
    <?php require 'partials/nav.php' ?>
    <article id="article">
        <?php require 'service/pedido/get_por_pagar.php' ?>
    </article>

    <?php require 'partials/foot.php' ?>

    <script type="text/javascript" src="js/menu.js"></script>
    <script type="text/javascript">
    function cancelar_compra(){
        var respuesta =confirm("¿Estás seguro que deseas cancelar el pedido?"); 
        if (respuesta == true) {
            window.location.href = "service/pedido/cancelar.php?id=<?php echo $_SESSION['cod_user']; ?>";
        }else{
            return false;
        }
    }

    function confirm_compra(){
        var respuesta =confirm("¿Estás seguro que deseas confirmar el pedido?"); 
        if (respuesta == true) {
            window.location.href = "entrega";
        }else{
            return false;
        }
    }

    </script>
</body>
</html>