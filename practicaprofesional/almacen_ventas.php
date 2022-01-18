<?php
ob_start();
?>
<html>
  <head>
    <title>Ventas</title>
    <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Main CSS -->
<link rel="stylesheet" href="./css/main.css">
<!-- Ionicons -->
<link rel="stylesheet" href="dist/css/ionicons.css">
<!-- iCheck -->
<link rel="stylesheet" href="plugins/iCheck/square/blue.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  
 <!-- jQuery 3.1.1 -->
 <script src="./js/jquery-3.1.1.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="./js/bootstrap.min.js"></script>
<!-- Script AjaxForms-->
<script src="./js/AjaxForms.js"></script>
<!-- Sweet Alert 2-->
<script src="./js/sweetalert2.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.js"></script>
<!-- Script main-->
<script src="./js/main.js"></script>    <script src="plugins/fastclick/fastclick.min.js"></script>
    <script src="dist/js/source_lines.js"></script>
    <script src="plugins/jtable/jquery-ui.js" type="text/javascript"></script>
    <script src="plugins/jtable/jquery.jtable.js" type="text/javascript"></script>
    <script src="dist/js/source_clients.js"></script>
</head>
  <body>
    
    </a>
<!-- Header Navbar -->
         
      <center>
<?php

        include "ventas.php";

        if(isset($_GET["id_vta"])){
            $id_vta=$_GET["id_vta"];
            $ventas= new Ventas("","","","","");
            $ventas->getbyId($id_vta);
            $id_art = $ventas->getid_art(); 
            $id_cliente = $ventas->getid_cliente();
            $fecha = $ventas->getfecha();
            $total = $ventas->gettotal();
        }
        else{
            $id_art = "";
            $id_cliente = "";
            $fecha = ""; 
            $total ="";
            $id_vta =0;
        }
        
        if(isset($_POST["id_art"]) &&
        isset($_POST["id_cliente"]) &&
        isset($_POST["fecha"]) &&
        isset($_POST["total"]) &&
        isset($_POST["id_vta"]) ){
            $id_vta = $_POST["id_vta"];
            $id_art = $_POST["id_art"];
            $id_cliente = $_POST["id_cliente"];
            $fecha= $_POST["fecha"];
            $total = $_POST["total"];
            $ventas = new Ventas($id_art, $id_cliente, $fecha, $total);
            $ventas->conectar();
            $ventas>creartabla();
            if($id_vta==0){
                //Es nuevo
                echo $ventas->guardar();
                header("Location: /practicaprofesional/Listas_ventas.php");
                ob_end_flush();
                exit;
            }
            else{
                //Modificar
                echo $ventas->modificar($id_vta);
                header("Location: /practicaprofesional/Listas_ventas.php");                
            }                        
        }    
        
      
    ?>

 <div class="content-wrapper">        
    <!-- Main content -->
    <section class="content">
    <div class="modal-dialog text-center">
            <div class="col-md-13 main-section">
            <div class="modal-content">
            <div><h3>Ventas</h3></div>
                    <div class="panel-body">
                                                <form method="Post" action="almacen_ventas.php">
                                                <div class="form-group">
                                
                               <i> <input type="hidden" class="form-control" name="id_vta" id="id_vta" placeholder="" required value="<?PHP echo $id_vta ?>"></i>
                                
                            </div>
                            <div class="form-group">
                                <label>Id articulos:</label>
                                <i><input type="text" class="form-control" name="id_art" id="id_art" placeholder="Id de articulo"  required value="<?PHP echo $id_art ?>"></i>
                            </div>

                            <div class="form-group">
                                <label>Id cliente:</label>
                                <i><input type="text" class="form-control" name="id_cliente" id="id_cliente" placeholder="Id de cliente" required value="<?PHP echo $id_cliente ?>"></i>
                            </div>

                            <div class="form-group">
                                <label>Fecha:</label>
                                <i><input type="text" class="form-control" name="fecha" id="fecha" placeholder="Fecha"  required value="<?PHP echo $fecha ?>"></i>
                            </div>
                        
                            <div class="form-group">
                                <label>Total:</label>
                                <i><input type="password" class="form-control" name="total" id="total" placeholder="Total"   required value="<?PHP echo $total ?>"></i>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Guardar</button>
                                <a href="listas_ventas.php" class="btn btn-danger"><i class="fa fa-arrow-circle-left"></i> Cancelar</a>
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
<footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
          
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2021 Soluciones en Informatica ISDM | <a href=''></a></strong> 
      </footer>


      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->
    <div class="MsjAjaxForm"></div>
   

  </body>
</html>