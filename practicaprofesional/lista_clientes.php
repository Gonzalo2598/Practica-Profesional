<?php
include "vista/header.php";
?>
<?php
include "vista/nav_mesero.php";
?>
</header>
      <!-- Main Header -->
   
<center>
    <h1 align='center'>Lista de Clientes</h1>
    <?Php
       // include "libro.php";
       include "conexionusuarios.php";
        $con = new conexion();
        $conn = new mysqli($con->getservername(), $con->getusername(), $con->getpassword(), $con->getdbname());                
        $sql = "SELECT  id_cliente, nombre_empresa, telefono FROM Clientes";
        $result = $conn->query($sql);
        echo "<div class='container'><table class='table table-hover' style='width:60%'>
            <tr> 
            <th style='width:10%'>ID_CLIENTE</th>
                <th style='width:8%'>NOMBRE</th>           
                <th style='width:10%'>TELEFONO</th>
                  <th style='width:10%'>OPCIONES</th>
            </tr>";
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr >  
                
                        <td align='center'>" . $row["id_cliente"] . "</td>
                        <td align='center'>" . $row["nombre_empresa"] . "</td>  
                                 
                        <td align='center'>" . $row["telefono"] . "</td>

                        <td align='center'>
                        
                        
                      
                     <div class='btn-group'>
                     <button type='button' class='btn btn-primary btn-md' data-toggle='dropdown'>
                     <span class='fa fa-cogs'></span>
  </button>
  <ul class='dropdown-menu' role='menu'>
    <li><a href='almacen_clientes.php?id_cliente=" .$row["id_cliente"] ."'>Modificar</a></li>
    <li><a class='btn-exit-user' href='eliminar_clientes.php?id_cliente=" .$row["id_cliente"] ."'>Borrar</a></li>
    <li> <a href='almacen_clientes.php'>Agregar</a></li>
  </ul>
</div>
                        
                        
</td>    
                     </tr>";
            }
        } 
        echo "</table></div>";
        $conn->close();
  
    ?>    
    <div align="center">
            <a href="clientesexcel.php" class="btn btn-success"> <span class="icon-file-excel"></span>Exportar a Excel   </a>
            <a href='clientespdf.php' target="_blank" class="btn btn-danger"><span class="icon-file-pdf"></span>Exportar a PDF</a>
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