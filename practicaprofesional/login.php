<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Inicio de Sesión</title>

    <!--JQUERY-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
    <!-- Los iconos tipo Solid de Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
<!-- Nuestro css-->
<link rel="stylesheet" type="text/css" href="css/login.css" th:href="@{/css/index.css}">
<style>
    body{
        background: url(img/R.jfif);
        background-size: 100%;
        }
</style>
</head>

<?php
   
try{
	
	$login=htmlentities(addslashes($_POST["login"]));
	
	$password=htmlentities(addslashes($_POST["password"]));
	
    $contador=0;

	$base=new PDO("mysql:host=localhost; dbname=agenda" , "root", "rootroot");
	
	$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sql="SELECT * FROM usuarios WHERE usuario= :login";
	
	$resultado=$base->prepare($sql);	
		
	$resultado->execute(array(":login"=>$login));
    
		while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){			
			
            $id_rol=$registro['id_tipo'];
            //if(password_verify($password,$registro['contraseña'])){
                $contador++;
            //}		
			
            switch ($id_rol) {
                case 1:
                    header("Location: /practicaprofesional/menupractica.php");
                    break;
                case 2:
                    header("Location: /practicaprofesional/menupracticacajero.php");
                    break;
                case 3:
                    header("Location: /practicaprofesional/menupractica_mesero.php");
                    break;
                case 4:
                    header("Location: /practicaprofesional/menu_cocinero.php");
                    break;
                case 5:
                    header("Location: /practicaprofesional/menu_cadete.php");
                    break;
            }
			
		}
		
        
        if($contador==0 && !empty($_POST)){
            echo "<center><div class='alert alert-danger'>
                <strong>USUARIO NO REGISTRADO!</strong> Posiblemente ingreso mal su contraseña o usuario.
              </div></center>";
            
        }
        
							
		//var_dump($registro);die;
		
		$resultado->closeCursor();

	
	
}
catch(Exception $e){
	
	die("Error: " . $e->getMessage());
	
	
	
}
?>

<body>
<div class="modal-dialog text-center">
        <div class="col-sm-10 main-section">
            <div class="modal-content">
                <div class="col-12 user-img">
            
                    <img src="https://th.bing.com/th/id/OIP.MCayT58Axdi7GTmXoOPXlAHaHY?pid=ImgDet&w=586&h=584&rs=1" alt="Image" height="150" width="150" th:src="@{/img/user.png}"/>
                </div>
                <form class="col-12" id="login" method="POST" action="login.php">
                    <div class="form-group" id="user-group">
                        <input type="text" class="form-control" placeholder="Nombre de usuario"  name="login"/>
                    </div>
                    <div class="form-group" id="contrasena-group">
                        <input type="password" class="form-control" placeholder="Contraseña"   name="password"/>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i>  Ingresar </button>
                </form>
               
                
            </div>
        </div>
    </div>
</body>
</html>
