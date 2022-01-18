<?php
try{
    $conexionDB = new mysqli("localhost", "root", "rootroot", "agenda");
    if($conexionDB->connect_error){
        die("Ocurrio un error al conecarse a la base de datos");
    }
    echo "Conexion Exitosa vamos";
    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
}
    
catch(Exception $ex)
{
    echo "Ocurrio un error al conectarse a la base de datos".$ex->getMessage();
}    

?>