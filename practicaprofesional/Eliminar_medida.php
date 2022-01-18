<?Php
        include "Medida.php";
        $error="";
        if(isset($_GET["id_medida"])){
            $id_medida=$_GET["id_medida"];
            $medidas = new Medidas("","");
            echo $medidas->borrar($id_medida);
            header("Location: /practicaprofesional/lista_medidas.php");            
        }                                
    ?>