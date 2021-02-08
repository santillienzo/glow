<?php
header("Content-Type: text/html;charset=utf-8");
include('../_conexion.php');
$email_usu = $_POST['email_usu'];

//Conectar a la base de datos

$sql="SELECT * FROM usuario WHERE email_usu ='$email_usu'";

$resultado= mysqli_query($con,$sql);



if ($resultado) {
    $filas= mysqli_num_rows($resultado);
    $row=mysqli_fetch_array($resultado);
    
    if ($filas > 0) {
        $pass_usu = $_POST['pas_usu'];
        
        if ($pass_usu == $row['pas_usu']) {
            session_start();
            $_SESSION['cod_user'] = $row['cod_user'];
            $_SESSION['nom_usu'] = $row['nom_usu'];
            $_SESSION['apellido_usu'] = $row['apellido_usu'];
            $_SESSION['email_usu'] = $row['email_usu'];
            $_SESSION['tel_usu'] = $row['tel_usu'];
            $_SESSION['dir_usu'] = $row['dir_usu'];
            $_SESSION['fecha_usu'] = $row['fecha_creada'];
            header('Location: ../../index.php');
        }
        else{
            header('Location: ../../login.php?e=3');
        }
    }else{
        header('Location: ../../login.php?e=2');
    }
    
}else{
    header('Location: ../../login.php?e=1');
}


mysqli_free_result($resultado);
mysqli_close($con);
