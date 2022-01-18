<?php
include "vista/header.php";
?>
    <title>REGISTRO DE APERTURA</title>
<?php
include "vista/nav.php";
?>  
         
      <center>
<?php

        include "aperturadecaja.php";

        if(isset($_GET["id_apertura"])){
            $id_apertura=$_GET["id_apertura"];
            $apertura = new Apertura("","","","","","");
            $apertura->getbyId($id_apertura);
            $nombre = $apertura->getnombre(); 
            $apellido = $apertura->getapellido();
            $saldo = $apertura->getsaldo();
            $fecha = $apertura->getfecha();
            $monto = $apertura->getmonto();        
        }
        else{
            $nombre = ""; 
            $apellido ="";
            $saldo ="";
            $fecha ="";
            $monto ="";
            $id_apertura=0;
        }
        
        if(isset($_POST["nombre"]) &&
        isset($_POST["apellido"]) &&
        isset($_POST["saldo"]) &&
        isset($_POST["fecha"]) &&
        isset($_POST["monto"]) &&
        isset($_POST["id_apertura"]) ){
            $id_apertura = $_POST["id_apertura"];
            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
            $saldo = $_POST["saldo"];
            $fecha = $_POST["fecha"];
            $monto = $_POST["monto"];
            $apertura = new Apertura($id_apertura, $nombre, $apellido,$saldo,$fecha,$monto);
            $apertura->conectar();
            $apertura->creartabla();
            if($id_apertura==0){
                //Es nuevo
                echo $apertura->guardar();
                header("Location: /practicaprofesional/Listadeapertura.php");
                ob_end_flush();
                exit;
            }
            else{
                //Modificar
                echo $apertura->modificar($id_apertura);
                header("Location: /practicaprofesional/Listadeapertura.php");                
            }                        
        }    
        
      
    ?>

 <div class="content-wrapper">        
    <!-- Main content -->
    <section class="content">
    <div class="modal-dialog text-center">
            <div class="col-md-13 main-section">
            <div class="modal-content">
            <div><h3>Registro de Apertura</h3></div>
                    <div class="panel-body">
                                                <form method="Post" action="almacen_apertura.php">
                                                <div class="form-group">
                                
                               <i> <input type="hidden" class="form-control" name="id_apertura" id="id_apertura" placeholder="" required value="<?PHP echo $id_apertura ?>"></i>
                                
                            </div>
                            <div class="form-group">
                                <label>Nombre:</label>
                                <i><input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" pattern="[a-zA-Z0-9,ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ]{5,60}" required value="<?PHP echo $nombre ?>"></i>
                            </div>
                        
                            <div class="form-group">
                                <label>Apellido:</label>
                                <i><input type="text" class="form-control" name="apellido" id="apellido" placeholder="Apellido" required value="<?PHP echo $apellido ?>"></i>
                            </div>

                            <div class="form-group">
                                <label>Saldo:</label>
                                <i><input type="text" class="form-control" name="saldo" id="saldo" placeholder="Saldo"   required value="<?PHP echo $saldo ?>"></i>
                            </div>

                            <div class="form-group">
                                <label>Fecha y Hora:</label>
                                <i><input type="datetime-local" class="form-control" name="fecha" id="fecha"    required value="<?PHP echo $fecha ?>"></i>
                            </div>

                            <div class="form-group">
                                <label>Monto Inicial:</label>
                                <i><input type="text" class="form-control" name="monto" id="monto" placeholder="Monto"  required value="<?PHP echo $monto ?>"></i>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Guardar</button>
                                <a href="listausuarios.php" class="btn btn-danger"><i class="fa fa-arrow-circle-left"></i> Cancelar</a>
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