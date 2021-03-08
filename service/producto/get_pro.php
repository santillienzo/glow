<?php
include('service/_conexion.php');
$response=new stdClass();
$id = $_GET['p'];


$sql="SELECT * FROM productos WHERE estado >= 1 AND id_producto = $id";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
	$obj=new stdClass();
	$id_producto=$row['id_producto'];
	$nombre_producto=$row['nombre_producto'];
	$des_producto=$row['des_producto'];
	$pre_pro=$row['pre_pro'];
	$rut_imagen=$row['rut_imagen'];
    $alt=$row['alt'];


	?>
	<div class="objeto-imagen">
                <img id="id_imagen" src="Images/productos/<?php echo $rut_imagen?>" alt="<?php echo $alt?>">
            </div>
            <div class="objeto-info">
                <h2 id="id_nombre"><?php echo $nombre_producto?></h2>
                <h3 id="id_descri"><?php echo $des_producto?></h3>
                <h4 id="id_precio">ARS $ <?php echo $pre_pro?></h4>
                <div class="cant-container">
                    <span class="next" onclick="nextNum()"></span>
                    <span class="prev" onclick="prevNum()"></span>
                    <div id="box">
                    </div>
                </div>
                
                <button class="btn_comprar" onclick="iniciar_compra()">Agregar al carrito</button>
            </div>

<?php
}

?>