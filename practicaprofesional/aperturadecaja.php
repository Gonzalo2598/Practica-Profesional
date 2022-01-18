<?php
include "conexionusuarios.php";
class Apertura {
    private $id_apertura;
    private $nombre;
    private $apellido;
    private $saldo;
    private $fecha;
    private $monto;
    private $conexion;

    function __construct($id_apertura,$nombre,$apellido,$saldo,$fecha,$monto){
        $this->id_apertura= $id_apertura;
        $this->nombre = $nombre;
        $this->apellido= $apellido;
        $this->saldo= $saldo;
        $this->fecha= $fecha;
        $this->monto= $monto;
        $this->conexion = new conexion();
    }
   
    public function setnombre($nombre){
        $this->nombre=$nombre;
        }
        public function getnombre(){
        return $this->nombre;
        }
    public function setapellido($apellido){
         $this->apellido=$apellido;
        }
     function getapellido(){
        return $this->apellido;
        }
    public function setsaldo($saldo){
         $this->saldo=$saldo;
        }
     function getsaldo(){
        return $this->saldo;
        }    
    public function setfecha($fecha){
        $this->fecha=$fecha;
        }
    public function getfecha(){
        return $this->fecha;
        } 
     
    public function setmonto($monto){
        $this->monto=$monto;
        }
    public function getmonto(){
        return $this->monto;
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
            $sql="CREATE TABLE Apertura(
                id_apertura integer auto_increment,
                nombre varchar(30),
                apellido varchar(30),
                saldo  decimal(10,2),
                fecha varchar(30),
                monto  decimal(10,2),
                primary key(id_apertura))";
            
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
                $sql = "INSERT INTO Apertura (id_apertura,nombre, apellido, saldo, fecha, monto) VALUES 
                ('".$this->id_apertura."','".$this->nombre."','".$this->apellido."', '".$this->saldo."','".$this->fecha."', '".$this->monto."')";                
                        if ($conn->query($sql) === TRUE) {
                            return  " ";
                        } else {
                            return "Error: " . $sql . "<br>" . $conn->error;
                        }
                    }
                $conn->close();
            }    
            public function getbyId($id_apertura){        
                $conn = new mysqli( $this->conexion->getservername(), $this->conexion->getusername(), $this->conexion->getpassword(), $this->conexion->getdbname());        
                $sql = "SELECT id_apertura, nombre, apellido,saldo,fecha,monto FROM Apertura where id_apertura=" . $id_apertura ;
                $result = $conn->query($sql);        
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {

                        
                       $this->id_apertura = $row["id_apertura"];
                       $this->nombre = $row["nombre"]; 
                       $this->apellido = $row["apellido"]; 
                       $this->saldo = $row["saldo"];
                       $this->fecha = $row["fecha"];
                       $this->monto = $row["monto"];
            
                    }
                } 
                $conn->close();
            }
    public function borrar($id_apertura){
    $conn = new mysqli($this->conexion->getservername(), $this->conexion->getusername(), $this->conexion->getpassword(), $this->conexion->getdbname());
    $sql = " DELETE FROM Apertura WHERE id_apertura= $id_apertura ";
    $conn->query($sql);        
    $conn->close();
    }  
            
    public function modificar($id_apertura){
    $conn = new mysqli($this->conexion->getservername(), $this->conexion->getusername(), $this->conexion->getpassword(), $this->conexion->getdbname());
    $sql = "UPDATE Apertura SET nombre='".$this->getnombre()."',apellido='".$this->getapellido()."',saldo='".$this->getsaldo()."',fecha='".$this->getfecha()."',monto='".$this->getmonto()."' WHERE  id_apertura=". $id_apertura;
    $conn->query($sql);
            
    $conn->close();
            }

           
              
}

?>