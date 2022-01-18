<?php
include "conexionusuarios.php";
class Usuarios {
    public $id_user;
    public $id_tipo;
    public $usuario;
    public $contraseña;
    public $conexion;

    function __construct($id_user,$id_tipo,$usuario,$contraseña){
        $this->id_user=$id_user;
        $this->id_tipo=$id_tipo;
        $this->usuario = $usuario;
        $this->contraseña= $contraseña;
        $this->conexion = new conexion();
    }
   
    public function setid_tipo($id_tipo){
        $this->id_tipo=$id_tipo;
        }
        public function getid_tipo(){
        return $this->id_tipo;
        }
    public function setusuario($usuario){
        $this->usuario=$usuario;
        }
        public function getusuario(){
        return $this->usuario;
        }
        public function setcontraseña($contraseña){
            $this->contraseña=$contraseña;
            }
            public function getcontraseña(){
            return $this->contraseña;
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
               $sql="CREATE TABLE usuarios(
                id_user integer auto_increment,
                id_tipo integer,
                usuario varchar(30) unique,
                contraseña varchar(255),
                primary key(id_user),
                foreign key (id_tipo) references Tipos(id_tipo))";
            
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
                        $sql = "INSERT INTO usuarios(id_tipo,usuario, contraseña ) VALUES 
                        ('".$this->id_tipo."','".$this->usuario."','".$this->contraseña."')";                
                        if ($conn->query($sql) === TRUE) {
                            return  " ";
                        } else {
                            return "Error: " . $sql . "<br>" . $conn->error;
                        }
                    }
                $conn->close();
            }    
            public function getbyId($id_user){        
                $conn = new mysqli( $this->conexion->getservername(), $this->conexion->getusername(), $this->conexion->getpassword(), $this->conexion->getdbname());        
                $sql = "SELECT id_user, id_tipo,usuario, contraseña FROM usuarios where id_user=" . $id_user ;
                $result = $conn->query($sql);        
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {

                        
                       $this->id_user = $row["id_user"];
                       $this->id_user = $row["id_tipo"];
                       $this->usuario = $row["usuario"]; 
                       $this->contraseña = $row["contraseña"]; 
                       
            
                    }
                } 
                $conn->close();
            }
            public function borrar($id_user){
                $conn = new mysqli($this->conexion->getservername(), $this->conexion->getusername(), $this->conexion->getpassword(), $this->conexion->getdbname());
                $sql = " DELETE FROM usuarios WHERE id_user= $id_user ";
                $conn->query($sql);        
                $conn->close();
            }  
            
            public function modificar($id_user){
                $conn = new mysqli($this->conexion->getservername(), $this->conexion->getusername(), $this->conexion->getpassword(), $this->conexion->getdbname());
                $sql = "UPDATE usuarios SET id_tipo='".$this->getid_tipo()."',usuario='".$this->getusuario()."',contraseña='".$this->getcontraseña()."' WHERE  id_user=". $id_user;
                $conn->query($sql);
            
                $conn->close();
            }

           
              
}

?>