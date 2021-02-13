<?php
    session_start();
    $response=new stdClass();
    $cod_user= $_SESSION['cod_user'];
    include('../_conexion.php');

    
    function sql($val_entreg){
        $response=new stdClass();
        include('../_conexion.php');


        $cod_user= $_SESSION['cod_user'];
        $dirusu= $_SESSION['dir_usu'];
        $telusu= $_SESSION['tel_usu'];

        $sql = "UPDATE pedido SET dirusuped='$dirusu',telusuped='$telusu',estado_ped=2, id_entrega=$val_entreg
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
    }


    $pedido = "SELECT * FROM pedido WHERE cod_user= $cod_user AND estado_ped = 2";
    $pedido_result = mysqli_query($con,$pedido);
    $i = 0;
    
    
    
    if ($row=mysqli_fetch_array($pedido_result)) {
        header("Location: ../../entreg.php?e=3");
    }else{
        if ($_REQUEST['optio-radio'] == "domicilio") {
            if ($_SESSION['dir_usu'] == NULL) {
                header("Location: ../../entreg.php?e=1");
            }else{
                sql(1);
            }
        }elseif ($_REQUEST['optio-radio'] == "local") {
            sql(2);
        }elseif ($_REQUEST['optio-radio'] == "punto_comun") {
            sql(3);
        }elseif ($_REQUEST['optio-radio'] == NULL){
            header("Location: ../../entreg.php?e=2");
        }
    }



    ?>









    

header("Content-Type: text/html;charset=utf-8");
header('Content-Type: application/json');
echo json_encode($response);