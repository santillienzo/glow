<?php
include("../../service/_conexion.php");
$id = $_GET['id'];

$estado = $_POST['estado'];

$editar = "UPDATE pedido SET estado_ped = $estado WHERE codped = $id";
$result=mysqli_query($con,$editar);

if ($result) {
    header("Location: ../pedidos.php");
}else{
    echo"<h3>No se pudo eliminar</h3>";
}