<?php
require('class_lib/class_conecta_mysql.php');
require('class_lib/funciones.php');
$db=new ConexionMySQL();
$sobrante=test_input($_POST['sobrante']);
$cadena=$db->consulta("Update cajas set sobrante='$sobrante' where estado=1");
var_dump($cadena,$sobrante);die;
?>