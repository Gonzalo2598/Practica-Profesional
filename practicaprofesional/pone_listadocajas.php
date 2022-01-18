<?php


       include "conexionusuarios.php";
        $con = new conexion();
        $conn = new mysqli($con->getservername(), $con->getusername(), $con->getpassword(), $con->getdbname());                
        $sql = "SELECT  id_caja, usuarios.usuario,fecha_apertura,monto_inicial,fecha_cierre,monto_final,movimiento_ingreso,movimiento_egreso,sobrante,faltante,estado FROM cajas,usuarios WHERE cajas.id_user=usuarios.id_user ORDER BY id_caja desc";
        $resultarticulo = $conn->query($sql);
        echo "<div class='container'><table class='table table-hover' style='width:60%'>
            <tr> 
            
            <th>USUARIO</th>
            <th>FECHA DE APERTURA</th>
            <th>MONTO INICIAL</th>           
            <th>FECHA DE CIERRE</th>
            <th>MONTO FINAL</th>
            <th>INGRESOS</th>
            <th>EGRESOS</th>
            <th>SOBRANTE</th>
            <th>FALTANTE</th>
            <th>ESTADO</th>
            <th>OPCIÓN</th>
            </tr>";
        if ($resultarticulo->num_rows > 0) {
            while($row = $resultarticulo->fetch_assoc()) {
                $estado=$row["estado"] =="1" ? "Abierta" : "Cerrada";
                echo "<tr >  
                
                        

                        <td align='center'>" . $row["usuario"] . "</td>

                        <td align='center'>" . $row["fecha_apertura"] . "</td>

                        <td align='center'>" . $row["monto_inicial"] . "</td>  
                                 
                        <td align='center'>" . $row["fecha_cierre"] . "</td>

                        <td align='center'>" . $row["monto_final"] . "</td>

                        <td align='center'>" . $row["movimiento_ingreso"] . "</td>

                        <td align='center'>" . $row["movimiento_egreso"] . "</td>

                        <td align='center'>" . $row["sobrante"] . "</td>

                        <td align='center'>" . $row["faltante"] . "</td>

                        <td align='center'>" . $estado . "</td>

                        <td align='center'>
                        
                        
    
  <button  data-toggle='modal' data-target='#cerrar' class='btn btn-danger' type='button'><i class='fa fa-times'></i>Cerrar caja</button>
    
                      
                     
                      
</td>    
                     </tr>";
            }
        } 
        echo "</table></div>";
        
        $conn->close();

   
    


    ?>  