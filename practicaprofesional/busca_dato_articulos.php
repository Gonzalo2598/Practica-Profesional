<?php

require('class_lib/class_conecta_mysql.php');
require('class_lib/funciones.php');
$db=new ConexionMySQL();

$codigo=test_input($_POST['codigo']);
$cadena="select precio_compra,descripcion,existencia from articulos where codigo='$codigo'";
$exe=$db->consulta($cadena);
 if($db->numero_de_registros($exe)>0){
   $array=array();
    while($re=$db->buscar_array($exe)){
      $array=$re;
    }
    echo json_encode($array);
 }else{
      echo "0";
 }
?>
