<?php

require('class_lib/class_conecta_mysql.php');
$db=new ConexionMySQL();  
require('class_lib/funciones.php');
$fecha=test_input($_POST['fecha']);

 /*revisamos si hay entradas en tabla temp*/
 $revisa=$db->consulta("Select tipo from temp2 where tipo='EC'");
 if($db->buscar_array($revisa)>0){
   $mody=$db->consulta("Update temp2 set fecha='$fecha' where tipo='EC'");
 }
?>