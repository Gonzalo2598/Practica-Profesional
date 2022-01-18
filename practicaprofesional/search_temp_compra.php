<?php

require('class_lib/class_conecta_mysql.php');
$db=new ConexionMySQL();

$busca_entrada="Select * from temp2 where tipo='EC'";
$exec=$db->consulta($busca_entrada);
if($db->numero_de_registros($exec)>0){
  $array=array();
  $i=0;
  while($data=$db->buscar_array($exec)){
    $array[$i]=$data;
    $i++;
  }
  echo json_encode($array);
}else{
  echo "0";
}
?>