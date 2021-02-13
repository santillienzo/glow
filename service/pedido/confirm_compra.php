<?php
    session_start();
    $response=new stdClass();
    include('../_conexion.php');
    
    
    
    $cod_user= $_SESSION['cod_user'];
    $nombre= $_SESSION['nom_usu'];
    $apellido= $_SESSION['apellido_usu'];
    $telefono= $_SESSION['tel_usu'];
    $email= $_SESSION['email_usu'];

//BUSCAMOS TODOS LOS DATOS DEL PEDIDO
$cantidad_final = 0;
$cantidad_unit = 0;
$entrega = 0;
$precio = 0;
$sql_precio="select *,ped.estado_ped estadoped from pedido ped
inner join productos pro
on ped.id_producto=pro.id_producto
inner join estados_ped 
on ped.estado_ped = estados_ped.estado_ped
inner join entregas
on ped.id_entrega = entregas.id_entrega
where ped.estado_ped =2 and cod_user = $cod_user";
$result_datos=mysqli_query($con,$sql_precio);
while($row=mysqli_fetch_array($result_datos)){
	$obj=new stdClass();
	$obj->cantidad=$row['cantidad'];
	$obj->id_entrega=$row['id_entrega'];
	$obj->pre_pro=$row['pre_pro'];

    $cantidad_unit = $row['cantidad'];
	$cantidad_final += $row['cantidad'];
	$entrega = $row['id_entrega'];
	$precio += $row['pre_pro'] * $cantidad_unit;
}




//CAMBIAMOS A FASE 3 LOS ARTICULOS PEDIDOS.
$sql_pedido = "UPDATE pedido SET estado_ped=3
        WHERE estado_ped=2 AND cod_user = $cod_user";
$result_pedido= mysqli_query($con,$sql_pedido);








//INSERTAMOS LOS DATOS DE LA COMPRA EN LA BASE DE DATOS SQL EN LA TABLA 'compras'
    $sql = "INSERT INTO compras(cod_user, nom_usu, apellido_usu, tel_usu, email_usu, id_entrega, cantidad_pro, precio_final,fecha_pedido,estado_compra)
            VALUES('$cod_user','$nombre','$apellido','$telefono','$email', $entrega, $cantidad_final,$precio,now(),1)";

$result = mysqli_query($con,$sql);
if($result){
    
}else{
    
}


if ($result) {
    header("Location: ../../compra.php");
}else{
    header("../../pedido.php?e=1");
}