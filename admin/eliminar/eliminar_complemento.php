<?php
include("../../service/_conexion.php");
$id = $_GET['id'];
$eliminar = "DELETE FROM complementos WHERE comple_id='$id'";

$result=mysqli_query($con,$eliminar);

if ($result) {
    header("Location: ../catalogo_admin.php");
}else{
    echo"<h3>No se pudo eliminar</h3>";
}