<?php
include "vista/header.php";
?>
    <title>REGISTRO DE PROVEEDORES</title>
<?php
include "vista/nav.php";
?>  
        
      <center>
<?php

        include "proveedores.php";

        if(isset($_GET["id_prov"])){
            $id_prov=$_GET["id_prov"];
            $proveedores = new Proveedores("","","");
            $proveedores->getbyId($id_prov);
            $nombre_empresa = $proveedores->getnombre_empresa(); 
            $telefono = $proveedores->gettelefono();       
        }
        else{
            $nombre_empresa = ""; 
            $telefono = ""; 
            $id_prov=0;
        }
        
        if(isset($_POST["nombre_empresa"]) &&
        isset($_POST["telefono"]) &&
        isset($_POST["id_prov"]) ){
            $id_prov = $_POST["id_prov"];
            $nombre_empresa = $_POST["nombre_empresa"];
            $telefono  = $_POST["telefono"];
            $proveedores = new Proveedores($id_prov, $nombre_empresa, $telefono);
            $proveedores->conectar();
            $proveedores->creartabla();
            if($id_prov==0){
                //Es nuevo
                echo $proveedores->guardar();
                header("Location: /practicaprofesional/Lista_proveedores.php");
                ob_end_flush();
                exit;
            }
            else{
                //Modificar
                echo $proveedores->modificar($id_prov);
                header("Location: /practicaprofesional/Lista_proveedores.php");                
            }                        
        }    
        
      
    ?>

 <div class="content-wrapper">        
    <!-- Main content -->
    <section class="content">
    <div class="modal-dialog text-center">
            <div class="col-md-13 main-section">
            <div class="modal-content">
            <div><h3>Registrar Proveedores</h3></div>
                    <div class="panel-body">
                                                <form method="Post" action="almacen_proveedores.php">
                                                <div class="form-group">
                                
                               <i> <input type="hidden" class="form-control" name="id_prov" id="id_prov" placeholder="" required value="<?PHP echo $id_prov ?>"></i>
                                
                            </div>
                            <div class="form-group">
                                <label>Proveedor:</label>
                                <i><input type="text" class="form-control" name="nombre_empresa" id="nombre_empresa" placeholder="Nombre Empresa"  required value="<?PHP echo $nombre_empresa ?>"></i>
                            </div>
                        
                            <div class="form-group">
                                <label>Telefono:</label>
                                <i><input type="text" class="form-control" name="telefono" id="telefono" placeholder="Telefono" required value="<?PHP echo $telefono ?>"></i>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Guardar</button>
                                <a href="almacen_proveedores.php" class="btn btn-danger"><i class="fa fa-arrow-circle-left"></i> Cancelar</a>
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
<!-- Main Footer -->
<center>
<?php
include "vista/footer.php";
?>  