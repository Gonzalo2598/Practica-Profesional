<?Php
        include "ventas.php";
        $error="";
        if(isset($_GET["id_vta"])){
            $id_vta=$_GET["id_vta"];
            $ventas = new Ventas("","","","","");
            echo $ventas->borrar($id_vta);
            header("Location: /practicaprofesional/listas_ventas.php");            
        }                                
    ?>