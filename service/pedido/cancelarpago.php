<?php
include('../_conexion.php');
$id = $_GET['id'];
session_start();

$usuario = $_SESSION['cod_user'];
$sql="select *,ped.estado_ped estadoped from pedido ped
inner join productos pro
on ped.id_producto=pro.id_producto
inner join estados_ped on ped.estado_ped = estados_ped.estado_ped
where ped.estado_ped=3 and cod_user = $usuario";
$result_sql =mysqli_query($con,$sql);

while ($row=mysqli_fetch_array($result_sql)) {
    $id_producto = $row['id_producto'];
    $cantidad = $row['cantidad'];

    echo "Producto = ".$id_producto;
    echo "cantidad = ".$cantidad;

    $verificar_cantidad = "SELECT estado FROM productos WHERE id_producto = $id_producto";
    $verificar_result = mysqli_query($con,$verificar_cantidad);
    while($row=mysqli_fetch_array($verificar_result)){
        $stock = $row['estado'];
    }

    echo "Stock = ".$stock;
    $actualizar_pedido = "UPDATE productos SET estado = $stock + $cantidad  WHERE id_producto = $id_producto";
    $actualizar_result = mysqli_query($con,$actualizar_pedido);
}







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