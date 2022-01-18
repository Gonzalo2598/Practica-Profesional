<?php
include "conexionusuarios.php";
class Compras {
    private $id_compra;
    private $id_prov;
	private $id_caja;
    private $fecha;
    private $descuento_porcentaje;
    private $impuesto_porcentaje;
    private $total;
    private $conexion;

    function __construct($id_compra,$id_prov,$id_caja ,$fecha, $descuento_porcentaje, $impuesto_porcentaje, $total){
        $this->id_compra=$id_compra;
        $this->id_prov=$id_prov;
		$this->id_caja=$id_caja;
        $this->fecha= $fecha;
        $this->descuento_porcentaje= $descuento_porcentaje;
        $this->impuesto_porcentaje= $impuesto_porcentaje;
        $this->total= $total;
        $this->conexion = new conexion();
    }
   
public function setid_prov($id_prov){
        $this->id_prov=$id_prov;
        }
public function getid_prov(){
    return $this->id_prov;
}

public function setid_caja($id_caja){
    $this->id_caja=$id_caja;
}
public function getid_caja(){
    return $this->id_caja;
}

public function setfecha($fecha){
        $this->fecha=$fecha;
}
public function getfecha(){
     return $this->fecha;
}

        public function setdescuento_porcentaje($descuento_porcentaje){
        $this->descuento_porcentaje=$descuento_porcentaje;
 }
        public function getdescuento_porcentaje(){
        return $this->descuento_porcentaje;
}
public function setimpuesto_porcentaje($impuesto_porcentaje){
    $this->impuesto_porcentaje=$impuesto_porcentaje;
}
    public function getimpuesto_porcentaje(){
    return $this->impuesto_porcentaje;
}

public function settotal($total){
    $this->total=$total;
}
    public function gettotal(){
    return $this->total;
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
               $sql="CREATE TABLE Compras(
                id_compra integer AUTO_INCREMENT,
                id_prov  integer,
				id_caja  integer,
                fecha date,
                descuento_porcentaje decimal(10,2),
				impuesto_porcentaje decimal(10,2),
				total decimal(10,2),
                primary key(id_compra),
                foreign key (id_prov) references Proveedores(id_prov),
				foreign key (id_caja) references Cajas(id_caja))";
            
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
                            $sql = "INSERT INTO Compras(id_prov,id_caja,fecha, descuento_porcentaje,impuesto_porcentaje,total) VALUES 
                            ('".$this->id_prov."','".$this->id_caja."','".$this->fecha."','".$this->descuento_porcentaje."','".$this->impuesto_porcentaje."','".$this->total."')";                
                            if ($conn->query($sql) === TRUE) {
                                return  " ";
                            } else {
                                return "Error: " . $sql . "<br>" . $conn->error;
                            }
                        }
                    $conn->close();
                
            }    
            public function getbyId($id_compra){        
                $conn = new mysqli( $this->conexion->getservername(), $this->conexion->getusername(), $this->conexion->getpassword(), $this->conexion->getdbname());        
                $sql = "SELECT id_compra, id_prov,id_caja,fecha, descuento_porcentaje,impuesto_porcentaje,total FROM Compras where id_compra=" . $id_compra ;
                $result = $conn->query($sql);        
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        
                    $this->id_compra = $row["id_compra"];
                    $this->id_prov = $row["id_prov"];
                    $this->id_caja = $row["id_caja"];
                    $this->fecha = $row["fecha"]; 
                    $this->descuento_porcentaje = $row["descuento_porcentaje"];
                    $this->impuesto_porcentaje = $row["impuesto_porcentaje"];
                    $this->total = $row["total"]; 
                       
            
                    }
                } 
                
                $conn->close();
            }
            public function borrar($id_compra){
                $conn = new mysqli($this->conexion->getservername(), $this->conexion->getusername(), $this->conexion->getpassword(), $this->conexion->getdbname());
                $sql = "DELETE FROM compras WHERE id_compra =$id_compra";
                $conn->query($sql);        
                $conn->close();
            }  
            
            public function modificar($id_compra){
                $conn = new mysqli($this->conexion->getservername(), $this->conexion->getusername(), $this->conexion->getpassword(), $this->conexion->getdbname());
                $sql = "UPDATE Compras SET id_prov='".$this->getid_prov()."',id_caja='".$this->getid_caja()."', fecha='".$this->getfecha()."', descuento_porcentaje='".$this->getdescuento_porcentaje()."', impuesto_porcentaje='".$this->getimpuesto_porcentaje()."', total='".$this->gettotal()."'  WHERE  id_compra=". $id_compra;
                $conn->query($sql);
            
                $conn->close();
            }

           
           
              
}

?>