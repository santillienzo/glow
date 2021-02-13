<?php
include('../_conexion.php');
$response=new stdClass();
session_start();



//$datos=array();
$hist=[];
$i=0;
$usuario = $_SESSION['cod_user'];
$sql_historial="SELECT * FROM pedido 
                INNER JOIN productos 
                WHERE pedido.cod_user = '$usuario' AND pedido.estado_ped = 5 AND pedido.id_producto = productos.id_producto";
$historial=mysqli_query($con,$sql_historial);
while($row=mysqli_fetch_array($historial)){
	$obj=new stdClass();
	$obj->nombre_pro=$row['nombre_producto'];
	$obj->cantidad=$row['cantidad'];
	$obj->fecha_pedido=$row['fecha_pedido'];
	$obj->rut_imagen=$row['rut_imagen'];
    $hist[$i]=$obj;
	$i++;
}
$response->historial=$hist;




$pend=[];
$j=0;
$sql_pro=   "SELECT * FROM pedido 
            INNER JOIN productos 
            WHERE pedido.cod_user = '$usuario' AND pedido.estado_ped = 4 AND pedido.id_producto = productos.id_producto";
$result_compra=mysqli_query($con,$sql_pro);
while($row=mysqli_fetch_array($result_compra)){
	$obj=new stdClass();
	$obj->nombre_pro=$row['nombre_producto'];
	$obj->cantidad=$row['cantidad'];
	$obj->fecha_pedido=$row['fecha_pedido'];
	$obj->rut_imagen=$row['rut_imagen'];
	$pend[$j]=$obj;
	$j++;
}
$response->pend=$pend;




mysqli_close($con);
header('Content-Type: application/json');
echo json_encode($response);

?>
