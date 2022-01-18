<?php
include "conexionusuarios.php";
class Medidas {
    private $id_medida;
    private $medida;
    private $conexion;

    function __construct($id_medida,$medida){
        $this->id_medida=$id_medida;
        $this->medida = $medida;
        $this->conexion = new conexion();
    }
   
    public function setmedida($medida){
        $this->medida=$medida;
        }
        public function getmedida(){
        return $this->medida;
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
               $sql="CREATE TABLE Medidas(
                id_medida BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
                medida varchar(30),
                primary key(id_medida))";
            
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
                        $sql = "INSERT INTO Medidas(id_medida,medida) VALUES 
                        ('".$this->id_medida."','".$this->medida."')";                
                        if ($conn->query($sql) === TRUE) {
                            return  " ";
                        } else {
                            return "Error: " . $sql . "<br>" . $conn->error;
                        }
                    }
                $conn->close();
            }    
            public function getbyId($id_medida){        
                $conn = new mysqli( $this->conexion->getservername(), $this->conexion->getusername(), $this->conexion->getpassword(), $this->conexion->getdbname());        
                $sql = "SELECT id_medida, medida FROM Medidas where id_medida=" . $id_medida ;
                $result = $conn->query($sql);        
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {

                        
                       $this->id_marca = $row["id_medida"];
                        
                       $this->nombre = $row["medida"]; 
                       
                       
            
                    }
                } 
                $conn->close();
            }
            public function borrar($id_medida){
                $conn = new mysqli($this->conexion->getservername(), $this->conexion->getusername(), $this->conexion->getpassword(), $this->conexion->getdbname());
                $sql = " DELETE FROM Medidas WHERE id_medida =$id_medida ";
                $conn->query($sql);        
                $conn->close();
            }  
            
            public function modificar($id_medida){
                $conn = new mysqli($this->conexion->getservername(), $this->conexion->getusername(), $this->conexion->getpassword(), $this->conexion->getdbname());
                $sql = "UPDATE Medidas SET medida='".$this->getmedida()."' WHERE  id_medida=". $id_medida;
                $conn->query($sql);
            
                $conn->close();
            }

           
              
}

?>