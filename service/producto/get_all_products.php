<?php
include('../_conexion.php');
$response=new stdClass();

//$datos=array();
$datos=[];
$i=0;
$sql="SELECT * FROM productos WHERE productos.estado = 1";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
	$obj=new stdClass();
	$obj->id_producto=$row['id_producto'];
	$obj->nombre_producto=$row['nombre_producto'];
	$obj->des_producto=$row['des_producto'];
	$obj->pre_pro=$row['pre_pro'];
	$obj->rut_imagen=$row['rut_imagen'];
	$datos[$i]=$obj;
	$i++;
}
$response->datos=$datos;

mysqli_close($con);
header('Content-Type: application/json');
echo json_encode($response);

?>