<?php
include("../../service/_conexion.php");
$id = $_GET['id'];
$eliminar = "DELETE FROM usuario WHERE cod_user='$id'";

$result=mysqli_query($con,$eliminar);

if ($result) {
    header("Location: ../user_admin.php");
}else{
    echo"<h3>No se pudo eliminar</h3>";
}