
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <title>Punto de Venta </title>
    <?php include "./class_lib/links.php"; ?>
    <?php include "conexionusuarios.php"; ?>
    <link rel="stylesheet" href="plugins/select2/select2.min.css">
    <link rel="stylesheet" href="plugins/datepicker/css/bootstrap-datepicker3.css">
    
    
    
  </head>
  <body onload="pone_num_entrada();lista_proveedores();revisa_entrada_ini();">

    <div class="wrapper">

      <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <?php
        include('class_lib/nav_header.php');
        ?>

        

        
       <!-- /.sidebar -->
        

      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <?php
        include('class_lib/sidebar_cajero.php');
        require('class_lib/class_conecta_mysql.php');
        require('class_lib/funciones.php');
        $db=new ConexionMySQL();
        $sql="SELECT id_caja from cajas where estado=1";
        $id_caja=$db->consulta($sql);

        while($row=mysql_fetch_assoc($id_caja)){
        $idcaja=$row["id_caja"];
        }
        if($idcaja==0){
          echo '<script language="javascript">alert("Abra una Caja para Realizar una venta...");
          window.location="lista_administracion_cajas.php";
          </script>';
        }
        else{
          '<script language="javascript">
          window.location="entrada_compra.php";
          </script>';
        }
        ?>
      
       
        <!-- /.sidebar -->
      </aside>
      
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Pedidos Entregados</h4>
      </div>
      <div class="modal-body">
      <?php


 $con = new conexion();
 $conn = new mysqli($con->getservername(), $con->getusername(), $con->getpassword(), $con->getdbname());                
 $sql = "SELECT id_pedido,c.nombre_empresa,mozo,mesa,codigo,precio_uni,cantidad,total,descripcion_articulo,fecha_entrega,estado_pedido from pedidos p INNER JOIN clientes c ON p.id_cliente=c.id_cliente where estado_pedido='Entregado'AND id_user !=6 ORDER BY id_pedido asc";
 $resultarticulo = $conn->query($sql);
 echo "<div><table >
     <tr> 
     <th style='width:8%'> PEDIDO</th>
     <th style='width:8%'>CLIENTE</th>
     <th style='width:8%'>MOZO</th>          
     <th style='width:8%'>MESA</th>
     <th style='width:8%'>CODIGO</th>
     <th style='width:8%'>PRECIO</th>
     <th style='width:8%'>CANTIDAD</th>
     <th style='width:8%'>TOTAL</th>
     <th style='width:8%'>DESCRIPCION.</th>
     <th style='width:8%'>FECHA ENTREGA</th>
     <th style='width:8%'>ESTADO PEDIDO</th>
     </tr>";
 if ($resultarticulo->num_rows > 0) {
     while($row = $resultarticulo->fetch_assoc()) {
         
         echo "<tr >  
         
                 <td align='center'>" . $row["id_pedido"] . "</td>

                 <td align='center'>" . $row["nombre_empresa"] . "</td>

                 <td align='center'>" . $row["mozo"] . "</td>
                          
                 <td align='center'>" . $row["mesa"] . "</td>

                 <td align='center'>" . $row["codigo"] . "</td>

                 <td align='center'>" . $row["precio_uni"] . "</td>

                 <td align='center'>" . $row["cantidad"] . "</td>

                 <td align='center'>" . $row["total"] . "</td>

                 <td align='center'>" . $row["descripcion_articulo"] . "</td>

                 <td align='center'>" . $row["fecha_entrega"] . "</td>

                 <td align='center'>" . $row["estado_pedido"] . "</td>

                 
              </tr>";
     }
 } 
 echo "</table></div>";
 
 $conn->close();





?>  



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    
  </div>
</div>
      
<!-- Modal inicio-->
<div id="myDelivery" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Pedidos Entregados</h4>
      </div>
      <div class="modal-body">
      <?php


 $con = new conexion();
 $conn = new mysqli($con->getservername(), $con->getusername(), $con->getpassword(), $con->getdbname());                
 $sql = "SELECT id_pedido,c.nombre_empresa,u.usuario,codigo,precio_uni,cantidad,total,descripcion_articulo,fecha_entrega,estado_pedido from pedidos p INNER JOIN clientes c ON p.id_cliente=c.id_cliente INNER JOIN usuarios u ON p.id_user=u.id_user where estado_pedido='Entregado' ORDER BY id_pedido asc";
 $resultarticulo = $conn->query($sql);
 echo "<div><table >
     <tr> 
     <th style='width:8%'> PEDIDO</th>
     <th style='width:8%'>CLIENTE</th>
     <th style='width:8%'>CADETE</th>  
     <th style='width:8%'>CODIGO</th>
     <th style='width:8%'>PRECIO</th>
     <th style='width:8%'>CANTIDAD</th>
     <th style='width:8%'>TOTAL</th>
     <th style='width:8%'>DESCRIPCION.</th>
     <th style='width:8%'>FECHA ENTREGA</th>
     <th style='width:8%'>ESTADO PEDIDO</th>
     </tr>";
 if ($resultarticulo->num_rows > 0) {
     while($row = $resultarticulo->fetch_assoc()) {
         
         echo "<tr >  
         
                 <td align='center'>" . $row["id_pedido"] . "</td>

                 <td align='center'>" . $row["nombre_empresa"] . "</td>

                 <td align='center'>" . $row["usuario"] . "</td>

                 <td align='center'>" . $row["codigo"] . "</td>

                 <td align='center'>" . $row["precio_uni"] . "</td>

                 <td align='center'>" . $row["cantidad"] . "</td>

                 <td align='center'>" . $row["total"] . "</td>

                 <td align='center'>" . $row["descripcion_articulo"] . "</td>

                 <td align='center'>" . $row["fecha_entrega"] . "</td>

                 <td align='center'>" . $row["estado_pedido"] . "</td>

                 
              </tr>";
     }
 } 
 echo "</table></div>";
 
 $conn->close();





?>  



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    
  </div>
</div>

      

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            
          Punto de Venta 
            
          </h1>
          <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">Pedidos</button>
          <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myDelivery">Delivery</button>
          <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Punto de Venta.</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Your Page Content Here -->
          <div class='row'>
          <div class='col-md-4'>
           <div class='box box-primary'>
           <div class='box-header with-border'>
           <h3 class='box-title'>Datos de Venta...</h3>
           </div>
           <div class='box-body'>
            <form class='form-horizontal'>
            <div class='input-group'>
             <span class='input-group-addon bg-blue'>Cliente:</span>
             <div id='pone_provs'></div>
            </div>
            <br>
            <div class='input-group'>
             <span class='input-group-addon bg-blue'><i class="fa fa-download"></i> Caja:</span>
             <?Php
              
              $con = new conexion();
              $conn = new mysqli($con->getservername(), $con->getusername(), $con->getpassword(), $con->getdbname());                
              $sql = "SELECT id_caja FROM Cajas where estado=1";
              $result = $conn->query($sql);
              ?>
          
              <?php
              while($lista=mysqli_fetch_assoc($result))
              echo   "<input type='text' class='form-control' id='factura' onchange='actualiza_num_fac_entrada_temp();' value='".$lista["id_caja"]."' disabled>"; 
              ?>
             
            </div>
             <br>
             <div class='input-group'>
             <span class='input-group-addon bg-blue'><i class="fa fa-calendar"></i> Fecha:</span>
             
             <input type="text" class="form-control pull-right" id="fecha" onchange="actualiza_fecha_temp();" autocomplete="off">
            </div>
            <br>
            <div class='input-group'>
             <span class='input-group-addon  bg-blue'><i class="fa fa-database"></i> Mesa:</span>
             <?Php
              
              $con = new conexion();
             $conn = new mysqli($con->getservername(), $con->getusername(), $con->getpassword(), $con->getdbname());                
             $sql = "SELECT id_mesa FROM mesas WHERE estado_mesa='Ocupada'AND estado_pago='pendiente'";
             $result = $conn->query($sql);
             ?>
 
             <select  class="form-control"  id="impuesto" onchange="actualiza_impuesto_temp();">
             <option>Ninguna</option>
             <?php
             while($lista=mysqli_fetch_assoc($result))
             echo   "<option select value='".$lista["id_mesa"]."' > ".$lista['id_mesa']."</option>"; 
             ?>
             </select>
            </div>
            <br>
            <div class='input-group'>
             <span class='input-group-addon  bg-blue'><i class="fa fa-plus"></i> Pedidos:</span>
             <?Php
              
              $con = new conexion();
             $conn = new mysqli($con->getservername(), $con->getusername(), $con->getpassword(), $con->getdbname());                
             $sql = "SELECT id_pedido from pedidos WHERE estado_pedido='Entregado'";
             $result = $conn->query($sql);
             ?>
 
             <select  class="form-control"  id="descuento" onchange="actualiza_descuento_temp();">
             <option>Ninguno</option>
             <?php
             while($lista=mysqli_fetch_assoc($result))
             echo   "<option select value='".$lista["id_pedido"]."' > ".$lista['id_pedido']."</option>"; 
             ?>
             </select>
             
            </div>
            </form>
           </div>
           </div>
           </div>

           <div class='col-md-4'>
           <div class='box box-primary'>
           <div class='box-header with-border'>
           <h3 class='box-title'>Producto.</h3>
           </div>
           <div class='box-body'>
           <div class='input-group'>
             <span class='input-group-addon  bg-blue'><i class="fa fa-barcode"></i> Codigo:</span>
             <input type="text" class="form-control" id="codigo" onchange='busca_articulo();'
             style="font-size:20px; text-align:center; color:blue; font-weight: bold;" >
            </div>
            <br>
            <div class='input-group'>
             <span class='input-group-addon bg-blue'><i class="fa fa-code"></i> Producto:</span>
             <input type="text" class="form-control pull-right" id="descripcion" value='' disabled>
            </div>
            <br>
            <div class='input-group'>
             <span class='input-group-addon bg-blue'><i class="fa fa-usd"></i> Precio:</span>
             <input type="text" class="form-control pull-right cantidades" id="costo"
             data-inputmask="'alias': 'numeric', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'placeholder': '0'"
             style="font-size:20px; text-align:center; color:blue; font-weight: bold;" disabled>
            </div>
            <br>
            <div class='input-group'>
             <span class='input-group-addon bg-blue'><i class="fa fa-calculator"></i> Cantidad:</span>
             <input type="text" class="form-control pull-right cantidades" id="cantidad"
             data-inputmask="'alias': 'numeric', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'placeholder': '0'"
             style="font-size:20px; text-align:center; color:blue; font-weight: bold;" disabled>
            </div>
            <br>
            <div class='btn-group'>
            <button class='btn btn-primary' type='button' onclick='agrega_a_lista();' id='btn-add-article' disabled><i class='fa fa-download'></i> Agregar...</button>
            <button class='btn btn-danger' type='button' onclick='cancela_add();' id='btn-cancel-article' disabled><i class='fa fa-times'></i> Cancelar...</button>
            </div>
           </div>
           </div>
           </div>

           <div class='col-md-4'>
           <div class='box box-primary'>
           <div class='box-header with-border'>
            <div class='btn-group'>
           <button class='btn btn-primary' type='button' onclick='procesa_entrada();' id='btn-procesa' disabled><i class='fa fa-external-link'></i> Procesar entrada.</button>
            <button class='btn btn-danger' type='button' onclick='cancela_entrada_all();' id='btn-cancela' disabled><i class='fa fa-times'></i> Cancelar entrada.</button>
           </div>
           </div>
           <div class='box-body'>
           

            

            

            
           </div>
           </div>
           </div>
           <div class='col-md-12'>
           <div class='box box-success'>
           <div class='box-header with-border'>
           <h3 class='box-title'>Articulos en la entrada.</h3>
           </div>
           <div class='box-body table-responsice no-padding'>
           <table id='tabla_articulos' class='table table-hover'>
           <thead>
           <tr>
           <th>Codigo</th>
           <th>Descripcion</th>
           <th>Cantidad</th>
           <th>Costo U.</th>
           <th>Costo T.</th>
           <th>Eliminar</th>
           </tr>
           </thead>
           <tbody>

           </tbody>
           </table>
           </div>
           </div>
           </div>
           <input type='hidden' id='num_entrada2' value='0'>
          </div>

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
    <script src="plugins/select2/select2.full.min.js"></script>
    <script src="plugins/datepicker/js/bootstrap-datepicker.js"></script>
    <script src="plugins/datepicker/locales/bootstrap-datepicker.es.min.js"></script>
    <script src="plugins/number/jquery.inputmask.bundle.js"></script>
    <script src="plugins/noty/packaged/jquery.noty.packaged.min.js"></script>
    <script src="dist/js/source_almacen.js"></script>
    <script type='text/javascript'>
    $("#fecha").datepicker({
      language: "es",
      format: "yyyy-mm-dd"
    });

    $(document).ready(function(){
    $(".cantidades").inputmask();
    });

    $(document).ready(function(){
    $(".select2").select2();

    $(window).bind('beforeunload', function(){
         return 'Deseas salir de Entradas X Compra ? Si eliges que si y hay registros agregados a la entrada, quedara guardada pero no procesada, a menos que canceles la entrada temporalmente...';
        });
    });
    </script>
  </body>
</html>