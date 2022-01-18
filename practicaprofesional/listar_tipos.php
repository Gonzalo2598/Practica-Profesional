<?php
include "vista/header.php";
?>
    <title>Lista de Roles</title>
<?php
include "vista/nav.php";
?>   
      <!-- Main Header -->
   
<center>
    <h1 align='center'>Lista de tipos de Usuarios</h1>
    <?Php
       // include "libro.php";
       include "conexionusuarios.php";
        $con = new conexion();
        $conn = new mysqli($con->getservername(), $con->getusername(), $con->getpassword(), $con->getdbname());                
        $sql = "SELECT  id_tipo, nombre_tipo FROM Tipos";
        $result = $conn->query($sql);
        echo "<div class='container'><table class='table table-hover' style='width:60%'>
            <tr> 
            <th style='width:10%'>ID_TIPO</th>
                <th style='width:8%'>TIPO</th>
                <th style='width:10%'>OPCIONES</th>
            </tr>";
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr >  
                
                        <td align='center'>" . $row["id_tipo"] . "</td>
                        <td align='center'>" . $row["nombre_tipo"] . "</td>

                        <td align='center'>
                        
                        
                      
                     <div class='btn-group'>
                     <button type='button' class='btn btn-primary btn-md' data-toggle='dropdown'>
                     <span class='fa fa-cogs'></span>
  </button>
  <ul class='dropdown-menu' role='menu'>
    <li><a href='almacen_tipo.php?id_tipo=" .$row["id_tipo"] ."'>Modificar</a></li>
    <li><a class='btn-exit-user' href='eliminar_tipo.php?id_tipo=" .$row["id_tipo"] ."'>Borrar</a></li>
    <li> <a href='almacen_tipo.php'>Agregar</a></li>
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
            <a href="tiposexcel.php" class="btn btn-success"> <span class="icon-file-excel"></span>Exportar a Excel   </a>
            <a href='tipospdf.php' target="_blank" class="btn btn-danger"><span class="icon-file-pdf"></span>Exportar a PDF</a>
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
<?php
include "vista/footer.php";
?>  