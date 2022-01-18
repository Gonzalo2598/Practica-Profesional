<?php

require('class_lib/class_conecta_mysql.php');

$db=new ConexionMySQL();
$db->consulta("SET NAMES 'utf8'");
$cadena="select id_prov, nombre_empresa from proveedores order by id_prov";
$exe=$db->consulta($cadena);
 if($db->numero_de_registros($exe)>0){
   echo "<select class='form-control select2' id='proveedor' style='width: 100%;' onchange='actualiza_prov_temp();'>";
    while($re=$db->buscar_array($exe)){
     echo "<option value=$re[id_prov]>$re[nombre_empresa]</option>";
     }
    echo "</select>";
   }
?>
