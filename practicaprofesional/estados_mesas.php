<?php
include "vista/header.php";
?>
<?php
include "vista/nav_mesero.php";
?>
</header>
      <!-- Main Header -->
   
<center>
    <h1 align='center'>Estados de Mesas</h1>
    <?Php
       // include "libro.php";
       include "conexionusuarios.php";
        $con = new conexion();
        $conn = new mysqli($con->getservername(), $con->getusername(), $con->getpassword(), $con->getdbname());                
        $sql = "SELECT  id_mesa, estado_mesa,estado_pago FROM Mesas";
        $result = $conn->query($sql);
        echo "<div id='main-container'><table class='table table-hover' style='width:60%'>
            <tr> 
            <th style='width:10%'>MESA</th>
                <th style='width:10%'>ESTADOS MESA</th>
                <th style='width:10%'>ESTADOS PAGO</th>
                <th style='width:10%'>OPCIONES</th>
            </tr>";
            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                if ($row["estado_mesa"] == "Ocupada" && $row["estado_pago"] == "Pendiente") {
                  echo "<tr class='danger'>  
                  
                          <td align='center'>" . $row["id_mesa"] . "</td>
                          <td align='center'>" . $row["estado_mesa"] . "</td>
                          <td align='center'>" . $row["estado_pago"] . "</td>
                          <td align='center'>
                          
                          
                        
                       <div class='btn-group'>
                       <button type='button' class='btn btn-primary btn-md' data-toggle='dropdown'>
                        <span class='fa fa-cogs'></span>
                       </button>
                        <ul class='dropdown-menu' role='menu'>
                          <li><a href='cambiar_estado_mesa.php?id_mesa=".$row["id_mesa"]."'>Modificar Mesa</a></li>                        
                        </ul>
                        </div>  
                      </td>    
                       </tr>";
                  }
                  if ($row["estado_mesa"] == "Libre") {
                    echo "<tr class='success'>  
                
                        <td align='center'>" . $row["id_mesa"] . "</td>
                        <td align='center'>" . $row["estado_mesa"] . "</td>
                        <td align='center'>" . $row["estado_pago"] . "</td>
                        <td align='center'>
                        
                        
                      
                     <div class='btn-group'>
                     <button type='button' class='btn btn-primary btn-md' data-toggle='dropdown'>
                      <span class='fa fa-cogs'></span>
                     </button>
                      <ul class='dropdown-menu' role='menu'>
                      <li><a href='cambiar_estado_mesa.php?id_mesa=".$row["id_mesa"]."'>Modificar Mesa</a></li>                        
                        
                      </ul>
                      </div>  
                    </td>    
                     </tr>";
            }if ($row["estado_mesa"] == "Ocupada" && $row["estado_pago"] == "Pago Realizado") {
              echo "<tr class='warning'>  
          
                  <td align='center'>" . $row["id_mesa"] . "</td>
                  <td align='center'>" . $row["estado_mesa"] . "</td>
                  <td align='center'>" . $row["estado_pago"] . "</td>
                  <td align='center'>
                  
                  
                
               <div class='btn-group'>
               <button type='button' class='btn btn-primary btn-md' data-toggle='dropdown'>
                <span class='fa fa-cogs'></span>
               </button>
                <ul class='dropdown-menu' role='menu'>
                <li><a href='cambiar_estado_mesa.php?id_mesa=".$row["id_mesa"]."'>Modificar Mesa</a></li>                       
                  
                </ul>
                </div>  
              </td>    
               </tr>";
             }
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