<?Php
       
       include "conexionusuarios.php";
        $con = new conexion();
        $conn = new mysqli($con->getservername(), $con->getusername(), $con->getpassword(), $con->getdbname());                
        $sql = "SELECT  id_mesa, estado_mesa,estado_pago FROM Mesas";
        $result = $conn->query($sql);
        echo "<div ><table class='table table-hover' style='width:60%'>
            <tr> 
            <th style='width:10%'>MESA</th>
                <th style='width:10%'>ESTADOS MESA</th>
                <th style='width:10%'>ESTADOS PAGO</th>
                
            </tr>";
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr >  
                
                        <td align='center'>" . $row["id_mesa"] . "</td>
                        <td align='center'>" . $row["estado_mesa"] . "</td>
                        <td align='center'>" . $row["estado_pago"] . "</td>
                          
                     </tr>";
            }
        } 
        echo "</table></div>";
        $conn->close();
  
    ?>    