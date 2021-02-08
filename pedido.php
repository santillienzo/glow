<?php
    session_start();
    error_reporting(0);
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
    <link rel="stylesheet" href="style/res-rellenoCarrito.css">
    <link rel="icon" href="Images/ico.ico">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Alata&display=swap" rel="stylesheet">    
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300&display=swap" rel="stylesheet">
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>

    <title>PEDIDO</title>
</head>
<body>
    <?php require 'partials/nav.php' ?>
    <article>
        <div class="relleno-container">
            <div class="relleno" id="space-list">
            
            </div>
            <?php
            require 'pagar.php';
            ?>
            
        </div>
    </article>

    <?php require 'partials/foot.php' ?>

    <script type="text/javascript">
        $(document).ready(function(){
			$.ajax({
				url:'service/pedido/get_por_pagar.php',
				type:'POST',
				data:{},
				success:function(data){
					console.log(data);
                    let html='';
                    let monto=0;
					for (var i = 0; i < data.datos.length; i++) {
                        html+=
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
                                    '<p><b>Estado:</b>'+data.datos[i].estadotext+'</p>'+
                                    '<p><b>Entrega:</b>'+data.datos[i].textEntrega+'</p>'+
                                '</div>' +
                            '</div>'+
                        '</div>';
                        if(data.datos[i].estado=='2'){
                            monto+=parseFloat(data.datos[i].pre_pro * data.datos[i].cantidad);
                        }
					}
					document.getElementById("space-list").innerHTML=html;
					document.getElementById("montoTotal").innerHTML=formato_precio(monto);
				},
				error:function(err){
					console.error(err);
				}
            });
        });

        function formato_precio(valor){
            return ' ARS $' + valor;
        }
    </script>

    <script type="text/javascript" src="js/menu.js"></script>
    <script type="text/javascript">
    function cancelar_compra(){
        var respuesta =confirm("¿Estás seguro que deseas cancelar el pedido?"); 
        if (respuesta == true) {
            window.location.href = "service/pedido/cancelar.php?id=<?php echo $_SESSION['cod_user']; ?>";
        }else{
            return false;
        }
    }

    </script>
</body>
</html>