<?php
	include 'conexionbase.php';
	$cliente=$_POST['cliente'];
	$mesa=$_POST['mesa'];
	$mozo=$_POST['mozo'];
	$impuesto=$_POST['impuesto'];
	$pedido=$_POST['pedido'];
	$codigo=$_POST['codigo'];
	$descripcion=$_POST['descripcion'];
	$costo=$_POST['costo'];
	$cantidad=$_POST['cantidad'];
	$total=($cantidad*$costo);
	$sql = "INSERT INTO pedidos( id_cliente, mozo, mesa, precio_uni, cantidad, total, descripcion_articulo, fecha, estado_pedido, codigo, impuesto) 
	VALUES ('$cliente','$mozo','$mesa','$costo','$cantidad','$total','$descripcion',now(),'$pedido','$codigo','$impuesto')";
	//var_dump($sql,$id_cliente,$mozo,$mesa,$costo,$cantidad,$total,$descripcion,$pedido,$codigo,$impuesto);die;
	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);
?>