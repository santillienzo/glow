<?php
include('service/_conexion.php');
$response=new stdClass();


$i=0;
$sql="SELECT * FROM complementos INNER JOIN productos ON complementos.id_producto = productos.id_producto WHERE productos.estado = 1";
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
	<div class="MVcard">
        <a href="producto?p=<?php echo $id_producto?>">
            <div class="imgMV-container">
                <img src="Images/productos/<?php echo $rut_imagen?>" alt="<?php echo $alt?>">
            </div>
            <div class="tituloMV-container"><h3><?php echo $nombre_producto?></h3></div>
            <div class="descripcionMV-container"><p><?php echo $des_producto?></p></div>
            <div class="precioMV-container"><p>ARS $ <?php echo $pre_pro?></p></div>
        </a>
    </div>

<?php
}

?>