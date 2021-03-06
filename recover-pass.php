<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/object/copy.css">
    <link rel="stylesheet" href="style/object/nav.css">
    <link rel="stylesheet" href="style/recover_pass.css">
    <link rel="icon" href="Images/ico.ico">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Alata&display=swap" rel="stylesheet">    
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300&display=swap" rel="stylesheet">
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>

    <title>Recuperar contraseña</title>
</head>
<body>

    <?php
		if (isset($_GET['congrat'])) {
			switch ($_GET['congrat']) {
				case '1':
					?>
					<div class="mensaje-exito" id="mensaje_email">
						<div class="mensaje-container">
							<i class="fas fa-check-circle"></i>
							<p>Email enviado correctamente!</p>
						</div>
					</div>

					<?php
					break;							
				default:
					break;
			}
		}
	?>
    <?php require 'partials/nav.php' ?>
    <article class="article">
        <div class="formulario">
        <form action="service/sesion/recover.php" method="POST">
			<h3>Recuperar contraseña</h3>
			<input type="text" name="email" placeholder="Correo">

			<button type="submit">Enviar</button>
            <div class="text-registro-container">
				<p>Te enviaremos un e-mail para que puedas cambiar tu contraseña.</p>
			</div>
		</form>
        </div>
    </article>



<script type="text/javascript" src="js/modales.js"></script>
<script type="text/javascript" src="js/menu.js"></script>


</body>
</html>