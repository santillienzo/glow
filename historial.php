<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/historial.css">
    <link rel="stylesheet" href="style/object/nav.css">
    <link rel="stylesheet" href="style/object/copy.css">
    <link rel="icon" href="Images/ico.ico">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Alata&display=swap" rel="stylesheet">    
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300&display=swap" rel="stylesheet">
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>

    <title>HISTORIAL</title>
</head>
<body>
<?php require 'partials/nav.php' ?>



<article>
    <section>
        <div class="title"><h4>HISTORIAL</h4></div>
        <div id="historial">
            
        </div>
        
    </section>
    <section>
        <div class="title"><h4>PENDIENTE DE ENTREGA</h4></div>
        <div id="pendiente">
            
        </div>
    </section>
</article>






<?php require 'partials/foot.php' ?>
<script type="text/javascript" src="js/menu.js"></script>
<script type="text/javascript">
        $(document).ready(function(){
			$.ajax({
				url:'service/pedido/get_historial.php',
				type:'POST',
				data:{},
				success:function(data){
                    console.log(data);
                    let historial_=''; 
                    let pendiente_='';
                    if (data.historial.length > 0) {
                        for (var i = 0; i < data.historial.length; i++) {
                            historial_ +=
                            '<div class="card-container">'+
                                '<div class="img-container"><img src="Images/productos/'+data.historial[i].rut_imagen+'"></div>'+
                                '<div class="info-pro-container">'+
                                    '<div class="info-pro">'+
                                        '<div class="nombre-pro"><p>'+data.historial[i].nombre_pro+'</p></div>'+
                                        '<div class="canti-pro"><p>X '+data.historial[i].cantidad+' unidad/es</p></div>'+
                                        '<div class="entrega-pro"><p>Comprado el '+data.historial[i].fecha_pedido+'</p></div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>';
                        }
                    }else{
                        historial_ +=
                        '<div class="error">Parece que aquí no hay nada, ve y compra algún producto en GLOW!</div>'
                    }
                            
                    if (data.pend.length > 0) {
                        for (var i = 0; i < data.pend.length; i++) {
                            pendiente_ +=
                            '<div class="card-container">'+
                                '<div class="img-container"><img src="Images/productos/'+data.pend[i].rut_imagen+'"></div>'+
                                '<div class="info-pro-container">'+
                                    '<div class="info-pro">'+
                                        '<div class="nombre-pro"><p>'+data.pend[i].nombre_pro+'</p></div>'+
                                        '<div class="canti-pro"><p>X '+data.pend[i].cantidad+' unidad/es</p></div>'+
                                        '<div class="entrega-pro"><p>Comprado el '+data.pend[i].fecha_pedido+'</p></div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>';
                        }
                    }else{
                        pendiente_ +=
                        '<div class="error">Parece que aquí no hay nada, ve y encarga algún producto en GLOW!</div>'
                    }

					document.getElementById("historial").innerHTML=historial_;
					document.getElementById("pendiente").innerHTML=pendiente_;
				},
				error:function(err){
					console.error(err);
				}
            });
        });
</script>

</body>
</html>