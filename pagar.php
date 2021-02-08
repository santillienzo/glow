<?php
include('service/_conexion.php');
$response=new stdClass();












//********LÓGICA DE MERCADO PAGO******** */


// SDK de Mercado Pago
require __DIR__ .  '/vendor/autoload.php';
require 'credenciales.php';

// Agrega credenciales
MercadoPago\SDK::setAccessToken('TEST-941278875145239-012500-bfacdb8ac42132e59cb986700641d616-706153247');

// Crea un objeto de preferencia
$preference = new MercadoPago\Preference();

$preference->back_urls = array(
    "success" => "https://glowstore.com.ar",
    "failure" => "https://glowstore.com.ar/errorpago.php?error=failure",
    "pending" => "https://glowstore.com.ar/errorpago.php?error=pending"
);
$preference->auto_return = "approved";

// Crea un ítem en la preferencia
$datos = array();
$i = 0;
$usuario = $_SESSION['cod_user'];
$sql="select *,ped.estado_ped estadoped from pedido ped
inner join productos pro
on ped.id_producto=pro.id_producto
inner join estados_ped on ped.estado_ped = estados_ped.estado_ped
where ped.estado_ped=2 and cod_user = $usuario";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)) { 
    $item = new MercadoPago\Item();
    $item->title = $row['nombre_producto'];
    $item->quantity = $row['cantidad'];
    $item->unit_price = $row['pre_pro'];
    $datos[]=$item;
    $i++;
}

$preference->items = $datos;
$preference->save();



    if ($i > 0) {
?>
    
    <div class="datos-container pedido">
                <p><span>Total:</span><span id="montoTotal"></span></p>
                <p><span>N° de teléfono:</span><?php echo $_SESSION['tel_usu']; ?></p>
                <?php
                if ($_SESSION['dir_usu'] != NULL) {
                    echo
                    '<p><span>Dirección:</span>'.$_SESSION['dir_usu'].'</p>';
                }else{
                    echo
                    '<p><span>Dirección:</span>No hay ninguna dirección asociada</p>';
                }
                ?>
    </div>
    <div class="btn-comprar-container">
        <div class="cancelar" title="Cancelar compra" onclick="cancelar_compra()"><i class="fas fa-times"></i></div>
        <script data-button-label="Comprar"
            src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js"
            data-preference-id="<?php echo $preference->id; ?>">
        </script>
    </div>
<?php
    }else{
?>
        <div class="aviso-container">
            <div class="aviso">Parece que no tienes pedidos pendientes. <br> :) <br> Volver a <a href="/">www.glow.com.ar</a></div>
        </div>
<?php
}