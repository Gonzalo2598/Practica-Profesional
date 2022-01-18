<?php
/*busca el articulo para punto de venta*/

require('class_lib/class_conecta_mysql.php');
$db=new ConexionMySQL();    
require('class_lib/funciones.php');



$codigo=test_input($_POST['codigo']);
$cadena="select precio_venta,descripcion,existencia from articulos where codigo='$codigo'";
$exe=$db->consulta($cadena);
 if($db->numero_de_registros($exe)>0){
   $array=array();
   $i=0;
    while($re=$db->buscar_array($exe)){
      $array[$i]=$re;
      $i++;
   }
   echo json_encode($array);
 }else{
   echo "0";
 }
?>