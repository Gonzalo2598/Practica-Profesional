<?php
include "vista/header.php";
?>
    <title>Marcas</title>
<?php
include "vista/nav.php";
?>  
         
         <center>
<?php

        include "marcas.php";

        if(isset($_GET["id_marca"])){
            $id_marca=$_GET["id_marca"];
            $marcas = new Marcas("","");
            $marcas->getbyId($id_marca);
            $nombre = $marcas->getnombre(); 
                   
        }
        else{
            $nombre = ""; 
            $id_marca=0;
        }
        
        if(isset($_POST["nombre"]) &&
        isset($_POST["id_marca"]) ){
            $id_marca = $_POST["id_marca"];
            $nombre = $_POST["nombre"];
            $marcas = new Marcas($id_marca, $nombre);
            $marcas->conectar();
            $marcas->creartabla();
            if($id_marca==0){
                //Es nuevo
                echo $marcas->guardar();
                header("Location: /practicaprofesional/Lista_marcas.php");
                ob_end_flush();
                exit;
            }
            else{
                //Modificar
                echo $marcas->modificar($id_marca);
                header("Location: /practicaprofesional/Lista_marcas.php");                
            }                        
        }    
        
      
    ?>

 <div class="content-wrapper">        
    <!-- Main content -->
    <section class="content">
    <div class="modal-dialog text-center">
            <div class="col-md-13 main-section">
            <div class="modal-content">
            <div><h3>Registrar Marcas</h3></div>
                    <div class="panel-body">
                                                <form method="Post" action="almacen_marcas.php">
                                                <div class="form-group">
                                
                               <i> <input type="hidden" class="form-control" name="id_marca" id="id_marca" placeholder="" required value="<?PHP echo $id_marca ?>"></i>
                                
                            </div>
                            <div class="form-group">
                                <label>Marca:</label>
                                <i><input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre Marca"  required value="<?PHP echo $nombre ?>"></i>
                            </div>
                        
                            

                            <div class="form-group">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Guardar</button>
                                <a href="lista_marcas.php" class="btn btn-danger"><i class="fa fa-arrow-circle-left"></i> Cancelar</a>
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