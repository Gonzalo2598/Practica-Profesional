<?php
require('class_lib/class_conecta_mysql.php');
$db=new ConexionMySQL(); 
require('class_lib/funciones.php');
$codigo=test_input(strtoupper($_POST['articulo']));

 /*revisamos si hay entradas en tabla temp*/
 $revisa=$db->consulta("Select tipo from temp2 where tipo='EC'");
 if($db->buscar_array($revisa)>0){
   $mody=$db->consulta("delete from temp2 where articulo='$codigo' and tipo='EC'");
 }
?>