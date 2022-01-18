<?Php
        include "usuarios.php";
        $error="";
        if(isset($_GET["id_user"])){
            $id_user=$_GET["id_user"];
            $usuario = new Usuarios("","","");
            echo $usuario->borrar($id_user);
            header("Location: /practicaprofesional/listadeusuarios.php");            
        }                                
    ?>