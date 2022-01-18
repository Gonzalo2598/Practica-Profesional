<?php
require('class_lib/class_conecta_mysql.php');
require('class_lib/funciones.php');
$db=new ConexionMySQL();
$empleado=test_input($_POST['id_user']);
$fecha_apertura=test_input($_POST['fecha_apertura']);
$monto_inicial=test_input($_POST['monto_inicial']);
$estado=test_input($_POST['estado']);
$cadena=$db->consulta("Insert into Cajas(id_user,fecha_apertura,monto_inicial,estado) values('$empleado','$fecha_apertura','$monto_inicial','$estado')");
?>