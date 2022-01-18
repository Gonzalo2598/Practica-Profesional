<?php
	include 'base_update.php';
	$id_compra=$_POST['id_compra'];
	$precio_unitario=$_POST['precio_unitario'];
    $cantidad=$_POST['cantidad'];
    $total=$_POST['total'];
	$sql = "UPDATE compras,detalles_compras set total='$total',precio_unitario='$precio_unitario',cantidad='$cantidad' WHERE compras.id_compra=$id_compra AND detalles_compras.id_compra=$id_compra";
	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);
?>