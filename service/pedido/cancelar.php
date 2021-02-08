<?php
include('../_conexion.php');
$id = $_GET['id'];
$eliminar = "DELETE FROM pedido WHERE estado_ped = 2 AND cod_user = '$id'";

$result=mysqli_query($con,$eliminar);

if ($result) {
    header("Location: ../../pedido.php");
}else{
    echo"<h3>No se pudo eliminar</h3>";
}

?>