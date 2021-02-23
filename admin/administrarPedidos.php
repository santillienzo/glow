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
    <link rel="stylesheet" href="style/administrarPedidos.css">
    <link rel="stylesheet" href="../style/normalize.css">
    <link rel="icon" href="../Images/nota.ico">
    <title>ADMINISTRACION</title>
</head>
<body>
    <nav>
    <p><a href="admin.php">Inicio</a></p>
    </nav>
    <div class="container-container">
        <div class="container">
            <div class="card" onclick="uno()">
                <div class="face face1">
                    <div class="content">
                        <h2>Esperando pago</h2> <p>En esta pestaña verás todos los pedidos que aún no tienen un comprobante de pago correspondiente. <br> Una vez lo obtengas, tienes que actualizar el paquete y sus productos a fases 2(paquete) y 4(productos)</p>
                    </div>
                </div>
                <div class="face face2">
                    <h2>Comprado <br> Esperando pago</h2>
                </div>
            </div>
            <div class="card" onclick="dos()">
                <div class="face face1"> 
                    <div class="content">
                        <h2>Sin entregar</h2> <p>Estos son los paquetes que aún no entregas, una vez lo hagas deberas actualizar los pedidos a fase 3(paquetes) y fase 5(productos) para enviarlos al historial.</p>
                    </div>
                </div>
                <div class="face face2">
                    <h2>Comprado <br> Pagado <br> Sin entregar</h2>
                </div>
            </div>
            <div class="card" onclick="tres()">
                <div class="face face1">
                    <div class="content">
                        <h2>Historial</h2> <p>Aquí verás todos los productos que ya han sido entregados a tus clientes. Aquí seguramente no debas mover nada, salvo que te hayas equivocado en algo.</p>
                    </div>
                </div>
                <div class="face face2">
                    <h2>Historial</h2>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<script type="text/javascript">
    function uno(){
        window.location.href="pack_admin.php";
    }
    function dos(){
        window.location.href="pagado.php";
    }
    function tres(){
        window.location.href="historial.php";
    }
</script>

<?php
    }
}