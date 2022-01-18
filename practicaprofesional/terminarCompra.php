<?php
if(!isset($_POST["total"])) exit;


session_start();


$total = $_POST["total"];
include_once "base_de_datos.php";


$ahora =   date("Y-m-d H:i:s");


$sentencia = $base_de_datos->prepare("INSERT INTO ventas(fecha, total) VALUES (?, ?);");
$sentencia->execute([$ahora, $total]);

$sentencia = $base_de_datos->prepare("SELECT id_venta FROM ventas ORDER BY id_venta DESC LIMIT 1;");
$sentencia->execute();
$resultado = $sentencia->fetch(PDO::FETCH_OBJ);

$id_venta = $resultado === false ? 1 : $resultado->id_venta;

$base_de_datos->beginTransaction();
$sentencia = $base_de_datos->prepare("INSERT INTO detalles(id_art, id_venta, cantidad) VALUES (?, ?, ?);");
$sentenciaExistencia = $base_de_datos->prepare("UPDATE Articulos SET existencia = existencia - ? WHERE id_art = ?;");
foreach ($_SESSION["carrito"] as $articulo) {
	$total += $articulo->total;
	$sentencia->execute([$articulo->id_art, $id_venta, $articulo->cantidad]);
	$sentenciaExistencia->execute([$articulo->cantidad, $articulo->id_art]);
}
$base_de_datos->commit();
unset($_SESSION["carrito"]);
$_SESSION["carrito"] = [];
header("Location: ./vender.php?status=1");
?>