<?Php
        include "tipodeusuarios.php";
        $error="";
        if(isset($_GET["id_tipo"])){
            $id_tipo=$_GET["id_tipo"];
            $tipo = new Tipos("","");
            echo $tipo->borrar($id_tipo);
            header("Location: /practicaprofesional/listar_tipos.php");            
        }                                
?>