<?php
include("../../service/_conexion.php");
$id = $_GET['id'];

$nombre = $_POST['nombre_pro-in'];
$descri = $_POST['descri_pro-in'];
$precio = $_POST['precio_pro-in'];
$estado = $_POST['estado_pro-in'];
$rutaimg = $_POST['ruta_pro-in'];
$alt = $_POST['alt_pro-in'];

$editar = "UPDATE productos 
        SET nombre_producto = '$nombre',
            des_producto = '$descri',
            pre_pro = '$precio',
            rut_imagen = '$rutaimg',
            estado = $estado,
            alt = '$alt' 
        WHERE id_producto = '$id'";

$result=mysqli_query($con,$editar);

if ($result) {
    header("Location: ../catalogo_admin.php");
}else{
    echo"<h3>No se pudo eliminar</h3>";
}