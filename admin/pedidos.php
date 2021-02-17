<?php
session_start();
if (isset($_SESSION['cod_user'])) {
    $cod_admin = $_SESSION['cod_user'];
    if ($cod_admin == 1) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../Images/nota.ico">
    <link rel="stylesheet" href="../style/normalize.css">
    <link rel="stylesheet" href="style/pedido_2.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">

    <title>ADMINISTRACIÓN</title>
</head>
<body>
    <header>
        <div class="title-container">
            <a href="administrarPedidos.php">INICIO PANEL</a>
            <h4>PRODUCTOS</h4>
            <a href="pack_admin.php"><span>TABLA DE PAQUETES</span><i class="fas fa-arrow-right"></i></a>
        </div>
    </header>
    
    

    <table class="tabla">
        <caption>OBJETOS</caption>
        <thead>
            <tr>
                <th scope="col">ID PEDIDO</th>
                <th scope="col">USUARIO N°</th>
                <th scope="col">PRODUCTO</th>
                <th scope="col">CANTIDAD</th>
                <th scope="col">ESTADO</th>
                <th scope="col">CONDICIÓN</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php 
            require 'php/pedi_usu.php';
            ?>
        </tbody>
    </table>
    

</body>
</html>

<?php
    }
}