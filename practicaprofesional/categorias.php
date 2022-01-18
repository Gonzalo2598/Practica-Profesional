<?php
include "conexionusuarios.php";
class Categorias {
    private $id_cat;
    private $nombre_cat;
    private $conexion;

    function __construct($id_cat,$nombre_cat){
        $this->id_cat=$id_cat;
        $this->nombre_cat = $nombre_cat;
        $this->conexion = new conexion();
    }
   
    public function setnombre_cat($nombre_cat){
        $this->nombre_cat=$nombre_cat;
        }
        public function getnombre_cat(){
        return $this->nombre_cat;
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
               $sql="CREATE TABLE Categorias(
                id_cat integer AUTO_INCREMENT,
                nombre_cat varchar(30),
                primary key(id_cat))";
            
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
                        $sql = "INSERT INTO Categorias(id_cat,nombre_cat) VALUES 
                        ('".$this->id_cat."','".$this->nombre_cat."')";                
                        if ($conn->query($sql) === TRUE) {
                            return  " ";
                        } else {
                            return "Error: " . $sql . "<br>" . $conn->error;
                        }
                    }
                $conn->close();
            }    
            public function getbyId($id_cat){        
                $conn = new mysqli( $this->conexion->getservername(), $this->conexion->getusername(), $this->conexion->getpassword(), $this->conexion->getdbname());        
                $sql = "SELECT id_cat, nombre_cat FROM Categorias where id_cat=" . $id_cat ;
                $result = $conn->query($sql);        
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {

                        
                       $this->id_cat = $row["id_cat"];
                        
                       $this->nombre_cat = $row["nombre_cat"]; 
                       
                       
            
                    }
                } 
                $conn->close();
            }
            public function borrar($id_cat){
                $conn = new mysqli($this->conexion->getservername(), $this->conexion->getusername(), $this->conexion->getpassword(), $this->conexion->getdbname());
                $sql = " DELETE FROM Categorias WHERE id_cat =$id_cat ";
                $conn->query($sql);        
                $conn->close();
            }  
            
            public function modificar($id_cat){
                $conn = new mysqli($this->conexion->getservername(), $this->conexion->getusername(), $this->conexion->getpassword(), $this->conexion->getdbname());
                $sql = "UPDATE Categorias SET nombre_cat='".$this->getnombre_cat()."' WHERE  id_cat=". $id_cat;
                $conn->query($sql);
            
                $conn->close();
            }

           
              
}

?>