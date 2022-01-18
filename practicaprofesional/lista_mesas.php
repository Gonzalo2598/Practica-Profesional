<html>
  <head>
    <title>Mesas</title>
    <?php include "./class_lib/links.php"; ?>
    <?php include "conexionusuarios.php"; ?>
  </head>
  <body onload="pone_lista_registro_mesas();">

    <div class="wrapper">

      <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <?php
        include('class_lib/nav_header.php');
        ?>

      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <?php
        include('class_lib/sidebar_administrador.php');
        
        ?>
        
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      
        <!-- Content Header (Page header) -->
        

        <!-- Main content -->
 
<div class="modal fade" id="producto">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Apertura de Caja</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form-crear-producto">
                
                <div class="form-group">
                  <label for="marca">Estado Mesa</label>
                  <input id="estado_mesa" type="text" class="form-control" value="" placeholder="Ingrese Monto" ></input>
                </div>

                <div class="form-group">
                  <label for="estado">Estado Pago</label>
                <input  id="estado_pago" type="text"  class="form-control" ></input>
                </div>

              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-success"  onclick='registra_mesas();' id='btn-reg-mesa'>Guardar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    
    <!-- Contenido de la pagina -->
  <!-- Content Wrapper. Contains page content -->

  
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <button  data-toggle="modal" data-target="#producto" class="btn btn-success btn-lg" type="button"><i class='fa fa fa-edit'></i>Agregar Mesas</button>
    
    <section class="content-header">
      <div class="container-fluid">
      <div class="row mb-2">
      <div class="col-sm-6">
      </div>

      

        </div>
      </div><!-- /.container-fluid -->
    </section>
    
    
    
    
   

         <div class='col-md-12'>
         <div id='lista_mesas'></div>
         </div>
         </div>
          <!-- Your Page Content Here -->

        </section><!-- /.content -->
         </div><!-- /.content-wrapper -->



      <!-- Main Footer -->
      <?php
      include('class_lib/main_fotter.php');
      ?>


      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->
    <div class="MsjAjaxForm"></div>
    <?php include "./class_lib/scripts.php"; ?>
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <script src="dist/js/source_mesas.js"></script>
  </body>
</html>