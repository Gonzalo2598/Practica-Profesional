
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <title>Parametros</title>
    <?php include "./class_lib/links.php"; ?>
  </head>
  <body>

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
        include('class_lib/sidebar.php');
        include('class_lib/class_conecta_mysql.php');
        ?>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          Parametros
              <small> > de la aplicacion</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="inicio.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Parametros de Aplicacion</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
         <div class='row'>
         <div class='col-md-3'>
         <div class='box box-warning'>
         <div class="box-header with-border">
         <h3 class='box-title'>Establece numero de Caja.</h3>
         </div>
         <div class='box-body'>
         <div class='form-group'>
         <label>Numero de Caja establecida actualmente...</label>
         <select class='form-control' id='numcaja'>
         <?php
         echo "<option value='$_SESSION[numero_de_caja]'>Caja ".$_SESSION['numero_de_caja']."</option>"
         ?>
         <option value='0'>Deshabilitar</option>
         <option value='1'>Caja 1</option>
         <option value='2'>Caja 2</option>
         <option value='3'>Caja 3</option>
         <option value='4'>Caja 4</option>
         </select>
         <br>
         <button type='button' class='btn btn-danger' onclick='establece_caja();' id='btn-caja'>Establecer</button>
         </div>
         </div>
         </div>
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
    <script src="dist/js/source_parameters.js"></script>
  </body>
</html>