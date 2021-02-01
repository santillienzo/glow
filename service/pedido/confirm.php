<?php
    session_start();
    $response=new stdClass();
    error_reporting(0);
    
    function sql($val_entreg){
        $response=new stdClass();
        include('../_conexion.php');


        $cod_user= $_SESSION['cod_user'];
        $dirusu= $_SESSION['dir_usu'];
        $telusu= $_SESSION['tel_usu'];

        $sql = "UPDATE pedido SET dirusuped='$dirusu',telusuped='$telusu',estado_ped=2, entrega=$val_entreg
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


    if ($_REQUEST['optio-radio'] == "domicilio") {
        if ($_SESSION['dir_usu'] == NULL) {
            echo
            '<script type="text/javascript">'.
                'alert("No tienes ninguna dirección asociada a tu cuenta.");'.
                'window.location.href="../../entreg.php"'.
            '</script>';
        }else{
            sql(1);
        }
    }elseif ($_REQUEST['optio-radio'] == "local") {
        sql(2);
    }elseif ($_REQUEST['optio-radio'] == "punto_comun") {
        sql(3);
    }elseif ($_REQUEST['optio-radio'] == NULL){
        echo
            '<script type="text/javascript">'.
                'alert("Selecciona una opción de entrega.");'.
                'window.location.href="../../entreg.php"'.
            '</script>';
    }

    ?>









    


header('Content-Type: application/json');
echo json_encode($response);