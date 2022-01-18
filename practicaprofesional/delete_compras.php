<?php
	include 'base_update.php';
	$id_compra=$_POST['id_compra'];
	$sql = "DELETE from compras where id_compra=$id_compra";
	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);
?>