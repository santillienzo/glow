<?php
$token = $_GET['token'];
?>
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

    <title>Cambiar contraseña</title>
</head>
<body>
<?php require 'partials/nav.php' ?>
    
    <?php

    if (isset($_GET['token'])) {
        ?>
        <article class="article">
                <div class="formulario">
                <form action="service/sesion/cambio_pass.php?token=<?php echo $token?>" method="POST">
                    <h3>Cambiar contraseña</h3>
                    <input type="password" name="password" placeholder="Nueva contraseña" require>
                    <input type="password" name="re-password" placeholder="Repetir contraseña" require>
        
                    <button type="submit">Cambiar</button>

                    <?php
					if (isset($_GET['e'])) {
						switch ($_GET['e']) {
							case '1':
								echo '<p class="error">Las contraseñas no coinciden.</p>';
								break;						
							case '2':
								echo '<p class="error">Complete ambos campos.</p>';
								break;						
							default:
								break;
						}
					}
				?>
                </form>
                </div>
            </article>
    <?php
    }
    ?>




<script type="text/javascript" src="js/menu.js"></script>

</body>