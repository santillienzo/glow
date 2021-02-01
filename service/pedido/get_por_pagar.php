<?php
include('../_conexion.php');
$response=new stdClass();
session_start();



//$datos=array();
$datos=[];
$i=0;
$usuario = $_SESSION['cod_user'];
$sql="select *,ped.estado_ped estadoped from pedido ped
inner join productos pro
on ped.id_producto=pro.id_producto
inner join estados_ped on ped.estado_ped = estados_ped.estado_ped
where ped.estado_ped =2 and cod_user = $usuario";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
	$obj=new stdClass();
	$obj->codped=$row['codped'];
	$obj->coduser=$row['cod_user'];
	$obj->id_producto=$row['id_producto'];
	$obj->nombre_producto=$row['nombre_producto'];
	$obj->des_producto=$row['des_producto'];
	$obj->cantidad=$row['cantidad'];
	$obj->fecha_pedido=$row['fecha_pedido'];
	$obj->dirusuped=$row['dirusuped'];
	$obj->telusuped=$row['telusuped'];
	$obj->pre_pro=$row['pre_pro'];
	$obj->estado=$row['estadoped'];
	$obj->estadotext=$row['descri_estado'];
	$obj->rut_imagen=$row['rut_imagen'];
	$datos[$i]=$obj;
	$i++;
}
$response->datos=$datos;

mysqli_close($con);
header('Content-Type: application/json');
echo json_encode($response);

?>