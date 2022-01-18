<?php
	include 'base_update.php';
	$id_venta=$_POST['id_venta'];
	$sql = "DELETE from ventas where id_venta=$id_venta";
	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);
?>