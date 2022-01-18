<?php
	include 'conexionbase.php';
	$sobrante=$_POST['sobrante'];
	$sql = "UPDATE cajas set sobrante='$sobrante' WHERE estado=1";
	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);
?>