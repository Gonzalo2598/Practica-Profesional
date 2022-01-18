<?php

require('class_lib/class_conecta_mysql.php');
$db=new ConexionMySQL();  
require('class_lib/funciones.php');

$id_prov=test_input($_POST['id_prov']);
$nombre=test_input(strtoupper($_POST['nombre_prov']));

 /*revisamos si hay entradas en tabla temp*/
 $revisa=$db->consulta("Select tipo from temp2 where tipo='EC'");
 if($db->buscar_array($revisa)>0){
   $mody=$db->consulta("Update temp2 set proveedor=$id_prov, descripcion_prov='$nombre' where tipo='EC'");
 }
?>