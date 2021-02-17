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
    <link rel="stylesheet" href="style/pagado.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">

    <title>ADMINISTRACIÓN</title>
</head>
<body>
    <header>
        <div class="title-container">
            <a href="administrarPedidos.php">INICIO PANEL</a>
            <h4>TABLA DE PAQUETES PAGADOS SIN ENTREGAR</h4>
            <a href="pagados_productos.php"><span>PRODUCTOS</span><i class="fas fa-arrow-right"></i></a>
        </div>
    </header>
    
    

    <table class="tabla">
        <caption>PAQUETES PAGADOS SIN ENTREGAR</caption>
        <thead>
            <tr>
                <th scope="col">ID COMPRA</th>
                <th scope="col">USUARIO N°</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">APELLIDO</th>
                <th scope="col">TELÉFONO</th>
                <th scope="col">EMAIL</th>
                <th scope="col">ENTREGA</th>
                <th scope="col">CANTIDAD OBJETOS</th>
                <th scope="col">PRECIO</th>
                <th scope="col">FECHA</th>
                <th scope="col">PROVINCIA</th>
                <th scope="col">CIUDAD</th>
                <th scope="col">BARRIO</th>
                <th scope="col">CALLE/MANZANA</th>
                <th scope="col">NUMERO</th>
                <th scope="col">DEPARTAMENTO</th>
                <th scope="col">CÓDIGO POSTAL</th>
                <th scope="col">ESTADO</th>
                <th scope="col">CONDICIÓN</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php 
            require 'php/pack_pagado.php';
            ?>
        </tbody>
    </table>
    

</body>
</html>

<?php

    }
}