<?php

require('class_lib/class_conecta_mysql.php');
require('class_lib/funciones.php');
$db=new ConexionMySQL();
$art=test_input($_POST['articulo']);
$cadena=$db->consulta("Select codigo, descripcion, precio_compra, precio_venta from articulos where descripcion like '%$art%'");
if($db->numero_de_registros($cadena)>0){
    echo "<table class='table table-bordered table-hover'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Codigo</th>";
    echo "<th>Descripcion</th>";
    echo "<th>Precio Compra.</th>";
    echo "<th>Precio Venta.</th>";
    echo "<th>Agregar</th>";
    echo "<tbody>";
  while($gt=$db->buscar_array($cadena)){
    echo "<tr>";
    echo "<td>".$gt['codigo']."</td>";
    echo "<td>".$gt['descripcion']."</td>";
    echo "<td>".$gt['precio_compra']."</td>";
    echo "<td>".$gt['precio_venta']."</td>";
    echo "<td><button type='button' id='".$gt['codigo']."' class='btn btn-primary btn-xs' onclick='add_art(this.id);'><i class='fa fa-reply'></i></button></td>";
    echo "</tr>";
  }
  echo "</tbody>";
  echo "</table>";
}else{
  echo "<div class='callout callout-danger'>No se encontraron coincidencias...</div>";
}

?>