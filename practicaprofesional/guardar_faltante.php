<?php
	include 'conexionbase.php';
	$id_caja=$_POST['id_caja'];
	$id_user=$_POST['id_user'];
	$faltante=$_POST['faltante'];
	$motivo=$_POST['motivo'];
	$sql = "INSERT INTO gestion_cajas( id_caja, id_user, faltante, motivo) VALUES ('$id_caja','$id_user','$faltante','$motivo')";
	//var_dump($sql,$id_cliente,$mozo,$mesa,$costo,$cantidad,$total,$descripcion,$pedido,$codigo,$impuesto);die;
	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);
?>