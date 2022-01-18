<?php
	include 'base_update.php';
	$id_pedido=$_POST['id_pedido'];
	$estado_pedido=$_POST['estado_pedido'];
	$sql = "UPDATE pedidos SET estado_pedido='$estado_pedido' WHERE id_pedido=$id_pedido";
	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);
?>