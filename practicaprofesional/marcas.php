<?php
include "conexionusuarios.php";
class Marcas {
    private $id_marca;
    private $nombre;
    private $conexion;

    function __construct($id_marca,$nombre){
        $this->id_marca=$id_marca;
        $this->nombre = $nombre;
        $this->conexion = new conexion();
    }
   
    public function setnombre($nombre){
        $this->nombre=$nombre;
        }
        public function getnombre(){
        return $this->nombre;
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
               $sql="CREATE TABLE Marcas(
                id_marca BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
                nombre varchar(30),
                primary key(id_marca))";
            
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
                        $sql = "INSERT INTO Marcas(id_marca,nombre) VALUES 
                        ('".$this->id_marca."','".$this->nombre."')";                
                        if ($conn->query($sql) === TRUE) {
                            return  " ";
                        } else {
                            return "Error: " . $sql . "<br>" . $conn->error;
                        }
                    }
                $conn->close();
            }    
            public function getbyId($id_marca){        
                $conn = new mysqli( $this->conexion->getservername(), $this->conexion->getusername(), $this->conexion->getpassword(), $this->conexion->getdbname());        
                $sql = "SELECT id_marca, nombre FROM Marcas where id_marca=" . $id_marca ;
                $result = $conn->query($sql);        
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {

                        
                       $this->id_marca = $row["id_marca"];
                        
                       $this->nombre = $row["nombre"]; 
                       
                       
            
                    }
                } 
                $conn->close();
            }
            public function borrar($id_marca){
                $conn = new mysqli($this->conexion->getservername(), $this->conexion->getusername(), $this->conexion->getpassword(), $this->conexion->getdbname());
                $sql = " DELETE FROM Marcas WHERE id_marca =$id_marca ";
                $conn->query($sql);        
                $conn->close();
            }  
            
            public function modificar($id_marca){
                $conn = new mysqli($this->conexion->getservername(), $this->conexion->getusername(), $this->conexion->getpassword(), $this->conexion->getdbname());
                $sql = "UPDATE Marcas SET nombre='".$this->getnombre()."' WHERE  id_marca=". $id_marca;
                $conn->query($sql);
            
                $conn->close();
            }

           
              
}

?>