<?Php
        include "articulos.php";
        $error="";
        if(isset($_GET["id_art"])){
            $id_art=$_GET["id_art"];
            $articulo = new Articulos("","","","","","","");
            echo $articulo->borrar($id_art);
            header("Location: /practicaprofesional/lista_articulos.php");            
        }                                
    ?>