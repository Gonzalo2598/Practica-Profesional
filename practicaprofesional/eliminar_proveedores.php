<?Php
        include "proveedores.php";
        $error="";
        if(isset($_GET["id_prov"])){
            $id_prov=$_GET["id_prov"];
            $proveedores = new Proveedores("","","");
            echo $proveedores->borrar($id_prov);
            header("Location: /practicaprofesional/lista_proveedores.php");            
        }                                
    ?>