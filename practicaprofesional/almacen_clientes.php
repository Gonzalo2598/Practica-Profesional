<?php
include "vista/header.php";
?>
    <title>Clientes</title>
<?php
include "vista/nav_mesero.php";
?>    
<!-- Header Navbar -->
         
      <center>
<?php

        include "clientes.php";

        if(isset($_GET["id_cliente"])){
            $id_cliente=$_GET["id_cliente"];
            $clientes = new Clientes("","", "");
            $clientes->getbyId($id_cliente);
            $nombre_empresa = $clientes->getnombre_empresa(); 
            $telefono= $clientes->gettelefono();       
        }
        else{
            $nombre_empresa = ""; 
            $telefono= ""; 
            $id_cliente=0;
        }
        
        if(isset($_POST["nombre_empresa"]) &&
        isset($_POST["telefono"]) &&
        isset($_POST["id_cliente"]) ){
            $id_cliente = $_POST["id_cliente"];
            $nombre_empresa = $_POST["nombre_empresa"];
            $telefono  = $_POST["telefono"];
            $clientes = new Clientes($id_cliente, $nombre_empresa, $telefono );
            $clientes->conectar();
            $clientes->creartabla();
            if($id_cliente==0){
                //Es nuevo
                echo $clientes->guardar();
                header("Location: /practicaprofesional/Lista_clientes.php");
                ob_end_flush();
                exit;
            }
            else{
                //Modificar
                echo $clientes->modificar($id_cliente);
                header("Location: /practicaprofesional/Lista_clientes.php");                
            }                        
        }    
        
      
    ?>

 <div class="content-wrapper">        
    <!-- Main content -->
    <section class="content">
    <div class="modal-dialog text-center">
            <div class="col-md-13 main-section">
            <div class="modal-content">
            <div><h3>Registrar Clientes</h3></div>
                    <div class="panel-body">
                                                <form method="Post" action="almacen_clientes.php">
                                                <div class="form-group">
                                
                               <i> <input type="hidden" class="form-control" name="id_cliente" id="id_cliente" placeholder="" required value="<?PHP echo $id_cliente ?>"></i>
                                
                            </div>
                            <div class="form-group">
                                <label>Nombre:</label>
                                <i><input type="text" class="form-control" name="nombre_empresa" id="nombre_empresa" placeholder="Nombre" pattern="[a-zA-Z0-9,ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ]{5,60}" required value="<?PHP echo $nombre_empresa ?>"></i>
                            </div>
                        
                            <div class="form-group">
                                <label>Telefono:</label>
                                <i><input type="text" class="form-control" name="telefono" id="telefono" placeholder="Telefono" pattern="[a-zA-Z0-9,ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ]{5,60}" required value="<?PHP echo $telefono ?>"></i>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Guardar</button>
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