<?php

require('class_lib/class_conecta_mysql.php');
$db=new ConexionMySQL();  
require('class_lib/funciones.php');
$factura=test_input(strtoupper($_POST['num_fact']));

 /*revisamos si hay entradas en tabla temp*/
 $revisa=$db->consulta("Select tipo from temp where tipo='EC'");
 if($db->buscar_array($revisa)>0){
   $mody=$db->consulta("Update temp set num_fact_nota='$factura' where tipo='EC'");
 }
?>