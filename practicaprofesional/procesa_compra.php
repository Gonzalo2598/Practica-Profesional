<?php



include_once "base_de_datos.php";
$fecha =$_POST['fecha'];
$codigo=$_POST['codigo'];
$cantidad=$_POST['cantidad'];
$costou=$_POST['costou'];
$proveedor=$_POST['proveedor'];
$descuento=$_POST['descuento'];
if($descuento==""){
  $descuento=0.00;
}
$iva=$_POST['tasa_iva'];
$total=($cantidad*$costou);
$total2=($total*$descuento/100);
$total3=($total-$total2);
$total4=($total3*$iva/100);
$total5=($total4+$total3);
$caja=$_POST['num_fact'];
try{
      $sentencia1 = $base_de_datos->prepare("INSERT INTO compras(id_prov, id_caja,fecha,descuento_porcentaje,impuesto_porcentaje,total) VALUES (?, ?, ?, ?, ?, ?);");
      $sentencia1->execute([$proveedor,$caja,$fecha, $descuento,$iva,$total5]);
      

      $sentencia2 = $base_de_datos->prepare("SELECT id_compra FROM compras ORDER BY id_compra DESC LIMIT 1;");
      $sentencia2->execute();
      $resultado1 = $sentencia2->fetch(PDO::FETCH_OBJ);
      $id_compra = $resultado1 === false ? 1 : $resultado1->id_compra;

      $sentencia3 = $base_de_datos->prepare("SELECT id_art FROM Articulos where codigo='$codigo';");
      $sentencia3->execute();
      $resultado2 = $sentencia3->fetch(PDO::FETCH_OBJ);
      $id_art = $resultado2 === false ? 1 : $resultado2->id_art;

      $base_de_datos->beginTransaction();
      $sentencia4 = $base_de_datos->prepare("INSERT INTO detalles_compras(id_compra, id_art, cantidad,precio_unitario) VALUES (?, ?, ?,?);");
      $sentenciaExistencia = $base_de_datos->prepare("UPDATE Articulos SET existencia = existencia + ? WHERE id_art = ?;");
      $sentencia4->execute([$id_compra, $id_art, $cantidad,$costou]);
      $sentenciaExistencia->execute([$cantidad, $id_art]);

      $base_de_datos->commit();
    }
    catch (Exception $e)
        {
            $base_de_datos->rollback();
            echo "Ocurrió un error al intentar grabar la compra! " . $e->getMessage();
        }
?>