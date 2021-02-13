<?php
include('../_conexion.php');
$id = $_GET['id'];
$eliminar_compra = "DELETE FROM compras WHERE estado_compra = 1 AND cod_user = '$id'";
$eliminar_pedido = "DELETE FROM pedido WHERE estado_ped= 3 AND cod_user = '$id'";
$result=mysqli_query($con,$eliminar_compra);
$result_pedido=mysqli_query($con,$eliminar_pedido);

if ($result && $result_pedido) {
    header("Location: ../../");
}else{
    echo"<h3>No se pudo eliminar</h3>";
}

?>