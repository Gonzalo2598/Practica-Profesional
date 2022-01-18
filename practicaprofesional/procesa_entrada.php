<?php

require('class_lib/class_conecta_mysql.php');
require('class_lib/funciones.php');
$db=new ConexionMySQL();

$codigo=test_input($_POST['codigo']);
$cantidad=test_input($_POST['cantidad']);
$fecha=test_input($_POST['fecha']);
$costou=test_input($_POST['costou']);
$cliente=test_input($_POST['proveedor']);
$pedido=test_input($_POST['descuento']);

$mesa=test_input($_POST['tasa_iva']);
$total=($cantidad*$costou);
$caja=test_input($_POST['num_fact']);

/*registra en el kardex*/
//$cadena="Insert into kardex(codigo,cantidad,tipo,fecha,user,costou,preciou,proveedor,descuento_porcentaje,impuesto_porcentaje,serie,fecha_proceso,referencia) values('$codigo',$cantidad,'EC','$fecha','$usuario',$costou,0.00,$proveedor,$descuento,$iva,'$total','$fecha','$num_factura')";
//echo $db->consulta($cadena);

$cadena="Insert into Ventas(id_cliente, id_caja, fecha, total, pedido,mesa) values($cliente,'$caja','$fecha','$total','$pedido','$mesa')";
 $db->consulta($cadena);

$sql="SELECT id_art FROM Articulos where codigo='$codigo'";
$id_Art=$db->consulta($sql);

  while($row=mysql_fetch_assoc($id_Art)){
      $idarticulo=$row["id_art"];
  }

$sql="SELECT id_venta FROM ventas ORDER BY id_venta DESC LIMIT 1";
$ID_venta=$db->consulta($sql);

  while($row=mysql_fetch_assoc($ID_venta)){
      $idventa=$row["id_venta"];
  }

$cadena2="Insert into Detalles(id_venta, id_art, cantidad, precio_unitario) values($idventa,$idarticulo,$cantidad,$costou)";
//var_dump($cadena2,$idarticulo,$idventa); die;
 $db->consulta($cadena2);
/*actualiza costo  y stock del articulo en tabla articulos*/
$update=$db->consulta("Update articulos set existencia=existencia-$cantidad where codigo='$codigo'");

$update=$db->consulta("Update pedidos set estado_pedido='Pagado' where id_pedido='$pedido'");

$update=$db->consulta("UPDATE mesas SET estado_mesa='Ocupada',estado_pago='Pago Realizado' WHERE id_mesa='$mesa'");



?>