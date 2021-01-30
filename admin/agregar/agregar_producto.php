<?php 

include("../../service/_conexion.php");
$nombre=$_FILES['archivo']['name'];
$guardado=$_FILES['archivo']['tmp_name'];








if (isset($_POST['btn-agr'])) {
    if (strlen($_POST['nombre']) &&
    strlen($_POST['descri']) &&
    strlen($_POST['precio']) &&
    strlen($_POST['estado'])) {
        $name_pro = trim($_POST['nombre']);
        $descri = trim($_POST['descri']);
        $precio = trim($_POST['precio']);
        $estado = trim($_POST['estado']);
        $archivo = trim($_POST['archivo']);

        if(move_uploaded_file($guardado, '../../Images/productos/'.$nombre)){
            $sql = "INSERT INTO `productos`(`nombre_producto`, `des_producto`, `pre_pro`, `estado`, `rut_imagen`) 
            VALUES ('$name_pro','$descri','$precio','$estado','$nombre')";
            $resultado = mysqli_query($con,$sql);

            if ($resultado) {
                header("Location: ../catalogo_admin.php");
            }

        }

    }
}

?>