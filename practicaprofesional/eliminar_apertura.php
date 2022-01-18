<?Php
        include "aperturadecaja.php";
        $error="";
        if(isset($_GET["id_apertura"])){
            $id_apertura=$_GET["id_apertura"];
            $apertura = new Apertura("","","","","","");
            echo $apertura->borrar($id_apertura);
            header("Location: /practicaprofesional/listadeapertura.php");            
        }                                
    ?>