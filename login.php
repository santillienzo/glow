
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/login.css">
    <link rel="stylesheet" href="style/object/nav.css">
    <link rel="stylesheet" href="style/object/copy.css">
    <link rel="icon" href="Images/ico.ico">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Alata&display=swap" rel="stylesheet">    
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300&display=swap" rel="stylesheet">

    <title>LOGIN</title>
</head>
<body>
    <?php require 'partials/nav.php' ?>

    <article class="article">
        <div class="formulario">
        <form action="service/sesion/login.php" method="POST">
			<h3>Iniciar sesión</h3>
			<input type="text" name="email_usu" placeholder="Correo">
			<input type="password" name="pas_usu" placeholder="Contraseña">
			<?php
					if (isset($_GET['e'])) {
						switch ($_GET['e']) {
							case '1':
								echo '<p>Error de conexión</p>';
								break;							
							case '2':
								echo '<p>Email incorrecto</p>';
								break;							
							case '3':
								echo '<p>Contraseña Incorrecta</p>';
								break;							
							default:
								break;
						}
					}
				?>

			<button type="submit">Ingresar</button>
			<div class="text-registro-container">
				<p>¿No tienes ninguna cuenta? <a href="signup">Regístrate.</a></p>
			</div>
		</form>
        </div>
    </article>

    



    <script type="text/javascript" src="js/menu.js"></script>
</body>
</html>