<?php

include("service/_conexion.php");

if (isset($_POST['register'])) {

    if(strlen($_POST['nombre_usu']) >= 1 && 
    strlen($_POST['apellido_usu']) >= 1 && 
    strlen($_POST['email_usu']) >= 1 &&
    strlen($_POST['pas_usu']) >= 1 &&
    strlen($_POST['re_pas_usu']) >= 1){
        $name = ucwords(strtolower(trim($_POST['nombre_usu'])));
        $apellido = ucwords(strtolower(trim($_POST['apellido_usu'])));
        $email = trim($_POST['email_usu']);
        $tel = trim($_POST['tel_usu']);
        $pass = trim($_POST['pas_usu']);
        $re_pass = trim($_POST['re_pas_usu']);
        $date = date("d/m/y");

        if ($pass === $re_pass) {

            if (strlen($pass) >= 8) {
                // $pass = password_hash($pass,PASSWORD_BCRYPT);
                $sql = "INSERT INTO usuario(nom_usu, apellido_usu, email_usu,tel_usu, pas_usu, fecha_creada) 
                        VALUES ('$name','$apellido','$email','$tel','$pass','$date')";
                $resultado = mysqli_query($con,$sql);
        
                if ($resultado) {
                    // header('Location: login.php');
                    $email_usu = $_POST['email_usu'];
                    $sql="SELECT * FROM usuario WHERE email_usu ='$email_usu'";
                    $resultado= mysqli_query($con,$sql);
                    $row=mysqli_fetch_array($resultado);
                    session_start();
                    $_SESSION['cod_user'] = $row['cod_user'];
                    $_SESSION['nom_usu'] = $row['nom_usu'];
                    $_SESSION['apellido_usu'] = $row['apellido_usu'];
                    $_SESSION['email_usu'] = $row['email_usu'];
                    $_SESSION['tel_usu'] = $row['tel_usu'];
                    $_SESSION['fecha_usu'] = $row['fecha_creada'];
                    header('Location: index.php');
                }
            }else{
                header('Location: signup.php?e=2');
            }

        }else{
            header('Location: signup.php?e=1');
        }
        

    }else{
        header('Location: signup.php?e=3');
    }
}
?>


