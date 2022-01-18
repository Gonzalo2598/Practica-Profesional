<?php 

require 'conexion.php';

$cliente = $_POST['mesa1'];
$mozo = $_POST['mozo'];
$mesa = $_POST['mesa'];
$pedido = $_POST['pedido'];
$producto = $_POST['descripcion'];
$precio = $_POST['Txtcosto'];
$cantidad = $_POST['cantidad'];
$codigo = $_POST['codigo'];
$impuesto = $_POST['impuesto'];
$total = ($precio*$cantidad);

if ($cliente=="" || $mesa=="" || $mozo=="" ||  $impuesto=="" || $pedido=="" || $codigo=="" || $producto=="" || $precio=="" || $cantidad==0) {
	echo "Parece que hay valores vacios";
	var_dump($cliente,$mesa, $mozo,$impuesto, $pedido,$codigo,$producto,$cantidad,$total);die;
}else{
	$sqlInsertarUsuario = "INSERT INTO pedidos(id_pedido, cliente, mozo, mesa, precio_uni, cantidad, total, descripcion_articulo, fecha, estado_pedido,codigo,impuesto) VALUES(NULL, '$cliente', '$mozo', '$mesa', '$precio', '$cantidad','$total', '$producto',now(),'$pedido','$codigo','$impuesto')";
	$resultado = mysqli_query($conn, $sqlInsertarUsuario);

	if ($resultado) {
		echo "La inserción fue exitosa";
	}else{
		echo "No se pudo realizar la inserción";
	}
	mysqli_close($conn);
}



 ?>