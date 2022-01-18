<?php
include "conexionusuarios.php";
class Clientes {
    private $id_cliente;
    private $nombre_empresa;
    private $telefono;
    private $conexion;

    function __construct($id_cliente,$nombre_empresa, $telefono){
        $this->id_cliente=$id_cliente;
        $this->nombre_empresa = $nombre_empresa;
        $this->telefono=$telefono;
        $this->conexion = new conexion();
    }
   
    public function setnombre_empresa($nombre_empresa){
        $this->nombre_empresa=$nombre_empresa;
        }
        public function getnombre_empresa(){
        return $this->nombre_empresa;
        }

        public function settelefono($telefono){
            $this->telefono=$telefono;
            }
            public function gettelefono(){
            return $this->telefono;
            }
       
        public function conectar(){
            $conn= new mysqli($this->conexion->getservername(), $this->conexion->getusername(), $this->conexion->getpassword());
            if($conn->connect_error){
                echo "Fallo la conexion: ".$conn->connect_error;
            
            }else{
            
            
            echo "Conectado </br>";
            }
            $sql="CREATE DATABASE agenda;";
            if(mysqli_query($conn,$sql)){
                echo "la base de datos se creo correctamente </br>";
            }else{
                echo "ya existe: ".mysqli_error($conn)."</br>";
            }
            }
            public function creartabla(){
                $conn= new mysqli($this->conexion->getservername(), $this->conexion->getusername(), $this->conexion->getpassword(), $this->conexion->getdbname());
               $sql="USE agenda";
               $sql="CREATE TABLE Clientes(
                id_cliente integer auto_increment,
                nombre_empresa varchar(30),
                telefono varchar(30),
                primary key(id_cliente))";
            
                if($conn->query($sql)===TRUE){
                    echo "se creo correctamente la tabla </br>";
            
                }else{
                    echo "error al crear tabla: ".$conn->error;
                }
            }
          
            public function guardar(){       
                $conn = new mysqli( $this->conexion->getservername(), $this->conexion->getusername(), $this->conexion->getpassword(), $this->conexion->getdbname());        
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                } 
                else{
                        $sql = "INSERT INTO Clientes(id_cliente,nombre_empresa, telefono) VALUES 
                        ('".$this->id_cliente."','".$this->nombre_empresa."', '".$this->telefono."')";                
                        if ($conn->query($sql) === TRUE) {
                            return  " ";
                        } else {
                            return "Error: " . $sql . "<br>" . $conn->error;
                        }
                    }
                $conn->close();
            }    
            public function getbyId($id_cliente){        
                $conn = new mysqli( $this->conexion->getservername(), $this->conexion->getusername(), $this->conexion->getpassword(), $this->conexion->getdbname());        
                $sql = "SELECT id_cliente, nombre_empresa, telefono  FROM Clientes where id_cliente=" . $id_cliente ;
                $result = $conn->query($sql);        
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {

                        
                       $this->id_cliente = $row["id_cliente"];
                        
                       $this->nombre_empresa = $row["nombre_empresa"]; 
                       
                       $this->telefono = $row["telefono"];
            
                    }
                } 
                $conn->close();
            }
            public function borrar($id_cliente){
                $conn = new mysqli($this->conexion->getservername(), $this->conexion->getusername(), $this->conexion->getpassword(), $this->conexion->getdbname());
                $sql = " DELETE FROM Clientes WHERE id_cliente =$id_cliente ";
                $conn->query($sql);        
                $conn->close();
            }  
            
            public function modificar($id_cliente){
                $conn = new mysqli($this->conexion->getservername(), $this->conexion->getusername(), $this->conexion->getpassword(), $this->conexion->getdbname());
                $sql = "UPDATE Clientes SET nombre_empresa='".$this->getnombre_empresa()."', telefono='".$this->gettelefono()."'  WHERE  id_cliente=". $id_cliente;
                $conn->query($sql);
            
                $conn->close();
            }

           
              
}

?>