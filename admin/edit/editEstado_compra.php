<?php
include("../../service/_conexion.php");
$id = $_GET['id'];
$pag = $_GET['pag'];


$estado = $_POST['estado'];

$editar = "UPDATE compras SET estado_compra = $estado WHERE id_compra = $id";
$result=mysqli_query($con,$editar);

if ($result) {
    if ($pag == '1') {
        header("Location: ../pack_admin.php");
    }elseif ($pag == '2') {
        header("Location: ../pagado.php");
    }else{
        header("Location: ../historial.php");
    }
}else{
    echo"<h3>No se pudo eliminar</h3>";
}