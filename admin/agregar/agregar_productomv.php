<?php 

include("../../service/_conexion.php");


if (isset($_POST['btn-agr'])) {
    if (strlen($_POST['id'])) {
        $producto = trim($_POST['id']);
        
        $sql = "INSERT INTO `productosmv`(`id_producto`) 
                VALUES ('$producto')";
        $resultado = mysqli_query($con,$sql);

        if ($resultado) {
            header("Location: ../catalogo_admin");
        }
    }
    
    
}