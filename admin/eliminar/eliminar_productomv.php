<?php
include("../../service/_conexion.php");
$id = $_GET['id'];
$eliminar = "DELETE FROM productosmv WHERE pro_mv='$id'";

$result=mysqli_query($con,$eliminar);

if ($result) {
    header("Location: ../catalogo_admin.php");
}else{
    echo"<h3>No se pudo eliminar</h3>";
}