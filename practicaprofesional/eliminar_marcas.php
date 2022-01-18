<?Php
        include "marcas.php";
        $error="";
        if(isset($_GET["id_marca"])){
            $id_marca=$_GET["id_marca"];
            $marcas = new Marcas("","");
            echo $marcas->borrar($id_marca);
            header("Location: /practicaprofesional/lista_marcas.php");            
        }                                
?>