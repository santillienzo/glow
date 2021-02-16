<?php
include("../../service/_conexion.php");
$id = $_GET['id'];

$estado = $_POST['estado'];

$editar = "UPDATE compras SET estado_compra = $estado WHERE id_compra = $id";
$result=mysqli_query($con,$editar);

if ($result) {
    header("Location: ../pack_admin.php");
}else{
    echo"<h3>No se pudo eliminar</h3>";
}