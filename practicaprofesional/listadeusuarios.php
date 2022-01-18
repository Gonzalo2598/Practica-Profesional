<?php
include "vista/header.php";
?>
    <title>Lista de usuarios</title>
<?php
include "vista/nav.php";
?>     
      <!-- Main Header -->
   
<center>
    <h1 align='center'>Lista de Usuarios</h1>
    <?Php
       // include "libro.php";
       include "conexionusuarios.php";
        $con = new conexion();
        $conn = new mysqli($con->getservername(), $con->getusername(), $con->getpassword(), $con->getdbname());                
        $sql = "SELECT  id_user,Tipos.nombre_tipo,usuario, contraseña FROM usuarios,Tipos WHERE usuarios.id_tipo=Tipos.id_tipo";
        $result = $conn->query($sql);

        echo "<div class='container'><table class='table table-hover' style='width:60%'>
            <tr> 
            
            <th style='width:10%'>TIPO DE USUARIO</th>
            <th style='width:8%'>USUARIO</th>           
            <th style='width:10%'>CONTRASEÑA</th>
            <th style='width:10%'>OPCIONES</th>
            </tr>";
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $pass=$row["contraseña"];
                $c=str_replace($pass,'**********',$pass);
                echo "<tr >  
                
                        

                        <td align='center'>" . $row["nombre_tipo"] . "</td>

                        <td align='center'>" . $row["usuario"] . "</td>  
                                 
                        <td align='center'>" . $c . "</td>

                        <td align='center'>
                        
                        
                      
                     <div class='btn-group'>
                     <button type='button' class='btn btn-primary btn-md' data-toggle='dropdown'>
                     <span class='fa fa-cogs'></span>
  </button>
  <ul class='dropdown-menu' role='menu'>
    <li><a href='almacenusuarios.php?id_user=" .$row["id_user"] ."'>Modificar</a></li>
    <li><a class='btn-exit-user' href='eliminarusuarios.php?id_user=" .$row["id_user"] ."'>Borrar</a></li>
    <li> <a href='almacenusuarios.php'>Agregar</a></li>
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
<?php
include "vista/footer.php";
?>  