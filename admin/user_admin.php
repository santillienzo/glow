<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/normalize.css">
    <link rel="stylesheet" href="style/admin_usu.css">
    <link rel="icon" href="../Images/nota.ico">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300&display=swap" rel="stylesheet">
    <title>ADMINISTRACIÓN</title>
</head>
<body>
    <h3 class="title">USUARIOS</h3>
    <div class="container">
        <?php
            require 'php/admin_usu.php'
        ?>
    </div>

    <a href="admin.php" class="back"><span>ATRÁS</span></a>

</body>
</html>