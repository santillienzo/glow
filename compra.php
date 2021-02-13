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
    <link rel="stylesheet" href="style/compra.css">
    <link rel="icon" href="Images/ico.ico">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Alata&display=swap" rel="stylesheet">    
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300&display=swap" rel="stylesheet">
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>

    <title>COMPRA</title>
</head>
<body>
<?php require 'partials/nav.php' ?>

    <article>
        <div class="title"><h4>Detalle de tu compra</h4></div>
        <div class="datos_container" id="c">
            <div class="datos_compra_container">
                <h4 class="title-dato">Compra</h4>
                <div></div>
                <div class="datos_compra" id="compra">
                    
                </div>
            </div>
            <div class="datos_producto_container">
                <h4 class="title-dato">Producto</h4>
                <div  id="productos">
                    
                        
                    
                </div>
            </div>
        </div>
        <div class="info_pago">
            <div><h4>¿Como pagar?</h4></div>
            <div><p>1- Realizar una transferencia al siguiente cbu: <span>0000003100029034499536</span></p></div>
            <div><p>2- En la descripción de la transferencia ponga el id de la compra, su nombre y su apellido.</span></p></div>
            <div><p>3- Enviar el comprobante de pago a "glowStore@glow.com". (OBLIGATORIO)</span></p></div>
            <div><p>4- Una vez enviado tendrás que esperar la confirmación. En el caso de haber elegido retirar en un punto en común se te enviará un mensaje por WhatsApp al número de tu cuenta.</span></p></div>
        </div>
        <div class="btn-container">
            <button onclick="cancelarpago()">Cancelar compra</button>
        </div>
    </article>







<?php require 'partials/foot.php' ?>
<script type="text/javascript" src="js/menu.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
			$.ajax({
				url:'service/pedido/get_esperandopago.php',
				type:'POST',
				data:{},
				success:function(data){
                    console.log(data);
                    let compra=''; 
                    let producto='';
                    if(data.datos.length > 0){
                        for (var i = 0; i < data.datos.length; i++) {
                            compra +=
                            '<div class="dato"><h5>ID de tu compra</h5><p>'+data.datos[i].idcompra+'</p></div>'+
                            '<div class="dato"><h5>Tu código de usuario</h5><p>'+data.datos[i].cod_user+'</p></div>'+
                            '<div class="dato"><h5>Nombre</h5><p>'+data.datos[i].nom_usu+'</p></div>'+
                            '<div class="dato"><h5>Apellido</h5><p>'+data.datos[i].apellido_usu+'</p></div>'+
                            '<div class="dato"><h5>Teléfono</h5><p>'+data.datos[i].tel_usu+'</p></div>'+
                            '<div class="dato"><h5>Tu email</h5><p>'+data.datos[i].email_usu+'</p></div>'+
                            '<div class="dato"><h5>Entrega</h5><p>'+data.datos[i].id_entrega+'</p></div>'+
                            '<div class="dato"><h5>Cantidad de productos</h5><p>'+data.datos[i].cantidad_pro+'</p></div>'+
                            '<div class="dato"><h5>Precio final</h5><p>'+data.datos[i].precio_final+'</p></div>'+
                            '<div class="dato"><h5>Fecha de la compra</h5><p>'+data.datos[i].fecha_pedido+'</p></div>'+
                            '<div class="dato"><h5>Estado de la compra</h5><p>'+data.datos[i].estado_compra+'</p></div>';
                            
                        }
                        for (var i = 0; i < data.prod.length; i++) {
                            producto +=
                            '<div  class="datos_producto">'+
                                '<div><h5>Producto</h5><p>'+data.prod[i].nombre_pro+'</p></div>'+
                                '<div><h5>Cantidad</h5><p>'+data.prod[i].cantidad+'</p></div>'+
                            '</div>';
                        }

                        
					}
					document.getElementById("compra").innerHTML=compra;
					document.getElementById("productos").innerHTML=producto;
				},
				error:function(err){
					console.error(err);
				}
            });
        });

        function cancelarpago(){
            var respuesta =confirm("¿Estás seguro que deseas cancelar la compra?"); 
            if (respuesta == true) {
                window.location.href = "service/pedido/cancelarpago.php?id=<?php echo $_SESSION['cod_user']; ?>";
            }else{
                return false;
            }
        }
</script>

</body>
</html>