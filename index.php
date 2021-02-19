<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/index.css">
    <link rel="stylesheet" href="style/object/copy.css">
    <link rel="stylesheet" href="style/object/nav.css">
    <link rel="icon" href="Images/ico.ico">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Alata&display=swap" rel="stylesheet">    
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300&display=swap" rel="stylesheet">
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>

    <title>GLOW STORE | INICIO</title>
</head>
<body>
    <?php require 'partials/nav.php' ?>
    
    
    <article class="article">
        <div class="slider">
            <ul class="lista-slider">
                <li class="elemento-slider">
                    <img src="Images/imagenesSlider/glow.jpg" alt="">
                </li>
                <li class="elemento-slider">
                    <img src="Images/imagenesSlider/love.jpg" alt="">
                </li>
                <li class="elemento-slider">
                    <img src="Images/imagenesSlider/sweet.jpg" alt="">
                </li>
            </ul>
            <ul class="lista-slider-responsive">
                <li class="elemento-slider">
                    <img src="Images/imagenesSlider/glow.jpg" alt="">
                </li>
                <li class="elemento-slider">
                    <img src="Images/imagenesSlider/loveResponsive.jpg" alt="">
                </li>
                <li class="elemento-slider">
                    <img src="Images/imagenesSlider/sweetResponsive.jpg" alt="">
                </li>
            </ul>
        </div>
        <section class="masVendido-container">
            <div class="masVendidoTítulo"><h2>MÁS VENDIDO</h2></div>
            <div class="objetosMasVendidos-container" id="space-list">
                
                
            </div>
        </section>

        <section class="accesorios-container">
            <div class="accesoriosTitulo"><h2>CATÁLOGO</h2></div>
            <div class="cardAccesorios-container">
                <div class="accCard complementoCard">
                    <a href="complementos.php">
                        <div class="titleAcc-container">
                            <p class="accTitle">COMPLEMENTOS</p>
                        </div>
                    </a>
                </div>

                <div class="accCard roomCard">
                    <a href="roomdecor.php">
                        <div class="titleAcc-container">
                            <p class="accTitle">ROOM DECOR</p>
                        </div>
                    </a>
                </div>
            </div>
        </section>
    </article>
    
    <?php require 'partials/foot.php' ?>
    
    
    <script type="text/javascript">
        $(document).ready(function(){
        $.ajax({
        url:'service/producto/get_all_productsMV.php',
        type:'POST',
        data:{},    
        success:function(data){
            console.log(data);
            let html='';
            for(var i = 0; i<data.datos.length; i++){
                html+=
                '<div class="MVcard">'+
                    '<a href="producto.php?p='+data.datos[i].id_producto+'">'+
                        '<div class="imgMV-container">'+
                            '<img src="Images/productos/'+ data.datos[i].rut_imagen+'" alt="">'+
                        '</div>'+
                        '<div class="tituloMV-container"><h3>'+data.datos[i].nombre_producto+'</h3></div>'+
                        '<div class="descripcionMV-container"><p>'+data.datos[i].des_producto+'</p></div>'+
                        '<div class="precioMV-container"><p>'+formato_precio(data.datos[i].pre_pro)+'</p></div>'+
                    '</a>'+
                '</div>';
            }
            document.getElementById("space-list").innerHTML= html;
        },
        error:function(err){
            console.error(err);
        }
    });
});

//Le doy formato al precio
function formato_precio(valor){
    return 'ARS $' + valor;
}
    </script>
    <script type="text/javascript" src="js/menu.js"></script>
</body>
</html>