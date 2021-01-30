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
    $sql = "INSERT INTO pedido(cod_user,id_producto,cantidad,fecha_pedido,estado_ped,dirusuped,telusuped)
            VALUES ($cod_user,$id_producto,$cantidad,now(),1,'','')";
    $result= mysqli_query($con,$sql);
    if($result){
        $response->state=true;
        $response->detail="Producto agregado correctamente";    
    }else{
        $response->state=false;
        $response->detail="No se pudo agregar el producto. Intente nuevamente o intentelo más tarde";    
    }
    mysqli_close($con);
}

header('Content-Type: application/json');
echo json_encode($response);