<?php
include "vista/header.php";
?>
    <title>Lista de Categorias</title>
<?php
include "vista/nav.php";
?>
   
   <center>
    <h1 align='center'>Lista de Categorias</h1>
    <?Php
      
       include "conexionusuarios.php";
        $con = new conexion();
        $conn = new mysqli($con->getservername(), $con->getusername(), $con->getpassword(), $con->getdbname());                
        $sql = "SELECT  id_cat, nombre_cat FROM Categorias";
        $result = $conn->query($sql);
        echo "<div class='container'><table class='table table-hover' style='width:60%'>
            <tr> 
            <th style='width:10%'>ID_CAT</th>
                <th style='width:10%'>NOMBRE_CAT</th>
                <th style='width:10%'>OPCIONES</th>
            </tr>";
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr >  
                
                        <td align='center'>" . $row["id_cat"] . "</td>
                        <td align='center'>" . $row["nombre_cat"] . "</td>

                        <td align='center'>
                        
                        
                      
                     <div class='btn-group'>
                     <button type='button' class='btn btn-primary btn-md' data-toggle='dropdown'>
                     <span class='fa fa-cogs'></span>
  </button>
  <ul class='dropdown-menu' role='menu'>
  <li><a href='almacencategorias.php?id_cat=" .$row["id_cat"] ."'>Modificar</a></li>
    <li><a class='btn-exit-user' href='eliminar_categorias.php?id_cat=" .$row["id_cat"] ."'>Borrar</a></li>
    <li> <a href='almacencategorias.php'>Agregar</a></li>
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
            <a href="categoriasexcel.php" class="btn btn-success"> <span class="icon-file-excel"></span>Exportar a Excel   </a>
            <a href='categoriaspdf.php' target="_blank" class="btn btn-danger"><span class="icon-file-pdf"></span>Exportar a PDF</a>
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