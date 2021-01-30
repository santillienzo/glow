<?php
include('../_conexion.php');
$id = $_GET['id'];
$eliminar = "DELETE FROM pedido WHERE codped='$id'";

$result=mysqli_query($con,$eliminar);

if ($result) {
    header("Location: ../../carrito.php");
}else{
    echo"<h3>No se pudo eliminar</h3>";
}

?>