<?php
    
if (isset($_POST['btn'])) {
    if (!empty($_POST['nombre']) && !empty($_POST['email']) &&
        !empty($_POST['asunto']) && !empty($_POST['mensaje']) && !empty($_POST['phone'])) {
            $destinatario = 'glowstorevm@gmail.com';
        
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $asunto = $_POST['asunto'];
            $phone = $_POST['phone'];
            $mensaje = $_POST['mensaje'];

            if (is_numeric($phone)) {

                if (filter_var($email,FILTER_VALIDATE_EMAIL)) {
                    $header = "From: ".$email. "\r\n";
                    $header .= "Reply-to: ".$email. "\r\n";
                    $header .= "X-Mailer: PHP/". phpversion();
                    $mensajeCompleto = $mensaje . "\nDe: ".$nombre. "\nTeléfono: ".$phone;
                
                    $envio = mail($destinatario,$asunto,$mensajeCompleto,$header);
                    if ($envio) {
                        header("Location: ../../contacto.php?congrat=1");
                    }   
                }else{
                    header("Location: ../../contacto.php?e=3");
                }

            }else{
            header("Location: ../../contacto.php?e=2");
            }
    }else{
        header("Location: ../../contacto.php?e=1");
    }
}