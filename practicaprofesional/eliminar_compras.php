<?Php
        include "compras.php";
        $error="";
        if(isset($_GET["id_compra"])){
            $id_compra=$_GET["id_compra"];
            $compra = new Compras("","","","","","");
            echo $compra->borrar($id_compra);
            header("Location: /practicaprofesional/registro_compras.php");            
        }                                
?>