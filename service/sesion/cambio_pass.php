<?php
    include '../_conexion.php';

    if (!empty($_POST['password']) || !empty($_POST['re-password'])) {
        $token = $_GET['token'];
        $password = $_POST['password'];
        $re_password = $_POST['re-password'];
    
    
    
        //Encriptamos la contraseña
        $password = hash('sha512',$password);
        $re_password = hash('sha512',$re_password);
    
        if ($password == $re_password) {
    
            $sql="UPDATE usuario SET pas_usu = '$password' WHERE token='$token'";
            $result = mysqli_query($con,$sql);
    
            if ($result) {
                header("Location: ../../login?congrat=1");
            }else{
                echo 'Error';
            }
    
        }
        else{
            header("Location: ../../recover?token='".$token."'&e=1");
        }
        $sql = "";
    }else{
        header("Location: ../../recover?token='".$token."'&e=2");
    }
    
?>