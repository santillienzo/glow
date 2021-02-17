<?php
header("Content-Type: text/html;charset=utf-8");
include("service/_conexion.php");

if (isset($_POST['register'])) {

    if(strlen(trim($_POST['nombre_usu'])) >= 1 && 
    strlen(trim($_POST['apellido_usu'])) >= 1 && 
    strlen(trim($_POST['email_usu'])) >= 1 &&
    strlen(trim($_POST['pas_usu'])) >= 1 &&
    strlen(trim($_POST['re_pas_usu'])) >= 1){
        $name = ucwords(strtolower(trim($_POST['nombre_usu'])));
        $apellido = ucwords(strtolower(trim($_POST['apellido_usu'])));
        $email = trim($_POST['email_usu']);
        $tel = trim($_POST['tel_usu']);
        $pass = trim($_POST['pas_usu']);
        $re_pass = trim($_POST['re_pas_usu']);
        $date = date("d/m/y");

        //VERIFICAMOS QUE NO HAYA UN USUARIO CON EL MISMO EMAIL

        $veri_email = "SELECT * FROM usuario WHERE email_usu = '$email'";
        $result_email = mysqli_query($con,$veri_email);
        $filas= mysqli_num_rows($result_email);

        if ($filas == 0) {
            //PROCESO DE SANEAMIENTO
            $name = filter_var($name,FILTER_SANITIZE_SPECIAL_CHARS);
            $apellido = filter_var($apellido,FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_var($email,FILTER_SANITIZE_EMAIL);
            $tel = filter_var($tel,FILTER_SANITIZE_SPECIAL_CHARS);
            $pass = filter_var($pass,FILTER_SANITIZE_SPECIAL_CHARS);
            $re_pass = filter_var($re_pass,FILTER_SANITIZE_SPECIAL_CHARS);
    
            if (is_numeric($tel)) { //verificamos que la variable teléfono sea número
    
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) { //verificamos que la variable email tenga el formato email@dominio.com
                    
                    $pass = hash('sha512',$pass);
                    $re_pass = hash('sha512',$re_pass);
    
                    if ($pass === $re_pass) { //verificamos que ambas contraseñas sean iguales
                        
                        if (strlen($pass) >= 8) {
                            $sql = "INSERT INTO usuario(nom_usu, apellido_usu, email_usu,tel_usu, pas_usu, fecha_creada) 
                                    VALUES ('$name','$apellido','$email','$tel','$pass','$date')";
                            $resultado = mysqli_query($con,$sql);
                    
                            if ($resultado) {
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
                                header('Location: /');
                            }
                        }else{
                            header('Location: signup.php?e=2');
                        }
            
                    }else{
                        header('Location: signup.php?e=1');
                    }
    
                }else{
                    header('Location: signup.php?e=5');
                }
    
            }else{
                header('Location: signup.php?e=4');
    
            }
            
        }else{
            header('Location: signup.php?e=6');
        }
    }else{
        header('Location: signup.php?e=3');
    }
}
?>


