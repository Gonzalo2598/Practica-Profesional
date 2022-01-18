<?php
include "vista/header.php";
?>
    <title>USUARIOS</title>
<?php
include "vista/nav.php";
?>     
<!-- Header Navbar -->
         
      <center>
<?php

        include "usuarios.php";

        if(isset($_GET["id_user"])){
            $id_user=$_GET["id_user"];
            $user = new usuarios("","","","");
            $user->getbyId($id_user);
            $id_tipo = $user->getid_tipo();
            $usuario = $user->getusuario(); 
            $contraseña = $user->getcontraseña();         
        }
        else{
            $id_tipo = "";
            $usuario = ""; 
            $contraseña ="";
            $id_user=0;
        }
        
        if(isset($_POST["id_tipo"]) &&
        isset($_POST["usuario"]) &&
        isset($_POST["contraseña"]) &&
        isset($_POST["id_user"]) ){
            $id_user = $_POST["id_user"];
            $id_tipo = $_POST["id_tipo"];
            $usuario = $_POST["usuario"];
            $contraseña = $_POST["contraseña"];
            $ce = password_hash($contraseña,PASSWORD_DEFAULT);
            $user = new usuarios($id_user,  $id_tipo,$usuario, $ce);
            $user->conectar();
            $user->creartabla();
            if($id_user==0){
                //Es nuevo
                echo $user->guardar();
                header("Location: /practicaprofesional/Listadeusuarios.php");
                ob_end_flush();
                exit;
            }
            else{
                //Modificar
                echo $user->modificar($id_user);
                header("Location: /practicaprofesional/Listadeusuarios.php");                
            }                        
        }    
        
      
    ?>

 <div class="content-wrapper">        
    <!-- Main content -->
    <section class="content">
    <div class="modal-dialog text-center">
            <div class="col-md-13 main-section">
            <div class="modal-content">
            <div><h3>Registrar Usuario</h3></div>
                    <div class="panel-body">
                                                <form method="Post" action="almacenusuarios.php">
                                                <div class="form-group">
                                
                               <i> <input type="hidden" class="form-control" name="id_user" id="id_user" placeholder="" required value="<?PHP echo $id_user ?>"></i>
                                
                            </div>

                            <div class="form-group">
                             <label>Tipos</label>
                             <?Php
                                if (isset($_GET["id_user"])) {
                                
                                    $con = new conexion();
                                    $conn = new mysqli($con->getservername(), $con->getusername(), $con->getpassword(), $con->getdbname());  
                                    $sql2 = "SELECT tipos.* FROM tipos INNER JOIN usuarios ON usuarios.id_tipo=tipos.id_tipo WHERE id_user=".$_GET["id_user"]; 
                                    $result2 = $conn->query($sql2);
                                    while($lista=mysqli_fetch_assoc($result2)){
                                        if ($lista["nombre_tipo"] != "Administrador") {
                                            echo "<select  class='form-control' name='id_tipo' id='id_tipo' value=".$id_tipo.">";
                                            $sql = "SELECT * FROM Tipos";
                                            $result = $conn->query($sql);
                                            while($lista=mysqli_fetch_assoc($result))
                                            echo   "<option select value='".$lista["id_tipo"]."'> ".$lista['nombre_tipo']."</option>"; 
                                        } else {
                                            echo "<input type='text' class='form-control' value='".$lista["nombre_tipo"]."' disabled>
                                                  <input type='hidden' class='form-control' name='id_tipo' id='id_tipo' value='".$lista["id_tipo"]."' disabled> ";
                                        }
                                        
                                    }
                                } else {
                                    header("Location: /practicaprofesional/Listadeusuarios.php");

                                }
                                    
                                ?>
                            </select>
                            </div>
                            <div class="form-group">
                                <label>USUARIO:</label>
                                <i><input type="text" class="form-control" name="usuario" id="usuario" placeholder="Nombre Usuario" pattern="[a-zA-Z0-9,ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ]{5,60}" required value="<?PHP echo $usuario ?>"></i>
                            </div>
                        
                            <div class="form-group">
                                <label>CONTRASEÑA:</label>
                                <i><input type="password" class="form-control" name="contraseña" id="contraseña" placeholder="Contraseña Usuario"   value="<?PHP echo $contraseña ?>"></i>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Guardar</button>
                                <a href="listadeusuarios.php" class="btn btn-danger"><i class="fa fa-arrow-circle-left"></i> Cancelar</a>
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
<?php
include "vista/footer.php";
?>