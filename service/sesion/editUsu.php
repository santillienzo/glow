<?php
session_start();
require '../_conexion.php';

$id = $_SESSION['cod_user'];
$name = $_POST['name']; 
$surname = $_POST['surname']; 
$email = $_POST['email']; 
$phone = $_POST['phone'];

$sql = "UPDATE usuario 
        SET nom_usu = '$name', apellido_usu = '$surname',
        email_usu = '$email', tel_usu = '$phone'
        WHERE cod_user = '$id'";

$result = mysqli_query($con,$sql);

if ($result) {
    header("Location: ../../user.php?congrat=1");
}else{
    header("Location: ../../editUser.php?e=1");
    
}