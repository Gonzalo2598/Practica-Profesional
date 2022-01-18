<html>
  <head>
    <title>Apertura y Cierre</title>
     <!-- Link Insert -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <?php include "./class_lib/links.php"; ?>
    <?php include "conexionusuarios.php"; ?>
  </head>
  <body onload="pone_lista_registrocajas();">

    <div class="wrapper">

      <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <?php
        include('class_lib/nav_header.php');
        ?>

      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <?php
        include('class_lib/sidebar_cajero.php');
        include('class_lib/class_conecta_mysql.php');
        require('class_lib/funciones.php');

        $db=new ConexionMySQL();

        
        $sql="SELECT id_caja from cajas where estado=1";
        $id_caja=$db->consulta($sql);

        while($row=mysql_fetch_assoc($id_caja)){
        $idcaja=$row["id_caja"];

        }

        $sql="SELECT estado from cajas where id_caja='$idcaja'";
        $estado=$db->consulta($sql);

        while($row=mysql_fetch_assoc($estado)){
        $Resulatdo=$row["estado"];

        }
        
        ?>
        <script type="text/javascript">
        function Recogerdatos() {
          

          if("<?php echo $Resulatdo; ?>"==true){
            alert("Ya esta abierta una Caja. Cerrala para volver a abrir nuevamente");
            window.location="lista_administracion_cajas.php";
            

          
          }
          else{
            
          }
            
        }
        </script>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      
        <!-- Content Header (Page header) -->
        

        <!-- Main content -->
 <!-- Modal -->
<div class="modal fade" id="Arqueo">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Arqueo de Caja</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <?php



 $con = new conexion();
 $conn = new mysqli($con->getservername(), $con->getusername(), $con->getpassword(), $con->getdbname());                
 $sql = "SELECT u.usuario,id_caja,monto_inicial,sobrante,fecha_apertura from cajas INNER JOIN usuarios u ON cajas.id_user=u.id_user WHERE estado=1";
 $resultarticulo = $conn->query($sql);
 echo "<div ><table class='table table-hover' style='width:60%'>
     <tr> 
     <th>Usuario</th>
     <th>Caja</th>
     <th>Monto Inicial</th>
     <th>Sobrante</th>
     <th>Fecha Apertura</th>
     </tr>";
 if ($resultarticulo->num_rows > 0) {
     while($row = $resultarticulo->fetch_assoc()) {
         echo "<tr >  
         
                 <td align='center'>" . $row["usuario"] . "</td>
                 <td align='center'>" . $row["id_caja"] . "</td>
                 <td align='center'>" . $row["monto_inicial"] . "</td>
                 <td align='center'>" . $row["sobrante"] . "</td>
                 <td align='center'>" . $row["fecha_apertura"] . "</td>
                 
              </tr>";
     }
 } 
 echo "</table></div>";

 
 $con = new conexion();
 $conn = new mysqli($con->getservername(), $con->getusername(), $con->getpassword(), $con->getdbname());                
 $sql = "SELECT v.total, 'ingresos' as tipo from ventas v INNER JOIN cajas c ON v.id_caja=c.id_caja  WHERE c.estado=1";
 $resultarticulo = $conn->query($sql);

 $sql = "SELECT e.total as Egresos from compras e INNER JOIN cajas c ON e.id_caja=c.id_caja  WHERE c.estado=1";
 $result2 = $conn->query($sql);

 $sql = "SELECT g.faltante from gestion_cajas g INNER JOIN cajas c ON g.id_caja=c.id_caja WHERE c.estado=1";
 $result3 = $conn->query($sql);

 echo "<div ><table class='table table-hover' style='width:60%'>
     <tr> 
     <th style='width:10%'>Ingresos Detallados</th>
     <th style='width:10%'>Egresos Detallados</th>
     
     </tr>";
 if ($resultarticulo->num_rows > 0) {

     while($row = $resultarticulo->fetch_assoc()) {
         echo "<tr >  
         
                 <td align='center'>" . $row["total"] . "</td> <td></td></tr>";
                 
             
                 
     }
 }
 else{
  echo "<tr>";
 } 
 if($result2->num_rows > 0){
  while($row = $result2->fetch_assoc()){
    echo "<tr> 
    <td></td><td align='center'>" . $row["Egresos"] . "</td> </tr>";
    
    
  }
 }
 else{
   echo "</tr>";
 }
 

 if($result3->num_rows > 0){
  while($row = $result3->fetch_assoc()){
    echo "<tr> 
    <td></td><td align='center'>" . $row["faltante"] . "</td> </tr>";
    
    
  }
 }
 else{
   echo "</tr>";
 }
 echo "</table></div>";


 $con = new conexion();
 $conn = new mysqli($con->getservername(), $con->getusername(), $con->getpassword(), $con->getdbname());                
 $sql = "SELECT SUM(v.total)as Ingresos,((SELECT SUM(e.total) from compras e WHERE e.id_caja=v.id_caja)+(SELECT SUM(g.faltante)from gestion_cajas g where g.id_caja=c.id_caja))as Egresos from ventas v INNER JOIN cajas c ON v.id_caja=c.id_caja WHERE c.estado=1";
 $resultSub = $conn->query($sql);
 echo "<div ><table class='table table-hover' style='width:60%'>";

 if ($resultSub->num_rows > 0) {
     while($row = $resultSub->fetch_assoc()) {
      echo "<tr >  
         
      <td align='center'>" . $row["Ingresos"] . "</td>
      <td align='center'>" . $row["Egresos"] . "</td>
      
   </tr>";
     }
 } 
 echo "</table></div>";


 $con = new conexion();
 $conn = new mysqli($con->getservername(), $con->getusername(), $con->getpassword(), $con->getdbname());                
 $sql = "SELECT ((((SUM(v.total) + c.monto_inicial) - (SELECT SUM(e.total) FROM compras e WHERE e.id_caja = v.id_caja))+c.sobrante)-(SELECT SUM(g.faltante) from gestion_cajas g WHERE g.id_caja=v.id_caja)) as 'monto_final' from ventas v inner join cajas c ON c.id_caja = v.id_caja where c.estado = 1";
 $resultSub = $conn->query($sql);
 echo "<div ><table rowspan='0' id='res' style='width:60%'>";
 if ($resultSub->num_rows > 0) {
     while($row = $resultSub->fetch_assoc()) {
      echo "<tr >  
          <td align='center'>Saldo de Caja</td>
          <td align='center'>" . $row["monto_final"] . "</td>
      
   </tr>";
     }
 } 
 echo "</table></div>";

 $conn->close();





?>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>         
 <!-- Modal -->
<div class="modal fade" id="cerrar">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Cerrar Caja</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
              
                <div class="form-group">
                  <label for="nombre-producto">Fecha de Cierre</label>
                  <input  id="fecha_cierre" name="fecha_cierre" type="datetime" disabled="disabled" class="form-control" value="<?php date_default_timezone_set("America/Argentina/Buenos_Aires"); echo date("Y-m-d G:i:s");?>" ></input>
                </div>
                <div class="form-group">
                  <label for="concentracion">Monto Final</label>
                  <?Php
                $con = new conexion();
                $conn = new mysqli($con->getservername(), $con->getusername(), $con->getpassword(), $con->getdbname());                
                $sql = "SELECT ((((SUM(v.total) + c.monto_inicial) - (SELECT SUM(e.total) FROM compras e WHERE e.id_caja = v.id_caja))+c.sobrante)-(SELECT SUM(g.faltante) from gestion_cajas g WHERE g.id_caja=v.id_caja)) as 'monto_final' from ventas v inner join cajas c ON c.id_caja = v.id_caja where c.estado = 1";
                $result = $conn->query($sql);
                ?>
                
                <?php
                while($lista=mysqli_fetch_assoc($result))
                
                echo   "<input type='text' class='form-control' id='monto_final' value='".$lista["monto_final"]."' disabled>";  
                ?>
                </div>
                <div class="form-group">
                  <label for="precio">Ingresos</label>
                <?Php
                $con = new conexion();
                $conn = new mysqli($con->getservername(), $con->getusername(), $con->getpassword(), $con->getdbname());                
                $sql = "SELECT SUM(total) FROM ventas where id_caja in(select id_caja from cajas where estado=1)";
                $result = $conn->query($sql);
                ?>
                
                <?php
                while($lista=mysqli_fetch_assoc($result))
                
                echo   "<input type='text' class='form-control' id='ingreso' value='".$lista["SUM(total)"]."' disabled>";  
                ?>
                
                </div>
                <div class="form-group">
                  <label >Egresos</label>
                  <?Php
                $con = new conexion();
                $conn = new mysqli($con->getservername(), $con->getusername(), $con->getpassword(), $con->getdbname());                
                $sql = "SELECT SUM(total) FROM compras where id_caja in(select id_caja from cajas where estado=1)";
                $result = $conn->query($sql);
                ?>
                  
<?php
                while($lista=mysqli_fetch_assoc($result))
                
                echo   "<input type='text' class='form-control' id='egreso' value='".$lista["SUM(total)"]."' disabled>";  
                ?>
                </div>

                <div class="form-group">
                  <label >Faltante</label>
                  <?Php
                $con = new conexion();
                $conn = new mysqli($con->getservername(), $con->getusername(), $con->getpassword(), $con->getdbname());                
                $sql = "SELECT sum(g.faltante)as Faltante from gestion_cajas g INNER JOIN cajas c ON g.id_caja=c.id_caja WHERE c.estado=1";
                $result = $conn->query($sql);
                ?>
                
                <?php
                while($lista=mysqli_fetch_assoc($result))
                
                echo   "<input type='text' class='form-control' id='estado_cierre'  name='estado_cierre' value='".$lista["Faltante"]."' disabled>";  
                ?>
                  
                </div>

              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-success"  onclick='registra_cierre();' id='btn-reg'>Guardar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>       
        <!-- Modal -->
<div class="modal fade" id="producto">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Apertura de Caja</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form-crear-producto">
                

                <div class="form-group">            
                <label>Empleado</label>
                <?Php
                
                $con = new conexion();
                $conn = new mysqli($con->getservername(), $con->getusername(), $con->getpassword(), $con->getdbname());                
                $sql = "SELECT * FROM usuarios";
                $result = $conn->query($sql);
                ?>
                 <select class="form-control" name="id_user" id="id_user" value="<?php echo $id_user ?>" disabled>
                <?php
                while($lista=mysqli_fetch_assoc($result))
                
                echo   "<option value='".$lista["id_user"]."'> ".$lista['usuario']."</option>";   
                ?>
                </select>
                </div>
                
                <div class="form-group">
                  <label for="precio">Fecha de Apertura</label>
                
                  <input id="fecha_apertura" type="datetime" disabled="disabled" class="form-control"  value="<?php date_default_timezone_set("America/Argentina/Buenos_Aires"); echo date("Y-m-d G:i:s");?>" placeholder="Ingrese Monto" ></input>
                  
                </div>

                <div class="form-group">
                  <label for="marca">Monto Inicial</label>
                  <input id="monto_inicial" type="text" class="form-control" value="" placeholder="Ingrese Monto" ></input>
                </div>

                <div class="form-group">
                  <label for="estado">Estado</label>
                <input style='width:20%' id="estado" type="number" disabled="disabled" class="form-control" value="1" ></input>
                </div>

              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-success"  onclick='registra_cajas();' id='btn-reg-adm'>Guardar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    
      <div class="modal fade" id="Sobrante">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Sobrante de Caja</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="fupForm" name="form1" method="post">
                
                <div class="form-group">
                  <label for="marca">Sobrante</label>
                  <input id="sobrante" name="sobrante" type="text" class="form-control" value="" ></input>
                </div>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <input type="button" class='btn btn-primary' name="save" value="Guardar" id="butsave"> 

              </form>
            </div>
            <div class="modal-footer justify-content-between">
              
              
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

<script>
$(document).ready(function() {
	$('#butsave').on('click', function() {
		$("#butsave").attr("disabled", "disabled");
		var sobrante = $('#sobrante').val();
		if(sobrante!=""){
      console.log($("#sobrante").val());
			$.ajax({
				url: "guardar_sobrante.php",
				type: "POST",
				data: {
					sobrante: sobrante				
				},
				cache: false,
				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						$("#butsave").removeAttr("disabled");
						$('#fupForm').find('input:text').val('');
						$("#success").show();
						$('#success').html('Data added successfully !');
            location.reload(); 						
					}
					else if(dataResult.statusCode==201){
					   alert("Error occured !");
					}
					
				}
			});
		}
		else{
			alert('Please fill all the field !');
		}
	});
});
</script>



      <div class="modal fade" id="Faltante">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Faltante de Caja</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="fupFalt" name="form1" method="post">
              <div class="form-group">
                  <label for="marca">Caja</label>
                  <?Php
                
                $con = new conexion();
                $conn = new mysqli($con->getservername(), $con->getusername(), $con->getpassword(), $con->getdbname());                
                $sql = "SELECT id_caja from cajas where estado=1";
                $result = $conn->query($sql);
                ?>
                 <select class="form-control" name="id_caja" id="id_caja" value="<?php echo $id_caja ?>" disabled>
                <?php
                while($lista=mysqli_fetch_assoc($result))
                
                echo   "<option value='".$lista["id_caja"]."'> ".$lista['id_caja']."</option>";
                ?>
                </select>
                  
                </div>

                <div class="form-group">
                  <label for="marca">Usuario</label>
                
                <?Php
                
                $con = new conexion();
                $conn = new mysqli($con->getservername(), $con->getusername(), $con->getpassword(), $con->getdbname());                
                $sql = "SELECT * FROM usuarios";
                $result = $conn->query($sql);
                ?>
                 <select class="form-control" name="id_user" id="id_user" value="<?php echo $id_user ?>" disabled>
                <?php
                while($lista=mysqli_fetch_assoc($result))
                
                echo   "<option value='".$lista["id_user"]."'> ".$lista['usuario']."</option>";
                ?>
                </select>
                </div>
                <div class="form-group">
                  <label for="marca">Faltante</label>
                  <input id="faltante" type="text" class="form-control" value="" ></input>
                </div>

                <div class="form-group">
                  <label for="marca">Motivo</label>
                  <input id="motivo" type="text" class="form-control" value="" ></input>
                </div>
                
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <input type="button" class='btn btn-primary' name="insert" value="Guardar" id="butinsert">
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      
<script>
$(document).ready(function() {
	$('#butinsert').on('click', function() {
		$("#butinsert").attr("disabled", "disabled");
		var id_caja = $('#id_caja').val();
    var id_user = $('#id_user').val();
    var faltante = $('#faltante').val();
    var motivo = $('#motivo').val();
		if(id_caja!="" && id_user!="" && faltante!="" && motivo!=""){
			$.ajax({
				url: "guardar_faltante.php",
				type: "POST",
				data: {
					id_caja: id_caja,
          id_user: id_user,
          faltante: faltante,
          motivo: motivo

				},
				cache: false,
				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						$("#butinsert").removeAttr("disabled");
						$('#fupFalt').find('input:text').val('');
						$("#success").show();
						$('#success').html('Data added successfully !');
					}
					else if(dataResult.statusCode==201){
					   alert("Error occured !");
					}
					
				}
			});
		}
		else{
			alert('Please fill all the field !');
		}
	});
});
</script>
    <!-- Contenido de la pagina -->
  <!-- Content Wrapper. Contains page content -->

  
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <button  data-toggle="modal" data-target="#producto" class="btn btn-success btn-lg" type="button" onclick="Recogerdatos()"><i class='fa fa fa-edit'></i>Apertura de caja</button>
    <button  data-toggle='modal' data-target='#Arqueo' class='btn btn-warning  btn-lg' type='button'>Arqueo de caja</button>
    <button  data-toggle='modal' data-target='#Sobrante' class='btn btn-success  btn-lg' type='button'>Sobrante de caja</button>
    <button  data-toggle='modal' data-target='#Faltante' class='btn btn-warning  btn-lg' type='button'>Faltante de caja</button>
    <section class="content-header">
      <div class="container-fluid">
      <div class="row mb-2">
      <div class="col-sm-6">
      </div>

      

        </div>
      </div><!-- /.container-fluid -->
    </section>
    
    
    
    
   

         <div class='col-md-12'>
         <div id='lista_cajas'></div>
         </div>
         </div>
          <!-- Your Page Content Here -->

        </section><!-- /.content -->
         </div><!-- /.content-wrapper -->



      <!-- Main Footer -->
      <?php
      include('class_lib/main_fotter.php');
      ?>


      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->
    <div class="MsjAjaxForm"></div>
    <?php include "./class_lib/scripts.php"; ?>
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <script src="dist/js/source_admcajas.js"></script>
  </body>
</html>