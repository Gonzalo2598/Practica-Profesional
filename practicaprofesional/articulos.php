<?php
include "conexionusuarios.php";
class Articulos {
    private $id_cat;
    private $codigo;
    private $descripcion;
    private $precio_compra;
    private $precio_venta;
    private $existencia;
    private $conexion;

    function __construct($id_cat,$codigo ,$descripcion, $precio_compra, $precio_venta, $existencia){
       
        $this->id_cat=$id_cat;
        $this->codigo= $codigo;
        $this->descripcion= $descripcion;
        $this->precio_compra= $precio_compra;
        $this->precio_venta= $precio_venta;
        $this->existencia= $existencia;
        $this->conexion = new conexion();
    }
   
public function setid_cat($id_cat){
        $this->id_cat=$id_cat;
        }
public function getid_cat(){
    return $this->id_cat;
}

public function setcodigo($codigo){
    $this->codigo=$codigo;
}
public function getcodigo(){
    return $this->codigo;
}

public function setdescripcion($descripcion){
        $this->descripcion=$descripcion;
}
public function getdescripcion(){
     return $this->descripcion;
}

        public function setprecio_compra($precio_compra){
        $this->precio_compra=$precio_compra;
 }
        public function getprecio_compra(){
        return $this->precio_compra;
}
public function setprecio_venta($precio_venta){
    $this->precio_venta=$precio_venta;
}
    public function getprecio_venta(){
    return $this->precio_venta;
}

public function setexistencia($existencia){
    $this->existencia=$existencia;
}
    public function getexistencia(){
    return $this->existencia;
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
               $sql="CREATE TABLE Articulos(
                id_art integer AUTO_INCREMENT,
                id_cat  integer,
                codigo VARCHAR(255) NOT NULL,
                descripcion VARCHAR(255) NOT NULL,
                precio_compra decimal(10,2)NOT NULL,
                precio_venta  decimal(10,2)NOT NULL,
                existencia decimal(10,2)NOT NULL,
                primary key(id_art),
                foreign key (id_cat) references Categorias(id_cat))";
            
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
                            $sql = "INSERT INTO Articulos(id_cat,codigo,descripcion, precio_compra,precio_venta,existencia) VALUES 
                            ('".$this->id_cat."','".$this->codigo."','".$this->descripcion."','".$this->precio_compra."','".$this->precio_venta."','".$this->existencia."')";                
                            if ($conn->query($sql) === TRUE) {
                                return  " ";
                            } else {
                                return "Error: " . $sql . "<br>" . $conn->error;
                            }
                        }
                    $conn->close();
                
            }    
            public function getbyId($id_art){        
                $conn = new mysqli( $this->conexion->getservername(), $this->conexion->getusername(), $this->conexion->getpassword(), $this->conexion->getdbname());        
                $sql = "SELECT id_art, id_cat,codigo,descripcion, precio_compra,precio_venta,existencia FROM Articulos where id_art=" . $id_art ;
                $result = $conn->query($sql);        
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {

                       $this->id_cat = $row["id_cat"];
                       $this->codigo = $row["codigo"];
                       $this->descripcion = $row["descripcion"]; 
                       $this->precio_compra = $row["precio_compra"];
                       $this->precio_venta = $row["precio_venta"];
                       $this->existencia = $row["existencia"]; 
                       
            
                    }
                } 
                
                $conn->close();
            }
            public function borrar($id_art){
                $conn = new mysqli($this->conexion->getservername(), $this->conexion->getusername(), $this->conexion->getpassword(), $this->conexion->getdbname());
                $sql = " DELETE FROM Articulos WHERE id_art =$id_art  ";
                $conn->query($sql);        
                $conn->close();
            }  
            
            public function modificar($id_art){
                $conn = new mysqli($this->conexion->getservername(), $this->conexion->getusername(), $this->conexion->getpassword(), $this->conexion->getdbname());
                $sql = "UPDATE Articulos SET id_cat='".$this->getid_cat()."',codigo='".$this->getcodigo()."', descripcion='".$this->getdescripcion()."', precio_compra='".$this->getprecio_compra()."', precio_venta='".$this->getprecio_venta()."', existencia='".$this->getexistencia()."'  WHERE  id_art=". $id_art;
                $conn->query($sql);
            
                $conn->close();
            }

           
           
              
}

?>