<?php
	include 'conexionbase.php';
	$cliente=$_POST['cliente'];
	$cadete=$_POST['cadete'];
	$direccion=$_POST['direccion'];
	$casa=$_POST['casa'];
	$barrio=$_POST['barrio'];
    $telefono=$_POST['telefono'];
    $pedido=$_POST['pedido'];
	$codigo=$_POST['codigo'];
	$descripcion=$_POST['descripcion'];
	$costo=$_POST['costo'];
	$cantidad=$_POST['cantidad'];
	$total=($cantidad*$costo);
	$sql = "INSERT INTO pedidos( id_cliente,precio_uni, cantidad, total, descripcion_articulo, fecha, estado_pedido, codigo, id_user, direccion, casa, barrio, telefono) 
	VALUES ('$cliente','$costo','$cantidad','$total','$descripcion',now(),'$pedido','$codigo','$cadete','$direccion', '$casa', '$barrio', '$telefono')";
    //var_dump($sql,$cliente,$cadete,$direccion,$casa,$barrio,$telefono,$costo,$cantidad,$total,$descripcion,$pedido,$codigo); die;
	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);
?>