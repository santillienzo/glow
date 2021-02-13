<?php
include('../_conexion.php');
$response=new stdClass();
session_start();



//$datos=array();
$datos=[];
$i=0;
$usuario = $_SESSION['cod_user'];
$sql_compra="SELECT * FROM compras WHERE cod_user = '$usuario' AND estado_compra = 1";
$result=mysqli_query($con,$sql_compra);
while($row=mysqli_fetch_array($result)){
	$obj=new stdClass();
	$obj->idcompra=$row['id_compra'];
	$obj->cod_user=$row['cod_user'];
	$obj->nom_usu=$row['nom_usu'];
	$obj->apellido_usu=$row['apellido_usu'];
	$obj->tel_usu=$row['tel_usu'];
	$obj->email_usu=$row['email_usu'];
	$obj->id_entrega=$row['id_entrega'];
	$obj->cantidad_pro=$row['cantidad_pro'];
	$obj->precio_final=$row['precio_final'];
	$obj->fecha_pedido=$row['fecha_pedido'];
	$obj->estado_compra=$row['estado_compra'];
	$datos[$i]=$obj;
	$i++;
}
$response->datos=$datos;




$prod=[];
$j=0;
$sql_pro=   "SELECT * FROM pedido 
            INNER JOIN productos 
            WHERE pedido.cod_user = '$usuario' AND pedido.estado_ped = 3 AND pedido.id_producto = productos.id_producto";
$result_compra=mysqli_query($con,$sql_pro);
while($row=mysqli_fetch_array($result_compra)){
	$obj=new stdClass();
	$obj->nombre_pro=$row['nombre_producto'];
	$obj->cantidad=$row['cantidad'];
	$prod[$j]=$obj;
	$j++;
}
$response->prod=$prod;




mysqli_close($con);
header('Content-Type: application/json');
echo json_encode($response);

?>
