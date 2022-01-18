<?php
require('class_lib/class_conecta_mysql.php');
require('class_lib/funciones.php');
$db=new ConexionMySQL();
$nombre_empresa=test_input($_POST['nombre_empresa']);

$cadena=$db->consulta("Insert into Clientes(nombre_empresa) values('$nombre_empresa')");

?>

