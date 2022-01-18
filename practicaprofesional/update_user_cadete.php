<?php
	include 'base_update.php';
	$id_user=$_POST['id_user'];
	$usuario=$_POST['usuario'];
    $contraseña=$_POST['contraseña'];
	$ce = password_hash($contraseña,PASSWORD_DEFAULT);
	$sql = "UPDATE usuarios SET usuario='$usuario',contraseña='$ce' WHERE id_user=$id_user";
	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);
?>