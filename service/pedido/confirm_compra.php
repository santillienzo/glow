<?php
    session_start();
    $response=new stdClass();
    include('../_conexion.php');
    
    
    
    $cod_user= $_SESSION['cod_user'];

function compra($entrega,$envio){
    
    $provincia = ' ';
    $ciudad = ' ';
    $barrio = ' ';
    $calle = ' ';
    $numero = ' ';
    $departamento = ' ';
    $postal = ' ';
    
    if ($entrega == 1) {
        $provincia= ucwords(strtolower(trim($_POST['prov_envio'])));
        $ciudad= ucwords(strtolower(trim($_POST['ciudad_envio'])));
        $barrio= ucwords(strtolower(trim($_POST['barrio_envio'])));
        $calle= trim($_POST['calle_envio']);
        $numero= trim($_POST['numero_envio']);
        $departamento= trim($_POST['depart_envio']);
        $postal= trim($_POST['postal_envio']);
    }

    //REALIZAR SANEAMIENTO
    $provincia = filter_var($provincia,FILTER_SANITIZE_SPECIAL_CHARS);
    $ciudad = filter_var($ciudad,FILTER_SANITIZE_SPECIAL_CHARS);
    $barrio = filter_var($barrio,FILTER_SANITIZE_SPECIAL_CHARS);
    $calle = filter_var($calle,FILTER_SANITIZE_SPECIAL_CHARS);
    $numero = filter_var($numero,FILTER_SANITIZE_SPECIAL_CHARS);
    $departamento = filter_var($departamento,FILTER_SANITIZE_SPECIAL_CHARS);
    $postal = filter_var($postal,FILTER_SANITIZE_SPECIAL_CHARS);


    include('../_conexion.php');
    $response=new stdClass();
    
    
    
    $cod_user= $_SESSION['cod_user'];
    $nombre= $_SESSION['nom_usu'];
    $apellido= $_SESSION['apellido_usu'];
    $telefono= $_SESSION['tel_usu'];
    $email= $_SESSION['email_usu'];

    //BUSCAMOS TODOS LOS DATOS DEL PEDIDO
    $cantidad_final = 0;
    $cantidad_unit = 0;
    $precio = 0;
    $sql_precio="select *,ped.estado_ped estadoped from pedido ped
    inner join productos pro
    on ped.id_producto=pro.id_producto
    inner join estados_ped 
    on ped.estado_ped = estados_ped.estado_ped
    where ped.estado_ped =2 and cod_user = $cod_user";
    $result_datos=mysqli_query($con,$sql_precio);
    while($row=mysqli_fetch_array($result_datos)){
        $obj=new stdClass();
        $obj->cantidad=$row['cantidad'];
        $obj->pre_pro=$row['pre_pro'];
        $cantidad_unit = $row['cantidad'];
        $cantidad_final += $row['cantidad'];
        $precio += $row['pre_pro'] * $cantidad_unit;
    }




    //CAMBIAMOS A FASE 3 LOS ARTICULOS PEDIDOS.
    $sql_pedido = "UPDATE pedido SET estado_ped=3, id_entrega = $entrega
            WHERE estado_ped=2 AND cod_user = $cod_user";
    $result_pedido= mysqli_query($con,$sql_pedido);
    if ($result_pedido) {
        # code...
    }

    //INSERTAMOS LOS DATOS DE LA COMPRA EN LA BASE DE DATOS SQL EN LA TABLA 'compras'
    $sql = "INSERT INTO compras(cod_user, nom_usu, apellido_usu, tel_usu, email_usu, id_entrega, cantidad_pro, precio_parcial, precio_envio, precio_final,provincia, ciudad, barrio, calle, numero, departamento, postal, fecha_pedido, estado_compra)
            VALUES('$cod_user','$nombre','$apellido','$telefono','$email', '$entrega' , $cantidad_final,$precio, $envio, $precio + $envio, '$provincia', '$ciudad', '$barrio', '$calle', '$numero', '$departamento', '$postal', now() ,1)";
    
    $result = mysqli_query($con,$sql);
    
    
    if ($result) {
    header("Location: ../../compra.php");
    }else{
    header("../../pedido.php?e=1");
    }
}

$verificacion = "SELECT * FROM compras WHERE cod_user= $cod_user AND estado_compra = 1";
$result_verificacion = mysqli_query($con, $verificacion);

if ($row=mysqli_fetch_array($result_verificacion)) {
    header("Location: ../../entreg.php?e=3");
}else{
    if ($_REQUEST['optio-radio'] == "domicilio") {
        if (strlen($_POST['prov_envio']) >= 1 &&
        strlen($_POST['ciudad_envio']) >= 1 &&
        strlen($_POST['calle_envio']) >= 1 &&
        strlen($_POST['numero_envio']) >= 1 &&
        strlen($_POST['postal_envio']) >= 1) {
            $postal = $_POST['postal_envio'];
            if ($postal == 5570) { // San Martín
                compra(1,80);
            }else if($postal == 5577 || $postal == 5573){ //JUNIN Y RIVADAVIA
                compra(1,200);
            }elseif($postal == 5590 || $postal == 5500 || $postal == 5502 || $postal == 5501 ||
                    $postal == 5519 || $postal == 5521 || $postal == 5600 || $postal == 5602 ||
                    $postal == 5613 || $postal == 5561 || $postal == 5667 || $postal == 5560 ||
                    $postal == 5507 || $postal == 5504 || $postal == 5539 || $postal == 5540 ||
                    $postal == 5512 || $postal == 5569 || $postal == 5590 || $postal == 5591 ||
                    $postal == 5515 || $postal == 5620 || $postal == 5596){ //RESTO DE DEPARTAMENTOS
                        
                        if ($_REQUEST['entrega'] == "casa") {
                            compra(1,650);
                        }elseif ($_REQUEST['entrega'] == "sucursal") {
                            compra(1,450);
                        }else{
                            header("Location: ../../entreg.php?e=5");
                        }
            } else{
                header("Location: ../../entreg.php?e=4");
            }
        }else{
            header("Location: ../../entreg.php?e=1");
        }
        
    }elseif ($_REQUEST['optio-radio'] == "local") {
        compra(2,0);
    }elseif ($_REQUEST['optio-radio'] == "punto_comun") {
        compra(3,50);
    }
    else{
        header("Location: ../../entreg.php?e=2");
    }
}

