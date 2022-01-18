<?php
include "vista/header.php";
?>
    <title>Marcas</title>
<?php
include "vista/nav.php";
?>  
         
         <center>
<?php

        include "categorias.php";

        if(isset($_GET["id_cat"])){
            $id_cat=$_GET["id_cat"];
            $categorias = new Categorias("","");
            $categorias->getbyId($id_cat);
            $nombre_cat = $categorias->getnombre_cat(); 
                   
        }
        else{
            $nombre_cat = ""; 
            $id_cat=0;
        }
        
        if(isset($_POST["nombre_cat"]) &&
        isset($_POST["id_cat"]) ){
            $id_cat = $_POST["id_cat"];
            $nombre_cat = $_POST["nombre_cat"];
            $categorias = new Categorias($id_cat, $nombre_cat);
            $categorias->conectar();
            $categorias->creartabla();
            if($id_cat==0){
                //Es nuevo
                echo $categorias->guardar();
                header("Location: /practicaprofesional/Lista_categorias.php");
                ob_end_flush();
                exit;
            }
            else{
                //Modificar
                echo $categorias->modificar($id_cat);
                header("Location: /practicaprofesional/Lista_categorias.php");                
            }                        
        }    
        
      
    ?>

 <div class="content-wrapper">        
    <!-- Main content -->
    <section class="content">
    <div class="modal-dialog text-center">
            <div class="col-md-13 main-section">
            <div class="modal-content">
            <div><h3>Registrar Categorias</h3></div>
                    <div class="panel-body">
                                                <form method="Post" action="almacencategorias.php">
                                                <div class="form-group">
                                
                               <i> <input type="hidden" class="form-control" name="id_cat" id="id_cat" placeholder="" required value="<?PHP echo $id_cat ?>"></i>
                                
                            </div>
                            <div class="form-group">
                                <label>Categoria:</label>
                                <i><input type="text" class="form-control" name="nombre_cat" id="nombre_cat" placeholder="Nombre Categoria"  required value="<?PHP echo $nombre_cat ?>"></i>
                            </div>
                        
                            

                            <div class="form-group">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Guardar</button>
                                <a href="almacencategorias.php" class="btn btn-danger"><i class="fa fa-arrow-circle-left"></i> Cancelar</a>
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