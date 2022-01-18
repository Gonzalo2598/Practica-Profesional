<?php
include "vista/header.php";
?>
    <title>Gestion de Caja</title>
<?php
include "vista/nav_cajero.php";
?>
   
<center>
    <h1 align='center'>Gestion de Caja</h1>
    <?Php
       // include "libro.php";
       include "conexionusuarios.php";
        $con = new conexion();
        $conn = new mysqli($con->getservername(), $con->getusername(), $con->getpassword(), $con->getdbname());                
        $sql = "SELECT g.id_caja,u.usuario,g.faltante,motivo from gestion_cajas g INNER JOIN usuarios u ON g.id_user=u.id_user INNER JOIN cajas c ON g.id_caja=c.id_caja WHERE c.estado=1";
        $result = $conn->query($sql);
        echo "<div class='main-container'><table class='table table-hover' style='width:60%'>
            <tr> 
                <th style='width:10%'>CAJA</th>
                <th style='width:10%' >USUARIO</th>           
                <th style='width:10%'>FALTANTE</th>
                <th style='width:10%'>MOTIVO</th>
            </tr>";
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr >  
                
                        <td  align='center'>" . $row["id_caja"] . "</td>
                        <td  align='center'>" . $row["usuario"] . "</td>
                        <td  align='center'>" . $row["faltante"] . "</td>
                        <td  align='center'>" . $row["motivo"] . "</td>
                     </tr>";
            }
        } 
        echo "</table></div>";
        $conn->close();
  
    ?>    
    
    
 

      


      <!-- Main Footer -->
      <!-- Main Footer -->
<!-- Main Footer -->
<center>
<?php
include "vista/footer.php";
?>  