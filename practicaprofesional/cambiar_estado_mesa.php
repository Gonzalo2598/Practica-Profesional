<?php
include "conexionusuarios.php";
$con = new conexion();
$conn = new mysqli($con->getservername(),
$con->getusername(),
$con->getpassword(),
$con->getdbname());
$id_mesa=$_GET["id_mesa"];
$sql = "SELECT * FROM mesas WHERE id_mesa=".$id_mesa;
$result = $conn->query($sql);   
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        if ($row["estado_mesa"] == "Ocupada"){
            $sql = "UPDATE mesas SET estado_mesa='Libre', estado_pago='Nulo' WHERE id_mesa=".$id_mesa;
            $result = $conn->query($sql);  
            header("Location: /practicaprofesional/estados_mesas.php");
        } else {
            $sql = "UPDATE mesas SET estado_mesa='Ocupada', estado_pago='Pendiente' WHERE id_mesa=".$id_mesa;
            $result = $conn->query($sql);  
            header("Location: /practicaprofesional/estados_mesas.php");
        }
        
    }
}
?>
