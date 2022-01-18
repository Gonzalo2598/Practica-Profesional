<?php
include "conexionusuarios.php";
class Mesas {
    private $id_mesa;
    private $estado_mesa;
    private $estado_pago;
    private $conexion;

    function __construct($id_mesa,$estado_mesa, $estado_pago){
        $this->id_mesa=$id_mesa;
        $this->estado_mesa = $estado_mesa;
        $this->estado_pago=$estado_pago;
        $this->conexion = new conexion();
    }
   
    public function setestado_mesa($estado_mesa){
        $this->estado_mesa=$estado_mesa;
        }
        public function getestado_mesa(){
        return $this->estado_mesa;
        }

        public function setestado_pago($estado_pago){
            $this->estado_pago=$estado_pago;
            }
            public function getestado_pago(){
            return $this->estado_pago;
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
               $sql="CREATE TABLE Mesas(
                id_mesa integer auto_increment,
                estado_mesa varchar(30),
                estado_pago varchar(30),
                primary key(id_mesa))";
            
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
                        $sql = "INSERT INTO Mesas(id_mesa,estado_mesa, estado_pago) VALUES 
                        ('".$this->id_mesa."','".$this->estado_mesa."', '".$this->estado_pago."')";                
                        if ($conn->query($sql) === TRUE) {
                            return  " ";
                        } else {
                            return "Error: " . $sql . "<br>" . $conn->error;
                        }
                    }
                $conn->close();
            }    
            public function getbyId($id_mesa){        
                $conn = new mysqli( $this->conexion->getservername(), $this->conexion->getusername(), $this->conexion->getpassword(), $this->conexion->getdbname());        
                $sql = "SELECT id_mesa, estado_mesa, estado_pago  FROM Clientes where id_mesa=" . $id_mesa ;
                $result = $conn->query($sql);        
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {

                        
                       $this->id_mesa = $row["id_mesa"];
                        
                       $this->estado_mesa = $row["estado_mesa"]; 
                       
                       $this->estado_pago = $row["estado_pago"];
            
                    }
                } 
                $conn->close();
            }
            public function borrar($id_mesa){
                $conn = new mysqli($this->conexion->getservername(), $this->conexion->getusername(), $this->conexion->getpassword(), $this->conexion->getdbname());
                $sql = " DELETE FROM Mesas WHERE id_mesa =$id_mesa ";
                $conn->query($sql);        
                $conn->close();
            }  
            
            public function modificar($id_mesa){
                $conn = new mysqli($this->conexion->getservername(), $this->conexion->getusername(), $this->conexion->getpassword(), $this->conexion->getdbname());
                $sql = "UPDATE Mesas SET estado_mesa='".$this->getestado_mesa()."', estado_pago='".$this->getestado_pago()."'  WHERE  id_mesa=". $id_mesa;
                $conn->query($sql);
            
                $conn->close();
            }

           
              
}

?>