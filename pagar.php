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
    "success" => "https://glowstore.com.ar/service/pedido/confirm.php",
    "failure" => "https://glowstore.com.ar/errorpago.php?error=failure",
    "pending" => "https://glowstore.com.ar/errorpago.php?error=pending"
);
$preference->auto_return = "approved";

// Crea un ítem en la preferencia
$datos = array();
$usuario = $_SESSION['cod_user'];
$sql="select *,ped.estado_ped estadoped from pedido ped
inner join productos pro
on ped.id_producto=pro.id_producto
inner join estados_ped on ped.estado_ped = estados_ped.estado_ped
where ped.estado_ped=1 and cod_user = $usuario";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)) { 
    $item = new MercadoPago\Item();
    $item->title = $row['nombre_producto'];
    $item->quantity = $row['cantidad'];
    $item->unit_price = $row['pre_pro'];
    $datos[]=$item;                                                        //cambiar esto por los productos de mi carrito
}

$preference->items = $datos;
$preference->save();




?>

    <div class="btn-comprar-container">
        <script data-button-label="Comprar"
            src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js"
            data-preference-id="<?php echo $preference->id; ?>">
        </script>
    </div>
