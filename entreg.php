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
    <link rel="stylesheet" href="style/entreg.css">
    <link rel="icon" href="Images/ico.ico">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Alata&display=swap" rel="stylesheet">    
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300&display=swap" rel="stylesheet">
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>

    <title>GLOW STORE | ENTREGA</title>
</head>
<body>
    <?php require 'partials/nav.php' ?>

    <article>

        <div class="opciones-container">
            <div class="title-container">
                <h3>¿Dónde deseas retirar el pedido?</h3>
                <p>Seleccionar una opción</p>
            </div>
            <form action="service/pedido/confirm_compra.php" method="POST">
                <div class="option-cont">
                    <div class="option">
                        <input type="radio" name="optio-radio" value="domicilio" id="option1">
                        <label for="option1">
                            <div class="text-container">
                                <h3>Domicilio</h3>
                                <p>El envío a domicilio tiene un valor de ARS$80 a cualquier parte de San martín-Mendoza.</p>
                            </div>
                        </label>
                    </div>
                    <div class="option">
                        <input type="radio" name="optio-radio" value="local" id="option2">
                        <label for="option2"><div class="text-container">
                                <h3>Por local</h3>
                                <a href="https://www.google.com/search?q=-33.073006299995%2C+-68.49099486276725&oq=-33.073006299995%2C+-68.49099486276725&aqs=chrome..69i57.1138j0j4&sourceid=chrome&ie=UTF-8" target="_BLANK" title="Ver las coordenadas del local.">Mendoza| San Martín| Barrio San Pedro| Manzana 11| Casa 6</a>
                            </div>
                        </label>
                    </div>
                    <div class="option">
                        <input type="radio" name="optio-radio" value="punto_comun" id="option3">
                        <label for="option3">
                            <div class="text-container">
                                <h3>Punto en común</h3>
                                <p>Se te enviará un mensaje por WhatsApp (o email) para coordinar un punto en común. Tiene un valor de ARS $50. <span>Solo válido para San Martín-Mendoza</span> </p>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="title-container">
                    <h3>¿A qué dirección enviar?</h3>
                </div>
                <div class="inputs">
                    <p>*Solo rellenar en caso de seleccionar envío a domicilio. Si elegiste cualquier otra opción apretá en 'continuar compra'</p>
                    <input type="text" name="prov_envio" placeholder="Provincia">
                    <input type="text" name="ciudad_envio" placeholder="Ciudad" >
                    <input type="text" name="barrio_envio" placeholder="Barrio (Opcional)">
                    <input type="text" name="calle_envio" placeholder="Calle/Cuadra/Manzana" >
                    <input type="text" name="numero_envio" placeholder="Número" >
                    <input type="text" name="depart_envio" placeholder="Departamento (Opcional)">
                    <input type="text" name="postal_envio" placeholder="Código Postal" >
                </div>
                <div class="entrega_option">
                    <div class="entrega_option-container">
                        <p>Si <span>NO</span> eres de San Martín - Junín o Rivadavia escoger:</p>
                        <input type="radio" name="entrega" id="entreg_casa" value="casa">
                        <label for="entreg_casa">Entrega en: Tu casa</label><br>
                        <input type="radio" name="entrega" id="entreg_sucu" value="sucursal">
                        <label for="entreg_sucu">Entrega en: Sucursal más cercana</label>
                    </div>
                </div>
                <div class="btn-comprar-container">
                        <button class="btn-comprar">Continuar comprar</button>
                </div>
            </form>
            <?php
            if (isset($_GET['e'])) {
						switch ($_GET['e']) {
							case '1':
								echo '<p class="e">Completa los campos de dirección.</p>';
								break;							
							case '2':
								echo '<p class="e">Por favor selecciona una opcion de entrega.</p>';
								break;							
							case '3':
								echo '<p class="e">Ya tienes un pedido pendiente. Si quieres agregar más productos completa tu <a href="compra.php" title="Continuar pedido">pedido</a> o cancelalo.</p>';
								break;							
							case '4':
								echo '<p class="e">No tenemos envios hacia tu departamento. Cualquier consulta hablanos por WhatsApp (Puede haber un error en el código postal, intentalo de nuevo o escribenos).</p>';
								break;							
							case '5':
								echo '<p class="e">El envío... ¿es a domicilio a una sucursal Andreani? Selecciona una opción.</p>';
								break;							
							default:
								break;
						}
                    }
            ?>
        </div>
        
    </article>


    <script type="text/javascript" src="js/menu.js"></script>
    
</body>
</html>