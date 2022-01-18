<?php


require 'conexionexcel.php';
header('Content-type:application/vnd.ms-excel; charset-UT-8');
header('Content-Disposition: attachment;filename=reporte.xls');
header('Pragma: no-cache');
header('Expires: 0');
$consulta = 'SELECT * FROM Clientes';
$resultado = $mysqli->query($consulta);
if ($resultado->num_rows > 0)
                        {
                            echo "<table border-\"0\"; border-color- \"black\">";
                            echo    "<tr style=\"background-color: beige\">";
                            echo        "<td style=\"width:100px\">";
                            echo            "Id Cliente";
                            echo        "<td>";
                            echo        "<td style=\"width:100px\">";
                            echo            "Nombre";
                            echo        "<td>";
                            echo        "<td style=\"width:100px\">";
                            echo            "Telefono";
                            echo        "<td>";
                            echo    "<tr>";
                            while ($fila = $resultado->fetch_assoc())
                            {
                                echo    "<tr>";
                                echo        "<td style=\"width:100px\">";
                                echo            $fila["id_cliente"];
                                echo        "<td>";
                                echo        "<td style=\"width:100px\">";
                                echo             $fila["nombre_empresa"];
                                echo        "<td>";
                                echo        "<td style=\"width:100px\">";
                                echo            $fila["telefono"];
                                echo        "<td>";
                                echo    "<tr>"; 


                            }
                            echo    "</table>";                                                                    

                        }

?>