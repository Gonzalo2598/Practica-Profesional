<?php
include "vista/header.php";
?>
    <title>LISTA DE PROVEEDORES</title>
    <?php
include "vista/nav.php";
?>
<center>
    <h1 align='center'>Lista de Proveedores</h1>
    <?Php
      
       include "conexionusuarios.php";
        $con = new conexion();
        $conn = new mysqli($con->getservername(), $con->getusername(), $con->getpassword(), $con->getdbname());                
        $sql = "SELECT  id_prov, nombre_empresa, telefono FROM proveedores";
        $result = $conn->query($sql);
        echo "<div class='container'><table class='table table-hover' style='width:60%'>
            <tr> 
            
                <th style='width:10%'>NOMBRE_EMPRESA</th>
                <th style='width:10%'>Telefono</th>
                <th style='width:10%'>OPCIONES</th>
            </tr>";
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr >  
                
                        
                        <td align='center'>" . $row["nombre_empresa"] . "</td>
                        <td align='center'>" . $row["telefono"] . "</td>

                        <td align='center'>
                        
                        
                      
                     <div class='btn-group'>
                     <button type='button' class='btn btn-primary btn-md' data-toggle='dropdown'>
                     <span class='fa fa-cogs'></span>
  </button>
  <ul class='dropdown-menu' role='menu'>
    <li><a href='almacen_proveedores.php?id_prov=" .$row["id_prov"] ."'>Modificar</a></li>
    <li><a class='btn-exit-user' href='eliminar_proveedores.php?id_prov=" .$row["id_prov"] ."'>Borrar</a></li>
    <li> <a href='almacen_proveedores.php'>Agregar</a></li>
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
            <a href="proveedoresexcel.php" class="btn btn-success"><span class="icon-file-excel"></span>Exportar a excel   </a>
            <a href='proveedorespdf.php' target="_blank" class="btn btn-danger"><span class="icon-file-pdf" ></span>Exportar a PDF </a>
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
      <!-- Main Footer -->
<!-- Main Footer -->
<center>
<?php
include "vista/footer.php";
?>  