<?php
include "vista/header.php";
?>
    <title>Compras</title>
<?php
include "vista/nav.php";
?>  
<!-- Header Navbar -->
<center>
<?php

        include "compras.php";

        if(isset($_GET["id_compra"])){
            $id_compra=$_GET["id_compra"];
            $compra = new Compras("","","","","","","");
            $compra->getbyId($id_compra);
            $id_prov = $compra->getid_prov();
            $id_caja =  $compra->getid_caja();
            $fecha = $compra->getfecha();
            $descuento_porcentaje=$compra->getdescuento_porcentaje();
            $impuesto_porcentaje=$compra->getimpuesto_porcentaje();
            $total=$compra->gettotal();       

        }
        else{
        
            $id_prov= "";
            $id_caja ="";
            $fecha="";
            $descuento_porcentaje="";
            $impuesto_porcentaje="";
            $total="";
            $id_compra=0;
        }
        
        if(isset($_POST["id_prov"]) &&
        isset($_POST["id_caja"]) &&
        isset($_POST["fecha"]) &&
        isset($_POST["descuento_porcentaje"]) &&
        isset($_POST["impuesto_porcentaje"]) &&
        isset($_POST["total"]) &&
        isset($_POST["id_compra"])){
            $id_compra = $_POST["id_compra"];
            $id_prov = $_POST["id_prov"];
            $id_caja = $_POST["id_caja"];
            $fecha = $_POST["fecha"];
            $descuento_porcentaje = $_POST["descuento_porcentaje"];
            $impuesto_porcentaje = $_POST["impuesto_porcentaje"];
            $total = $_POST["total"];
            $compra = new Compras($id_prov,$id_caja,$fecha,$descuento_porcentaje,$impuesto_porcentaje,$total);
            $compra->conectar();
            $compra->creartabla();

            
            if($id_compra==0){
                //Es nuevo
                echo $compra->guardar();
                header("Location: /practicaprofesional/registro_compras.php");
                ob_end_flush();
                exit;
            }
            else{
                //Modificar
                echo $compra->modificar($id_compra);
                header("Location: /practicaprofesional/registro_compras.php");                
            }                        
        }    
        
      
    ?>

    
    <!-- Main content -->
    <section class="content">
    <div class="modal-dialog text-center">
            <div class="col-md-13 main-section">
            <div class="modal-content">
            <div><h3>Modificar Registros de Compras</h3></div>
                    <div class="panel-body">
                     <form method="POST" action="almacen_compras.php">
                            <div class="form-group">
                            <label>Proveedor</label>
                            
                            <i><input type="text" class="form-control" name="id_prov" id="id_prov" placeholder="Proveedor"  required value="<?PHP echo $id_prov ?>"></i>
                            </div>
                        
                            <div class="form-group">
                                <label>Caja:</label>
                                <i><input type="text" class="form-control" name="id_caja" id="id_caja" placeholder="Caja"  required value="<?PHP echo $id_caja ?>"></i>
                            </div>
                            <div class="form-group">
                                <label>Fecha:</label>
                                <i><input type="text" class="form-control" name="fecha" id="fecha" placeholder="Fecha"  required value="<?PHP echo $fecha ?>"></i>
                            </div>
                        
                            <div class="form-group">
                                <label>Descuento:</label>
                                <i><input type="text" class="form-control" name="descuento_porcentaje" id="descuento_porcentaje" placeholder="Descuento"  required value="<?PHP echo $descuento_porcentaje ?>"></i>
                            </div>
                            <div class="form-group">
                                <label>Impuesto:</label>
                                <i><input type="text" class="form-control" name="impuesto_porcentaje" id="impuesto_porcentaje" placeholder="Precio de venta"  required value="<?PHP echo $impuesto_porcentaje ?>"></i>
                            </div>
                            <div class="form-group">
                                <label>Total:</label>
                                <i><input type="text" class="form-control" name="total" id="total" placeholder="Total"  required value="<?PHP echo $total ?>"></i>
                            </div>
                            <i> <input type="hidden" class="form-control" name="id_compra" id="id_compra" placeholder="" required value="<?PHP echo $id_compra ?>"></i>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Modificar</button>
                                <a href="almacen_compras.php" class="btn btn-danger"><i class="fa fa-arrow-circle-left"></i> Cancelar</a>
                                </div>
                          </form>
                    </div>
                <div>
                </div>
                <div>
                <!-- /.box -->
                </section>
</center>
<!-- Main Footer -->

        <!-- To the right -->
<?php
include "vista/footer.php";
?>  