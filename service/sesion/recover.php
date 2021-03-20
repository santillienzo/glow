<?php

require '../_conexion.php';

$email_usu = $_POST['email'];

if (array_key_exists('email', $_POST)) {
    $sql ="SELECT email_usu FROM usuario WHERE email_usu = '$email_usu'";
    $result = mysqli_query($con, $sql);

    $row = mysqli_fetch_array($result);
    $email = $row['email_usu'];

    if ($result) {

        $token = uniqid();

        $sql_token = "UPDATE usuario SET token = '$token' WHERE email_usu = '$email'";
        $result_token = mysqli_query($con,$sql_token);

        $destinatario = $email;
        $header = "From: glowstorevm@gmail.com\r\n";
        $header .= "Reply-to: glowstorevm@gmail.com\r\n";
        $header .= "X-Mailer: PHP/". phpversion();
        $mensajeCompleto = "Estimad@ cliente: Se ha solicitado un enlace para cambiar su contraseña.\r\n";
        $mensajeCompleto .= "Haz click aquí para modificarla: https://www.glowstore.com.ar/recover?token=".$token."\r\n";
        $mensajeCompleto .="Si usted no lo solicitó, simplemente ignore este mensaje.\r\n";
        $envio = mail($destinatario,"Recuperar contraseña.",$mensajeCompleto,$header);
        
        header("location: ../../recover-pass?congrat=1");
    }
}