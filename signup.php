<?php
    include('service/sesion/registrar.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/signup.css">
    <link rel="stylesheet" href="style/object/nav.css">
    <link rel="stylesheet" href="style/object/copy.css">
    <link rel="icon" href="Images/ico.ico">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Alata&display=swap" rel="stylesheet">    
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300&display=swap" rel="stylesheet">

    <title>REGISTRATE</title>
</head>
<body>
    <?php require 'partials/nav.php' ?>

    <article class="article">
        <div class="formulario">
        <form action="signup.php" method="POST" >
			<h3>Registro</h3>
			<input type="text" name="nombre_usu" placeholder="Nombre" require>
			<input type="text" name="apellido_usu" placeholder="Apellido" require>
			<input type="text" name="email_usu" placeholder="Correo" require>
			<input type="text" name="tel_usu" placeholder="Número de teléfono" require>
			<input type="password" name="pas_usu" placeholder="Contraseña" require>
			<input type="password" name="re_pas_usu" placeholder="Escribe nuevamente tu contraseña">

            <?php
					if (isset($_GET['e'])) {
						switch ($_GET['e']) {
							case '1':
								echo '<p class="error">Las contraseñas no son iguales. Intentalo de nuevo.</p>';
								break;							
							case '2':
								echo '<p class="error">Contraseña muy corta. Tiene que ser mayor o igual a 8 carácteres</p>';
								break;							
							case '3':
								echo '<p class="error">Rellene todos los campos por favor.</p>';
								break;							
							case '4':
								echo '<p class="error">Ingrese un número de teléfono válido por favor.</p>';
								break;							
							case '5':
								echo '<p class="error">Ingrese una dirección de correo válida.</p>';
								break;							
							case '6':
								echo '<p class="error">Ese email ya existe. Por favor pruebe con otro.</p>';
								break;							
							default:
								break;
						}
					}
				?>

			<button type="submit" name="register">Registrate</button>
			<div class="text-registro-container">
				<p>¿Tienes una cuenta? <a href="login">Ingresar</a></p>
			</div>
		</form>
        </div>


        
	</article>
	
	<script type="text/javascript" src="js/menu.js"></script>
</body>
</html>