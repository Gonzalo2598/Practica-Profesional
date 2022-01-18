<?php
include "vista/header.php";
?>
    <title>Lista de medidas</title>
    <?php
include "vista/nav.php";
?>  
   
<center>
    <h1 align='center'>Lista de Medidas</h1>
    <?Php
      
       include "conexionusuarios.php";
        $con = new conexion();
        $conn = new mysqli($con->getservername(), $con->getusername(), $con->getpassword(), $con->getdbname());                
        $sql = "SELECT  id_medida, medida FROM Medidas";
        $result = $conn->query($sql);
        echo "<div class='container'><table class='table table-hover' style='width:60%'>
            <tr> 
            <th style='width:10%'>ID_MEDIDA</th>
                <th style='width:8%'>MEDIDA</th>
                <th style='width:10%'>OPCIONES</th>
            </tr>";
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr >  
                
                        <td align='center'>" . $row["id_medida"] . "</td>
                        <td align='center'>" . $row["medida"] . "</td>

                        <td align='center'>
                        
                        
                      
                     <div class='btn-group'>
                     <button type='button' class='btn btn-primary btn-md' data-toggle='dropdown'>
                     <span class='fa fa-cogs'></span>
  </button>
  <ul class='dropdown-menu' role='menu'>
    <li><a href='Almacen_medida.php?id_medida=" .$row["id_medida"] ."'>Modificar</a></li>
    <li><a class='btn-exit-user' href='Eliminar_medida.php?id_medida=" .$row["id_medida"] ."'>Borrar</a></li>
    <li> <a href='Almacen_medida.php'>Agregar</a></li>
  </ul>
</div>
                        
                        
</td>    
                     </tr>";
            }
        } 
        echo "</table></div>";
        $conn->close();
  
    ?>    
     
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