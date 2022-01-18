<html>
  <head>
    <title>usuarios</title>
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
  





<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->  </head>
  <body onload="revisa_compras();revisa_ventas();pone_gastos();pone_users();genera_grafica();genera_grafica_existe();revisa_caducidades();">
    <div class="wrapper">

      <!-- Main Header -->
   
<center>
    <h1 align='center'>Lista de Ventas</h1>
    <?Php
       // include "libro.php";
       include "conexionusuarios.php";
        $con = new conexion();
        $conn = new mysqli($con->getservername(), $con->getusername(), $con->getpassword(), $con->getdbname());                
        $sql = "SELECT   id_vta, id_art, id_cliente, fecha, total FROM Ventas";
        $result = $conn->query($sql);
        echo "<div class='container'><table class='table table-hover' style='width:60%'>
            <tr> 
            <th style='width:10%'>ID_VTA</th>
                <th style='width:8%'>ID_ART</th>           
                <th style='width:10%'>ID_CLIENTE</th>
                <th style='width:10%'>FECHA</th>
                <th style='width:10%'>TOTAL/th>
                <th style='width:10%'>OPCIONES</th>
            </tr>";
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr >  
                
                        <td align='center'>" . $row["id_vta"] . "</td>
                        <td align='center'>" . $row["id_art"] . "</td> 
                        <td align='center'>" . $row["id_cliente"] . "</td> 
                        <td align='center'>" . $row["fecha"] . "</td>          
                        <td align='center'>" . $row["total"] . "</td>

                        <td align='center'>
                        
                        
                      
                     <div class='btn-group'>
                     <button type='button' class='btn btn-primary btn-md' data-toggle='dropdown'>
                     <span class='fa fa-cogs'></span>
  </button>
  <ul class='dropdown-menu' role='menu'>
    <li><a href='almacen_ventas.php?id_vta=" .$row["id_vta"] ."'>Modificar</a></li>
    <li><a class='btn-exit-user' href='eliminar_ventas.php?id_vta=" .$row["id_vta"] ."'>Borrar</a></li>
    <li> <a href='almacen_ventas.php'>Agregar</a></li>
  </ul>
</div>
                        
                        
</td>    
                     </tr>";
            }
        } 
        echo "</table></div>";
        $conn->close();
  
    ?>    
    
    
    </div>
           </form>
           </div>
          </div>
          <br>
          <div class='row'>
          <div class='col-md-12'>
          <div ></div>
          </div>
          </div>

        </section><!-- /.content -->
         </div><!-- /.content-wrapper -->


      <!-- Main Footer -->
      <footer class="main-footer">
        <!-- To the right -->
        
        <!-- Default to the left -->
        <strong>Copyright &copy; 2021 Soluciones en Informatica ISDM | <a href=''></a></strong>
      </footer>


      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->
    <div class="MsjAjaxForm"></div>
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
<script src="./js/main.js"></script> 
<script src="./js/main12.js"></script>       <script src="plugins/fastclick/fastclick.min.js"></script>
    <script src="dist/js/source_lines.js"></script>
    <script src="plugins/jtable/jquery-ui.js" type="text/javascript"></script>
    <script src="plugins/jtable/jquery.jtable.js" type="text/javascript"></script>
    <script src="dist/js/source_clients.js"></script>
    </center>
  </body>
</html>