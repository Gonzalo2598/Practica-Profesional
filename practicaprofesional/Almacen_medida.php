<?php
include "vista/header.php";
?>
    <title>Medidas</title>
<?php
include "vista/nav.php";
?>  
       
         
      <center>
<?php

        include "Medida.php";

        if(isset($_GET["id_medida"])){
            $id_medida=$_GET["id_medida"];
            $medidas = new Medidas("","");
            $medidas->getbyId($id_medida);
            $medida = $medidas->getmedida(); 
                   
        }
        else{
            $medida = ""; 
            $id_medida=0;
        }
        
        if(isset($_POST["medida"]) &&
        isset($_POST["id_medida"]) ){
            $id_medida = $_POST["id_medida"];
            $medida = $_POST["medida"];
            $medidas = new Medidas($id_medida, $medida);
            $medidas->conectar();
            $medidas->creartabla();
            if($id_medida==0){
                //Es nuevo
                echo $medidas->guardar();
                header("Location: /practicaprofesional/Lista_medidas.php");
                ob_end_flush();
                exit;
            }
            else{
                //Modificar
                echo $medidas->modificar($id_medida);
                header("Location: /practicaprofesional/Lista_medidas.php");                
            }                        
        }    
        
      
    ?>

 <div class="content-wrapper">        
    <!-- Main content -->
    <section class="content">
    <div class="modal-dialog text-center">
            <div class="col-md-13 main-section">
            <div class="modal-content">
            <div><h3>Registrar Medidas</h3></div>
                    <div class="panel-body">
                                                <form method="Post" action="Almacen_medida.php">
                                                <div class="form-group">
                                
                               <i> <input type="hidden" class="form-control" name="id_medida" id="id_medida" placeholder="" required value="<?PHP echo $id_medida ?>"></i>
                                
                            </div>
                            <div class="form-group">
                                <label>Marca:</label>
                                <i><input type="text" class="form-control" name="medida" id="medida" placeholder="Medida"  required value="<?PHP echo $medida ?>"></i>
                            </div>
                        
                            

                            <div class="form-group">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Guardar</button>
                                <a href="Almacen_medida.php" class="btn btn-danger"><i class="fa fa-arrow-circle-left"></i> Cancelar</a>
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