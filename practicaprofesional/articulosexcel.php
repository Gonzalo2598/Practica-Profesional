<?php


require 'conexionexcel.php';
header('Content-type:application/vnd.ms-excel; charset-UT-8');
header('Content-Disposition: attachment;filename=reporte.xls');
header('Pragma: no-cache');
header('Expires: 0');
$consulta = 'SELECT  id_art, Categorias.nombre_cat,codigo,descripcion,precio_compra,precio_venta,existencia FROM Articulos,Categorias WHERE Articulos.id_cat=Categorias.id_cat';
$resultado = $mysqli->query($consulta);
if ($resultado->num_rows > 0)
                        {
                            echo "<table border-\"0\"; border-color- \"black\">";
                            echo    "<tr style=\"background-color: beige\">";
                            echo        "<td style=\"width:100px\">";
                            echo            "Id Articulo";
                            echo        "<td>";
                            echo        "<td style=\"width:100px\">";
                            echo            "Id Cat";
                            echo        "<td>";
                            echo        "<td style=\"width:100px\">";
                            echo            "Codigo";
                            echo        "<td>";
                            echo        "<td style=\"width:100px\">";
                            echo            "Descripcion";
                            echo        "<td>";
                            echo        "<td style=\"width:100px\">";
                            echo            "Precio_Compra";
                            echo        "<td>";
                            echo        "<td style=\"width:100px\">";
                            echo            "Precio_Venta";
                            echo        "<td>";
                            echo        "<td style=\"width:100px\">";
                            echo            "Stock";
                            echo        "<td>";              
                            echo    "<tr>";
                            while ($fila = $resultado->fetch_assoc())
                            {
                                echo    "<tr>";
                                echo        "<td style=\"width:100px\">";
                                echo            $fila["id_art"];
                                echo        "<td>";
                                echo        "<td style=\"width:100px\">";
                                echo             $fila["nombre_cat"];
                                echo        "<td>";
                                echo        "<td style=\"width:100px\">";
                                echo            $fila["codigo"];
                                echo        "<td>";
                                echo        "<td style=\"width:100px\">";
                                echo            $fila["descripcion"];
                                echo        "<td>";
                                echo        "<td style=\"width:100px\">";
                                echo            $fila["precio_compra"];
                                echo        "<td>";
                                echo        "<td style=\"width:100px\">";
                                echo            $fila["precio_venta"];
                                echo        "<td>";
                                echo        "<td style=\"width:100px\">";
                                echo            $fila["existencia"];
                                echo        "<td>";
                                echo    "<tr>"; 


                            }
                            echo    "</table>";                                                                    

                        }

?>