<?php

require('class_lib/class_conecta_mysql.php');
require('class_lib/funciones.php');
$db= new ConexionMySQL();


$fecha_cierre=test_input(strtoupper($_POST['fecha_cierre']));
$monto_final=test_input(strtoupper($_POST['monto_final']));
$ingreso=test_input(strtoupper($_POST['ingreso']));
$egreso=test_input(strtoupper($_POST['egreso']));
$estado_cierre=test_input(strtoupper($_POST['estado_cierre']));

$update="Update cajas set fecha_cierre='$fecha_cierre',monto_final='$monto_final',movimiento_ingreso='$ingreso',movimiento_egreso='$egreso',faltante='$estado_cierre',estado=0 where estado=1";


$ejecuta=$db->consulta($update);
     
$db->DesconectaServer();
?>
