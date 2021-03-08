<?php
session_start();
$response=new stdClass();
if(!isset($_SESSION['cod_user'])){
    $response->state=false;
    $response->detail="No esta logueado";
    $response->open_login=true;
}
else{
    include_once('../_conexion.php');
    $cod_user= $_SESSION['cod_user'];
    $id_producto= $_POST['id_producto'];
    $cantidad= $_POST['cantidad'];


    $verificar_cantidad = "SELECT estado FROM productos WHERE id_producto = $id_producto";
    $verificar_result = mysqli_query($con,$verificar_cantidad);

    while($row=mysqli_fetch_array($verificar_result)){
        $stock = $row['estado'];
    }

    if ($cantidad <= $stock) {
        $sql = "INSERT INTO pedido(cod_user,id_producto,cantidad,fecha_pedido,estado_ped)
                VALUES ($cod_user,$id_producto,$cantidad,now(),1)";
        $result= mysqli_query($con,$sql);
        if($result){
            $response->state=true;
            $response->detail="Producto agregado correctamente";
            
            $actualizar_pedido = "UPDATE productos SET estado = $stock - $cantidad WHERE id_producto = $id_producto";
            $actualizar_result = mysqli_query($con,$actualizar_pedido);

        }else{
            $response->state=false;
            $response->detail="No se pudo agregar el producto. Intente nuevamente o intentelo más tarde";    
        }
        mysqli_close($con);
    }else{
        $response->state=false;
        $response->detail="Stock no disponible. Solo queda ".$stock." (Ten en cuenta que si son aros se cuentan en pares)";
    }



}

header('Content-Type: application/json');
echo json_encode($response);