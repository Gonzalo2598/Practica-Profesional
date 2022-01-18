<?php
include "conexionusuarios.php";
class Tipos {
    private $id_tipo;
    private $nombre_tipo;
    private $conexion;

    function __construct($id_tipo,$nombre_tipo){
        $this->id_tipo=$id_tipo;
        $this->nombre_tipo = $nombre_tipo;
        $this->conexion = new conexion();
    }
   
    public function setnombre_tipo($nombre_tipo){
        $this->nombre_tipo=$nombre_tipo;
        }
        public function getnombre_tipo(){
        return $this->nombre_tipo;
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
               $sql="CREATE TABLE Tipos(
                id_tipo integer auto_increment,
                nombre_tipo varchar(30),
                primary key(id_tipo))";
            
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
                        $sql = "INSERT INTO Tipos(id_tipo,nombre_tipo) VALUES 
                        ('".$this->id_tipo."','".$this->nombre_tipo."')";                
                        if ($conn->query($sql) === TRUE) {
                            return  " ";
                        } else {
                            return "Error: " . $sql . "<br>" . $conn->error;
                        }
                    }
                $conn->close();
            }    
            public function getbyId($id_tipo){        
                $conn = new mysqli( $this->conexion->getservername(), $this->conexion->getusername(), $this->conexion->getpassword(), $this->conexion->getdbname());        
                $sql = "SELECT id_tipo, nombre_tipo FROM Tipos where id_tipo=" . $id_tipo ;
                $result = $conn->query($sql);        
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {

                        
                       $this->id_tipo = $row["id_tipo"];
                        
                       $this->nombre_tipo = $row["nombre_tipo"]; 
                       
            
                    }
                } 
                $conn->close();
            }
            public function borrar($id_tipo){
                $conn = new mysqli($this->conexion->getservername(), $this->conexion->getusername(), $this->conexion->getpassword(), $this->conexion->getdbname());
                $sql = " DELETE FROM Tipos WHERE id_tipo= $id_tipo ";
                $conn->query($sql);        
                $conn->close();
            }  
            
            public function modificar($id_tipo){
                $conn = new mysqli($this->conexion->getservername(), $this->conexion->getusername(), $this->conexion->getpassword(), $this->conexion->getdbname());
                $sql = "UPDATE Tipos SET nombre_tipo='".$this->getnombre_tipo()."' WHERE  id_tipo=". $id_tipo;
                $conn->query($sql);
            
                $conn->close();
            }

           
              
}

?>