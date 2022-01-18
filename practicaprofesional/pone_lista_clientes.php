<?Php
       
       include "conexionusuarios.php";
        $con = new conexion();
        $conn = new mysqli($con->getservername(), $con->getusername(), $con->getpassword(), $con->getdbname());                
        $sql = "SELECT  id_cliente, nombre_empresa FROM clientes";
        $result = $conn->query($sql);
        echo "<div ><table class='table table-hover' style='width:60%'>
            <tr> 
            <th style='width:10%'>ID_CLIENTE</th>
            <th style='width:10%'>NOMBRE</th>
            </tr>";
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr >  
                
                        <td align='center'>" . $row["id_cliente"] . "</td>
                        <td align='center'>" . $row["nombre_empresa"] . "</td>
                            
                     </tr>";
            }
        } 
        echo "</table></div>";
        $conn->close();
  
    ?>    
     