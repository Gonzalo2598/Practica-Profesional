<?php
include "vista/header.php";
?>
    <title>Mesas</title>
<?php
include "vista/nav_mesero.php";
?>    
<!-- Header Navbar -->
         
      <center>
<?php

        include "mesas.php";

        if(isset($_GET["id_mesa"])){
            $id_mesa=$_GET["id_mesa"];
            $mesas = new Mesas("","", "");
            $mesas->getbyId($id_mesa);
            $estado_mesa = $mesas->getestado_mesa(); 
            $estado_pago= $mesas->getestado_pago();       
        }
        else{
            $estado_mesa = ""; 
            $estado_pago= ""; 
            $id_mesa=0;
        }
        
        if(isset($_POST["estado_mesa"]) &&
        isset($_POST["estado_pago"]) &&
        isset($_POST["id_mesa"]) ){
            $id_mesa = $_POST["id_mesa"];
            $estado_mesa = $_POST["estado_mesa"];
            $estado_pago  = $_POST["estado_pago"];
            $mesas = new Mesas($id_mesa, $estado_mesa, $estado_pago );
            $mesas->conectar();
            $mesas->creartabla();
            if($id_mesa==0){
                //Es nuevo
                echo $mesas->guardar();
                header("Location: /practicaprofesional/estados_mesas.php");
                ob_end_flush();
                exit;
            }
            else{
                //Modificar
                echo $mesas->modificar($id_mesa);
                header("Location: /practicaprofesional/estados_mesas.php");                
            }                        
        }    
        
      
    ?>

 <div class="content-wrapper">        
    <!-- Main content -->
    <section class="content">
    <div class="modal-dialog text-center">
            <div class="col-md-13 main-section">
            <div class="modal-content">
            <div><h3>Cambiar estados</h3></div>
                    <div class="panel-body">
                                                <form method="Post" action="almacen_mesas.php">
                                                <div class="form-group">
                                
                               <i> <input type="hidden" class="form-control" name="id_mesa" id="id_mesa" placeholder="" required value="<?PHP echo $id_mesa ?>"></i>
                                
                            </div>
                            <div class="form-group">
                                <label>Estado Mesa:</label>
                                <i><input type="text" class="form-control" name="estado_mesa" id="estado_mesa" placeholder="Estado Mesa"  required value="<?PHP echo $estado_mesa ?>"></i>
                            </div>
                        
                            <div class="form-group">
                                <label>Estado Pago:</label>
                                <i><input type="text" class="form-control" name="estado_pago" id="estado_pago" placeholder="Estado Pago" required value="<?PHP echo $estado_pago ?>"></i>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Modificar</button>
                                <a href="lista_clientes.php" class="btn btn-danger"><i class="fa fa-arrow-circle-left"></i> Cancelar</a>
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