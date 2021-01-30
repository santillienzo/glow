<?php
    session_start();
    $response=new stdClass();
    include('../_conexion.php');

    $cod_user= $_SESSION['cod_user'];
    $dirusu= $_SESSION['dir_usu'];
    $telusu= $_SESSION['tel_usu'];
    
        $sql = "UPDATE pedido SET dirusuped='$dirusu',telusuped='$telusu',estado_ped=2
                WHERE estado_ped=1 AND cod_user = $cod_user";
        $result= mysqli_query($con,$sql);
        if ($result) {
            $response->state=true;
            header("Location: ../../pedido.php");
        }else{
            $response->state=false;
            $response->detail="No se pudo actualizar el pedido. Intente más tarde";
        }    
        mysqli_close($con);


header('Content-Type: application/json');
echo json_encode($response);