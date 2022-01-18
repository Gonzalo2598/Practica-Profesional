<?php
include "vista/header.php";
?>
    <title>Articulos</title>
<?php
include "vista/nav.php";
?>  
<!-- Header Navbar -->
<center>
<?php

        include "articulos.php";

        if(isset($_GET["id_art"])){
            $id_art=$_GET["id_art"];
            $articulo = new Articulos("","","","","","","");
            $articulo->getbyId($id_art);
            $id_cat = $articulo->getid_cat();
            $codigo =  $articulo->getcodigo();
            $descripcion = $articulo->getdescripcion();
            $precio_compra=$articulo->getprecio_compra();
            $precio_venta=$articulo->getprecio_venta();
            $existencia=$articulo->getexistencia();       

        }
        else{
        
            $id_cat= "";
            $codigo ="";
            $descripcion="";
            $precio_compra="";
            $precio_venta="";
            $existencia="";
            $id_art=0;
        }
        
        if(isset($_POST["id_cat"]) &&
        isset($_POST["codigo"]) &&
        isset($_POST["descripcion"]) &&
        isset($_POST["precio_compra"]) &&
        isset($_POST["precio_venta"]) &&
        isset($_POST["existencia"]) &&
        isset($_POST["id_art"])){
            $id_art = $_POST["id_art"];
            $id_cat = $_POST["id_cat"];
            $codigo = $_POST["codigo"];
            $descripcion = $_POST["descripcion"];
            $precio_compra = $_POST["precio_compra"];
            $precio_venta = $_POST["precio_venta"];
            $existencia = $_POST["existencia"];
            $articulo = new Articulos($id_cat,$codigo,$descripcion, $precio_compra,$precio_venta, $existencia);
            $articulo->conectar();
            $articulo->creartabla();

            
            if($id_art==0){
                //Es nuevo
                echo $articulo->guardar();
                header("Location: /practicaprofesional/lista_articulos.php");
                ob_end_flush();
                exit;
            }
            else{
                //Modificar
                echo $articulo->modificar($id_art);
                header("Location: /practicaprofesional/lista_articulos.php");                
            }                        
        }    
        
      
    ?>

    
    <!-- Main content -->
    <section class="content">
    <div class="modal-dialog text-center">
            <div class="col-md-13 main-section">
            <div class="modal-content">
            <div><h3>Registrar Bebidas y Platillos</h3></div>
                    <div class="panel-body">
                     <form method="POST" action="almacen_articulos.php">
                            <div class="form-group">
                            <label>Categoria</label>
                            <?Php
                            $con = new conexion();
                            $conn = new mysqli($con->getservername(), $con->getusername(), $con->getpassword(), $con->getdbname());                
                            $sql = "SELECT * FROM Categorias";
                            $result = $conn->query($sql);
                            ?>
                            <select class="form-control" name="id_cat" id="id_cat" value="<?php echo $id_cat ?>">
                            <option>Seleccioná</option>
                            <?php
                            while($lista=mysqli_fetch_assoc($result))
                            echo   "<option value='".$lista["id_cat"]."'> ".$lista['nombre_cat']."</option>"; 
                            ?>
                            </select>
                            </div>
                        
                            <div class="form-group">
                                <label>Codigo de barra:</label>
                                <i><input type="text" class="form-control" name="codigo" id="codigo" placeholder="codigo"  required value="<?PHP echo $codigo ?>"></i>
                            </div>
                            <div class="form-group">
                                <label>Descripcion:</label>
                                <i><input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="descripcion"  required value="<?PHP echo $descripcion ?>"></i>
                            </div>
                        
                            <div class="form-group">
                                <label>Precio Compra:</label>
                                <i><input type="text" class="form-control" name="precio_compra" id="precio_compra" placeholder="Precio de compra"  required value="<?PHP echo $precio_compra ?>"></i>
                            </div>
                            <div class="form-group">
                                <label>Precio Venta:</label>
                                <i><input type="text" class="form-control" name="precio_venta" id="precio_venta" placeholder="Precio de venta"  required value="<?PHP echo $precio_venta ?>"></i>
                            </div>
                            <div class="form-group">
                                <label>Stock:</label>
                                <i><input type="text" class="form-control" name="existencia" id="existencia" placeholder="Stock"  required value="<?PHP echo $existencia ?>"></i>
                            </div>
                            <i> <input type="hidden" class="form-control" name="id_art" id="id_art" placeholder="" required value="<?PHP echo $id_art ?>"></i>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Guardar</button>
                                <a href="lista_articulos.php" class="btn btn-danger"><i class="fa fa-arrow-circle-left"></i> Cancelar</a>
                                </div>
                          </form>
                    </div>
                <div>
                </div>
                <div>
                <!-- /.box -->
                </section>
</center>
<!-- Main Footer -->

        <!-- To the right -->
<?php
include "vista/footer.php";
?>  