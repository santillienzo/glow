<?php
include("../../service/_conexion.php");
$id = $_GET['id'];
$pag = $_GET['pag'];

$estado = $_POST['estado'];

$editar = "UPDATE pedido SET estado_ped = $estado WHERE codped = $id";
$result=mysqli_query($con,$editar);

if ($result) {
    if ($pag == '1') {
        header("Location: ../pedidos");
    }elseif ($pag == '2') {
        header("Location: ../pagados_productos");
    }else{
        header("Location: ../historial_productos");
    }

}else{
    echo"<h3>No se pudo eliminar</h3>";
}