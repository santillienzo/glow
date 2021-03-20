<?php
include("../../service/_conexion.php");
$id = $_GET['id'];

//Borramos la imagen
$sql_imagen = "SELECT * FROM productos WHERE id_producto=$id";
$result_imagen=mysqli_query($con,$sql_imagen);
while ($row=mysqli_fetch_array($result_imagen)) {
    $imagen = $row['rut_imagen'];
}

echo $imagen;
unlink('../../Images/productos/'.$imagen);

//eliminamos el objeto de la bd
$eliminar = "DELETE FROM productos WHERE id_producto='$id'";

$result=mysqli_query($con,$eliminar);

if ($result) {
    header("Location: ../catalogo_admin.php");
}else{
    echo"<h3>No se pudo eliminar</h3>";
}