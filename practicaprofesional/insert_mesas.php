<?php
require('class_lib/class_conecta_mysql.php');
require('class_lib/funciones.php');
$db=new ConexionMySQL();
$estado_mesa=test_input($_POST['estado_mesa']);
$estado_pago=test_input($_POST['estado_pago']);

$cadena=$db->consulta("Insert into Mesas(estado_mesa,estado_pago) values('$estado_mesa','$estado_pago')");

?>

