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
    <link rel="stylesheet" href="style/admin.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <title>ADMINISTRACIÓN</title>
</head>
<body>

    <div class="title-container">
        <h4>PANEL DE CONTROL DE GLOW</h4>
    </div>

    <div class="carta-container">
        <a href="user_admin">
            <div class="carta uno">
                <p>Usuarios</p>
            </div>
        </a>
        
        <a href="catalogo_admin">
            <div class="carta dos">
                <p>Catálogo</p>
            </div>
        </a>        
        <a href="administrarPedidos">
            <div class="carta tres">
                <p>Pedidos/Compras</p>
            </div>
        </a>
    </div>
    <a href="../" class="back"><span>INICIO</span></a>
</body>
</html>

<?php
    }
}
?>