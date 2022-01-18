<?php
include "vista/header.php";
?>
    <title>Tipos</title>
<?php
include "vista/nav.php";
?>  
<!-- Header Navbar -->
         
      <center>
<?php

        include "tipodeusuarios.php";

        if(isset($_GET["id_tipo"])){
            $id_tipo=$_GET["id_tipo"];
            $tipo = new Tipos("","");
            $tipo->getbyId($id_tipo);
            $nombre_tipo = $tipo->getnombre_tipo();        
        }
        else{
            $nombre_tipo = "";
            $id_tipo=0;
        }
        
        if(isset($_POST["nombre_tipo"]) &&
        isset($_POST["id_tipo"]) ){
            $id_tipo = $_POST["id_tipo"];
            $nombre_tipo = $_POST["nombre_tipo"];
            $tipo = new Tipos($id_tipo, $nombre_tipo);
            $tipo->conectar();
            $tipo->creartabla();
            if($id_tipo==0){
                //Es nuevo
                echo $tipo->guardar();
                header("Location: /practicaprofesional/listar_tipos.php");
                ob_end_flush();
                exit;
            }
            else{
                //Modificar
                echo $tipo->modificar($id_tipo);
                header("Location: /practicaprofesional/listar_tipos.php");                
            }                        
        }    
        
      
    ?>

 <div class="content-wrapper">        
    <!-- Main content -->
    <section class="content">
    <div class="modal-dialog text-center">
            <div class="col-md-13 main-section">
            <div class="modal-content">
            <div><h3>Registrar Tipos de Roles</h3></div>
                    <div class="panel-body">
                                                <form method="Post" action="almacen_tipo.php">
                                                <div class="form-group">
                                
                               <i> <input type="hidden" class="form-control" name="id_tipo" id="id_tipo" placeholder="" required value="<?PHP echo $id_tipo ?>"></i>
                                
                            </div>
                            <div class="form-group">
                                <label>Tipos de Usuarios:</label>
                                <i><input type="text" class="form-control" name="nombre_tipo" id="nombre_tipo" placeholder="Tipo de Usuario" required value="<?PHP echo $nombre_tipo ?>"></i>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Guardar</button>
                                <a href="almacen_tipo.php" class="btn btn-danger"><i class="fa fa-arrow-circle-left"></i> Cancelar</a>
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
<?php
include "vista/footer.php";
?>  