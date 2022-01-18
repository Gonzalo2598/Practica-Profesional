<?php
if(!isset($_POST["descripcion"])){
	return;
} 
$codigo = $_POST["descripcion"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM Articulos WHERE descripcion = ? LIMIT 1;");
$sentencia->execute([$codigo]);
$articulo = $sentencia->fetch(PDO::FETCH_OBJ);
	#Si no existe, salimos y lo indicamos
if(!$articulo){
	header("Location: ./vender.php?status=4");
			exit;
}
	#Si no hay existencia
	if($articulo->existencia < 1){
		header("Location: ./vender.php?status=5");
		exit;
	}
	#buscar articulo dentro del carrito
	session_start();
	$indice = false;
	for ($i=0; $i < count($_SESSION["carrito"]); $i++) { 
		if($_SESSION["carrito"][$i]->codigo === $codigo){
			$indice = $i;
			break;
		}
	}
	#Si no existe, lo agregamos como nuevo
	if($indice === FALSE){
		$articulo->cantidad = 1;
		$articulo->total = $articulo->precio_venta;
		array_push($_SESSION["carrito"], $articulo);
	}
	else{
		#Si ya existe, se agrega la cantidad
		#Pero tal vez ya no haya
		$cantidadExistente= $_SESSION["carrito"][$indice]->cantidad;
		#Si al sumarle 1 suepera lo que existe, no se agrega
		if($cantidadExistente + 1 > $articulo->existencia){
			header("Location: ./vender.php?status=5");
			exit;
		}
	
	
		$_SESSION["carrito"][$indice]->cantidad++;
		$_SESSION["carrito"][$indice]->total = $_SESSION["carrito"][$indice]->cantidad * $_SESSION["carrito"][$indice]->precio_venta;
	}	
	header("Location: ./vender.php");

?>