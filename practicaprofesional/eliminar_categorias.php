<?Php
        include "categorias.php";
        $error="";
        if(isset($_GET["id_cat"])){
            $id_cat=$_GET["id_cat"];
            $categorias = new Categorias("","");
            echo $categorias->borrar($id_cat);
            header("Location: /practicaprofesional/lista_categorias.php");            
        }                                
?>