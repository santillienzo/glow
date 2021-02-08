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
    <link rel="stylesheet" href="style/rellenoCarrito.css">
    <link rel="icon" href="Images/ico.ico">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Alata&display=swap" rel="stylesheet">    
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>

    <title>CARRITO</title>
</head>
<body>
    <?php require 'partials/nav.php' ?>
    
    <?php
    if (isset($_SESSION['cod_user'])) {
        echo
    '<article id="article">'.
        
    '</article>';
        
    }else{
        echo
        '<article>'.
        '<div class="error">'.
            '<h3>UPS! no has iniciado sesión, <a href="login.php"><span>haz click aquí para hacerlo</span>.</a></h3>'.
        '</div>'.
        '</article>';
    }
    ?>

    <?php require 'partials/foot.php' ?>


    <script type="text/javascript">
        $(document).ready(function(){
			$.ajax({
				url:'service/pedido/get_all.php',
				type:'POST',
				data:{},
				success:function(data){
                    console.log(data);
                    let article =''; //CONTROLAMOS QUE HAYAN ELEMENTOS A MOSTRAR O SI DAMOS UN AVISO.
                    let producto=''; //CON ESTRE MOSTRAMOS LOS PRODUCTOS
                    let monto=0; //PRECIO
                    if(data.datos.length > 0){
                        article =
                            '<div class="relleno-container">'+
                                '<div class="relleno" id="space-list">'+

                                '</div>'+
                                    '<div class="datos-container">'+
                                        '<p><span>Subtotal:</span><span id="montoTotal"></span></p>'+
                                    '</div>'+
                                '<div class="btn-comprar-container">'+
                                        '<button class="btn-comprar" onclick="elegirEntrega()">Continuar comprar</button>'+
                                '</div>'+
                            '</div>';
                        for (var i = 0; i < data.datos.length; i++) {
                            producto+=
                            '<div class="item-pedido">'+
                                '<div class="pedido-img">'+
                                    '<img src="Images/productos/'+ data.datos[i].rut_imagen+'">'+
                                '</div>'+
                                '<div class="pedido-detalle">'+
                                    '<div class="box-detalle">' +
                                        '<h3>'+data.datos[i].nombre_producto+'</h3>'+
                                        '<p><b>Precio:</b>'+formato_precio(data.datos[i].pre_pro)+'<p>'+
                                        '<p><b>Fecha:</b>'+data.datos[i].fecha_pedido+'</p>'+
                                        '<p><b>Cantidad:</b>'+data.datos[i].cantidad+'</p>'+
                                        '<a class="eliminar" href="service/pedido/eliminar.php?id='+data.datos[i].codped+'"><span>Eliminar</span></a>'+
                                    '</div>' +
                                '</div>'+
                            '</div>';
                            if(data.datos[i].estado=='1'){
                                monto+=parseFloat(data.datos[i].pre_pro * data.datos[i].cantidad);
                            }
                        }
					}else{
                        article =
                        '<div class="aviso-container">'+
                            '<div class="aviso">UPS! parece que no tienes nada en el carrito. Mirá algún producto y agregalo!</div>'+
                        '</div>';
                    }
					document.getElementById("article").innerHTML=article;
					document.getElementById("space-list").innerHTML=producto;
					document.getElementById("montoTotal").innerHTML=formato_precio(monto);
				},
				error:function(err){
					console.error(err);
				}
            });
        });

        function procesar_compra(){
                $.ajax({
				url:'service/pedido/confirm.php',
				type:'POST',
				data:{
                },
				success:function(data){
                    console.log(data);
                    if(data.state){
                        window.location.href="pedido.php"
                    }else{
                        alert(data.detail);
                    }
                    },
                    error:function(err){
                        console.error(err);
                    }
                });
        }


        function elegirEntrega(){
            window.location.href="entreg.php";
        }

        function formato_precio(valor){
    return 'ARS $' + valor;
}
    </script>

<script type="text/javascript" src="js/menu.js"></script>

</body>
</html>