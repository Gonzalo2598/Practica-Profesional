<?php
include "vista/header.php";
?>
<?php
include "vista/nav_cajero.php";
?>


  </header> 
      <!-- Main Header -->
   
      <center>
    <h1 align='center'>Registro de Ventas</h1>
    <?Php
       // include "libro.php";
       include "conexionusuarios.php";
        $con = new conexion();
        $conn = new mysqli($con->getservername(), $con->getusername(), $con->getpassword(), $con->getdbname());                
        $sql = "SELECT v.id_venta,cl.nombre_empresa,id_caja,fecha,total,d.precio_unitario,d.cantidad,a.descripcion FROM ventas v INNER JOIN detalles d ON v.id_venta=d.id_venta INNER JOIN clientes cl ON v.id_cliente=cl.id_cliente INNER JOIN articulos a ON d.id_art=a.id_art ORDER BY v.id_venta desc";
        $resultarticulo = $conn->query($sql);
        echo "<div class='container'><table class='table table-hover' style='width:60%'>
            <tr> 
            <th style='width:10%'>VENTA</th>
            <th style='width:10%'>CLIENTE</th>
            <th style='width:10%'>CAJA</th>       
            <th style='width:10%'>FECHA</th>
            <th style='width:10%'>TOTAL</th>
            <th style='width:10%'>PRECIO</th>
            <th style='width:10%'>CANTIDAD</th>
            <th style='width:10%'>DESCRIPCION</th>
            <th style='width:10%'>OPCIONES</th>
            </tr>";
        if ($resultarticulo->num_rows > 0) {
            while($row = $resultarticulo->fetch_assoc()) {
                echo "<tr >  
                
                        <td align='center'>" . $row["id_venta"] . "</td>

                        <td align='center'>" . $row["nombre_empresa"] . "</td>

                        <td align='center'>" . $row["id_caja"] . "</td>

                        <td align='center'>" . $row["fecha"] . "</td>  
                                 
                        <td align='center'>" . $row["total"] . "</td>

                        <td align='center'>" . $row["precio_unitario"] . "</td>

                        <td align='center'>" . $row["cantidad"] . "</td>

                        <td align='center'>" . $row["descripcion"] . "</td>

                        <td align='center'>
                        
                        
                      
                     <div class='btn-group'>
                     <button type='button' class='btn btn-primary btn-md' data-toggle='dropdown'>
                     <span class='fa fa-cogs'></span>
  </button>
  <ul class='dropdown-menu' role='menu'>
    <li><a href='almacen_articulos.php?id_art=" .$row["id_art"] ."'>Modificar</a></li>
    <li><a class='btn-exit-user' href='eliminar_articulos.php?id_art=" .$row["id_art"] ."'>Borrar</a></li>
   <li> <a href='almacen_articulos.php'>Agregar</a></li>
  
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
            <a href="articulosexcel.php" class="btn btn-success"><span class="icon-file-excel"></span>Exportar a Excel   </a>
            <a href='articulospdf.php' target="_blank" class="btn btn-danger"><span class="icon-file-pdf"></span>Exportar a PDF </a>
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


<?php
include "vista/footer.php";
?>    