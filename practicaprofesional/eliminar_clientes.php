<?Php
        include "clientes.php";
        $error="";
        if(isset($_GET["id_cliente"])){
            $id_cliente=$_GET["id_cliente"];
            $clientes = new Clientes("","","");
            echo $clientes->borrar($id_cliente);
            header("Location: /practicaprofesional/lista_clientes.php");            
        }                                
    ?>