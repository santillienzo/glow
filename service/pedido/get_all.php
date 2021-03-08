<?php
include('service/_conexion.php');
$response=new stdClass();



//$datos=array();
$usuario = $_SESSION['cod_user'];
$sql="select *,ped.estado_ped estadoped from pedido ped
inner join productos pro
on ped.id_producto=pro.id_producto
inner join estados_ped on ped.estado_ped = estados_ped.estado_ped
where ped.estado_ped=1 and cod_user = $usuario";
$result=mysqli_query($con,$sql);
$filas= mysqli_num_rows($result);
$monto = 0;

if ($filas > 0) {
?>
	<div class="relleno-container">
		<div class="relleno" id="space-list">
		<?php
			while($row=mysqli_fetch_array($result)){
				$codped=$row['codped'];
				$id_producto=$row['id_producto'];
				$nombre_producto=$row['nombre_producto'];
				$cantidad=$row['cantidad'];
				$pre_pro=$row['pre_pro'];
				$estado=$row['estadoped'];
				$rut_imagen=$row['rut_imagen'];
				?>
				<div class="item-pedido">
					<div class="pedido-img">
						<img src="Images/productos/<?php echo $rut_imagen?>">
					</div>
					<div class="pedido-detalle">
						<div class="box-detalle">
							<h3><?php echo $nombre_producto?></h3>
							<p><b>Precio:</b>ARS $ <?php echo $pre_pro?><p>
							<p><b>Cantidad:</b><?php echo $cantidad?></p>
							<a class="eliminar" href="service/pedido/eliminar.php?id=<?php echo $codped?>&cantidad=<?php echo $cantidad?>&idproducto=<?php echo $id_producto?>"><span>Eliminar</span></a>
						</div>
					</div>
				</div>
		<?php
				$monto += $pre_pro;
			}
		?>
		</div>
		<div class="datos-container">
			<p><span>Subtotal:</span><span id="montoTotal">ARS $ <?php echo $monto?></span></p>
		</div>
		<div class="btn-comprar-container">
		<div class="cancelar" title="Cancelar compra" onclick="cancelar_compra()"><i class="fas fa-times"></i></div>
		
		<div class="btn-comprar-container">
			<button class="btn-comprar" onclick="confirm_compra()">Comprar</button>
		</div>
		</div>
    </div>
	<?php
}else{
	?>
	<div class="aviso-container">
        <div class="aviso">UPS! parece que no tienes nada en el carrito. Mirá algún producto y agregalo!</div>
    </div>
	<?php
}


?>
