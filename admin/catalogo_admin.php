<?php
session_start();
if (isset($_SESSION['cod_user'])) {
    $cod_admin = $_SESSION['cod_user'];
    if ($cod_admin == 1) {
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/normalize.css">
    <link rel="stylesheet" href="style/catalogo.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300&display=swap" rel="stylesheet">
    <link rel="icon" href="../Images/nota.ico">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    
    <title>ADMINISTRACIÓN</title>
</head>
<body>
    <div class="title-container">
        <h4>TABLAS: PRODUCTOS DE GLOW</h4>
    </div>

    <table class="tabla-productos tabla">
        <caption class="capt-productos">PRODUCTOS</caption>
        <thead>
            <tr class="table-atributos">
                <th scope="col">ID</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">DESCRIPCIÓN</th>
                <th scope="col">PRECIO</th>
                <th scope="col">ESTADO</th>
                <th scope="col">RUTA DE IMAGEN</th>
                <th scope="col">ALT</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php 
            require 'php/get_productos.php';
            ?>
        </tbody>
    </table>
    <form action="agregar/agregar_producto.php" method="POST" enctype="multipart/form-data">
    <div class="input_productos-container">
            <input type="text" placeholder="Nombre" name="nombre">
            <input type="text" placeholder="Descripción" name="descri">
            <input type="number" placeholder="Precio" name="precio">
            <input type="number" placeholder="Estado" name="estado">
            <div class="archivo-container">
                <p><i class="fas fa-images"></i></p>
                <input type="file" name="archivo" class="archivo">
            </div>
            <input type="text" placeholder="ALT" name="alt">
            <input type="submit" value="Agregar" name="btn-agr" class="btn-enviar btn-produc">
        </div>
    </form>

    <div class="container-tablas">
        <div class="container-tablas-ex">
            <table class="tabla-complementos tabla">
                <caption>COMPLEMENTOS</caption>
                <thead>
                    <tr class="table-atributos">
                        <th scope="col">COMPLEMENTO N°</th>
                        <th scope="col">PRODUCTO ID</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    require 'php/get_complementos.php';
                    ?>
                </tbody>
                
            </table>
            <div class="input-container">
                <form action="agregar/agregar_complemento.php" method="post" >
                    <input type="number" placeholder="Id" name="id">
                    <input type="submit" value="Agregar" name="btn-agr">
                </form>
            </div>
                
        </div>
            

        <div class="container-tablas-ex">
            <table class="table-prodMV tabla">
                <caption>MÁS VENDIDOS</caption>
                <thead>
                    <tr class="table-atributos">
                        <th scope="col">PRODUCTO MAS VENDIDO N°</th>
                        <th scope="col">PRODUCTO ID</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    require 'php/get_productosmv.php';
                    ?>
                </tbody>
            </table>
            <div class="input-container">
                <form action="agregar/agregar_productomv.php" method="post" >
                    <input type="number" placeholder="Id" name="id">
                    <input type="submit" value="Agregar" name="btn-agr">
                </form>
            </div>
        </div>
            
    

        <div class="container-tablas-ex">
            <table class="tabla-room tabla">
                <caption>DECORACIÓN</caption>
                <thead>
                    <tr class="table-atributos">
                        <th scope="col">DECORACIÓN N°</th>
                        <th scope="col">PRODUCTO ID</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    require 'php/get_room.php';
                    ?>
                </tbody>
                
            </table>
            <div class="input-container">
                <form action="agregar/agregar_roomdecor.php" method="post" >
                    <input type="number" placeholder="Id" name="id">
                    <input type="submit" value="Agregar" name="btn-agr">
                </form>
            </div>

        </div>
            

    </div>
        
    <a href="admin" class="back"><span>ATRÁS</span></a>

    
</body>
</html>

<?php

    }
}