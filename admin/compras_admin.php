<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../Images/nota.ico">
    <link rel="stylesheet" href="../style/normalize.css">
    <link rel="stylesheet" href="style/pedido.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">

    <title>ADMINISTRACIÓN</title>
</head>
<body>
    <div class="title-container">
        <h4><a href="carrito_admin.php">EN CARRITO</a></h4>
        <h4>COMPRAS</h4>
        <h4><a href="pedi_admin.php">TABLAS PEDIDOS GLOW</a></h4>
    </div>
    
    <table class="tabla">
        <caption>PEDIDOS</caption>
        <thead>
            <tr>
                <th scope="col">ID PEDIDO</th>
                <th scope="col">USUARIO N°</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">APELLIDO</th>
                <th scope="col">PRODUCTO N°</th>
                <th scope="col">PRODUCTO</th>
                <th scope="col">CANTIDAD</th>
                <th scope="col">FECHA</th>
                <th scope="col">ESTADO</th>
                <th scope="col">DIRECCIÓN</th>
                <th scope="col">TELÉFONO</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php 
            require 'php/compras_usu.php';
            ?>
        </tbody>
    </table>
    <div class="back-cont">
        <a href="admin.php" class="back"><span>ATRÁS</span></a>
    </div>

</body>
</html>