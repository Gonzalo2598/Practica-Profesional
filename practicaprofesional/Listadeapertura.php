<?php
include "vista/header.php";
?>
    <title>REGISTRO DE APERTURA</title>
<?php
include "vista/nav.php";
?>
   
<center>
    <h1 align='center'>Registro de Apertura</h1>
    <?Php
       // include "libro.php";
       include "conexionusuarios.php";
        $con = new conexion();
        $conn = new mysqli($con->getservername(), $con->getusername(), $con->getpassword(), $con->getdbname());                
        $sql = "SELECT  id_apertura, nombre, apellido, saldo,fecha,monto FROM Apertura";
        $result = $conn->query($sql);
        echo "<div class='container'><table class='table table-hover' style='width:100%'>
            <tr> 
                <th style='width:3%' >ID_APERTURA</th>
                <th style='width:3%' >NOMBRE</th>           
                <th style='width:3%'>APELLIDO</th>
                <th style='width:3%'>SALDO</th>
                <th style='width:3%'>FECHA/HORA</th>
                <th style='width:3%'>MONTO INICIAL</th>
                <th style='width:3%'>OPCIONES</th>
            </tr>";
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr >  
                
                        <td  align='center'>" . $row["id_apertura"] . "</td>
                        <td  align='center'>" . $row["nombre"] . "</td>
                        <td  align='center'>" . $row["apellido"] . "</td>
                        <td  align='center'>" . $row["saldo"] . "</td>
                        <td  align='center'>" . $row["fecha"] . "</td>
                        <td  align='center'>" . $row["monto"] . "</td>

                        <td align='center'>
                        
                        
                      
                     <div class='btn-group'>
                     <button type='button' class='btn btn-primary btn-md' data-toggle='dropdown'>
                     <span class='fa fa-cogs'></span>
  </button>
  <ul class='dropdown-menu' role='menu'>
    
    <li> <a href='almacen_apertura.php'>Agregar</a></li>
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
            <a href="aperturaexcel.php" class="btn btn-success"><span class="icon-file-excel"></span>Exportar a excel   </a>
            <a href='aperturadecajapdf.php' target="_blank" class="btn btn-danger"><span class="icon-file-pdf"></span>Exportar a PDF </a>
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
      <!-- Main Footer -->
<!-- Main Footer -->
<center>
<?php
include "vista/footer.php";
?>  