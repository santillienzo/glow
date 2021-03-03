<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/FAQ.css">
    <link rel="stylesheet" href="style/object/nav.css">
    <link rel="stylesheet" href="style/object/copy.css">
    <link rel="icon" href="Images/ico.ico">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Alata&display=swap" rel="stylesheet">    
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300&display=swap" rel="stylesheet">

    <title>FAQ</title>
</head>
<body>
    
    <?php require 'partials/nav.php' ?>


    <article class="article">
        <div class="title">
            <h3>FAQ</h3>
            <h4>FREQUENTLY ASKED QUESTIONS</h4>
            <h5>(Preguntas más frecuentes)</h5>
        </div>
        <section class="faq">
            <div class="preguntas-container">
                <div class="q1_container q_container">
                    <h4>¿Quíenes somos?</h4>
                    <p>Somos GLOW. Un pequeño negocio ubicado en San Martín - Mendoza que intenta crecer a pesar de las complicaciones que puedan llegar a surgir.</p>
                </div>
                <div class="q3_container q_container">
                    <h4>¿Cómo comprar?</h4>
                    <p>Solo tienes que seleccionar el producto que deseas comprar haciendo click sobre el. Luego vas a seleccionar la cantidad que desees y lo agregarás al carrito...</p>
                </div>
                <div class="q3_container q_container">
                    <h4>¿Qué sucede si mi producto me llega con fallas? ¿Cómo lo devuelvo?</h4>
                    <p>Si tienes algún inconveniente con la entrega de los productos solo debes enviarnos un e-mail desde la sección <a href="contacto.php">Contacto</a>, o un mensaje vía WhatsApps al número que se encuentra en el pié de página. Te responderemos lo más rápido posible</p>
                </div>
                <div class="q3_container q_container">
                    <h4>¿Cuánto tardan en verificar mi compra?</h4>
                    <p>Tardaremos menos de 1 día en verificar tu compra y comprobante. Ten en cuenta que a veces tardan en llegar los e-mails y los pagos.</p>
                    <p>Tambien sepa que nosotros verificamos los correos y pagos de 8:00hs a 21:00hs, por lo que si usted realiza una compra a las 2:00hs no se le comprobará el pago hasta el otro día.</p>
                </div>
            </div>
            
        </section>
    </article>

    <?php require 'partials/foot.php' ?>



    <script type="text/javascript" src="js/menu.js"></script>
</body>
</html>