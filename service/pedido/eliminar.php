<?php
include('../_conexion.php');
$id = $_GET['id'];
$cantidad = $_GET['cantidad'];
$id_producto = $_GET['idproducto'];


$verificar_cantidad = "SELECT estado FROM productos WHERE id_producto = $id_producto";
$verificar_result = mysqli_query($con,$verificar_cantidad);
while($row=mysqli_fetch_array($verificar_result)){
    $stock = $row['estado'];
}
$actualizar_pedido = "UPDATE productos SET estado = $stock + $cantidad  WHERE id_producto = $id_producto";
$actualizar_result = mysqli_query($con,$actualizar_pedido);





$eliminar = "DELETE FROM pedido WHERE codped='$id'";
$result=mysqli_query($con,$eliminar);

if ($result) {
    header("Location: ../../carrito.php");

}else{
    echo"<h3>No se pudo eliminar</h3>";
}

?>