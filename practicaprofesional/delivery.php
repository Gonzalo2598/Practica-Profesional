<!DOCTYPE html>
<html>
  <head>
    <title>Delivery </title>
     <!-- Link Insert -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

   <!-- Link Update -->
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <?php include "./class_lib/links.php"; ?>
    <link rel="stylesheet" href="plugins/select2/select2.min.css">
    <link rel="stylesheet" href="plugins/datepicker/css/bootstrap-datepicker3.css">
    <?php include "conexionusuarios.php"; ?>
    
    
  </head>
  <body onload="pone_num_entrada();revisa_entrada_ini();">
    <div class="wrapper">
    
      <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <?php
        include('class_lib/nav_header.php');
        ?>

        

        
       <!-- /.sidebar -->
        

      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <?php
        include('class_lib/sidebar_cajero.php');
        
        ?>
        <!-- /.sidebar -->
      </aside>
<!-- Modal Update-->
<div class="modal fade" id="update_country" role="dialog">
		<div class="modal-dialog modal-sm">
		  <div class="modal-content">
			<div class="modal-header" style="color:#fff;background-color: #e35f14;padding:6px;">
			  <h5 class="modal-title"><i class="fa fa-edit"></i> Actualizar</h5>
			 
			</div>
			<div class="modal-body">
			
				<!--1-->
				<div class="row">
					<div class="col-md-3">
					    <label>Fecha Entrega</label>
					</div>
					<div class="col-md-9">
						<input type="datetime-local" name="fecha_modal" id="fecha_modal" class="form-control-sm" required>
					</div>	
				</div>

				<div class="row">
					<div class="col-md-3">
					    <label>Estado</label>
					</div>
					<div class="col-md-9">
						<input type="text" name="estado_modal" id="estado_modal" class="form-control-sm" required>
					</div>	
				</div>
				<input type="hidden" name="id_modal" id="id_modal" class="form-control-sm">
			</div>
			<div class="modal-footer" style="padding-bottom:0px !important;text-align:center !important;">
			<p style="text-align:center;float:center;"><button type="submit" id="update_data" class="btn btn-default btn-sm" style="background-color: #e35f14;color:#fff;">Editar</button>
			<button type="button" class="btn btn-default btn-sm" data-dismiss="modal" style="background-color: #e35f14;color:#fff;">Cerrar</button></p>
			
		  </div>
		  </div>
		</div>
	</div>
<!-- Modal End-->
<script>
$(document).ready(function() {
	$.ajax({
		url: "View_delivery.php",
		type: "POST",
		cache: false,
		success: function(dataResult){
			$('#table').html(dataResult); 
		}
	});
	$(function () {
		$('#update_country').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget); /*Button that triggered the modal*/
			var id_pedido = button.data('id_pedido');
      var fecha_entrega = button.data('fecha_entrega');
			var estado_pedido = button.data('estado_pedido');
			var modal = $(this);
      modal.find('#fecha_modal').val(fecha_entrega);
			modal.find('#estado_modal').val(estado_pedido);
			modal.find('#id_modal').val(id_pedido);
		});
    });
	$(document).on("click", "#update_data", function() { 
		$.ajax({
			url: "update_pedidos.php",
			type: "POST",
			cache: false,
			data:{
				id_pedido: $('#id_modal').val(),
				estado_pedido: $('#estado_modal').val(),
        fecha_entrega: $('#fecha_modal').val(),
			},
			success: function(dataResult){
				var dataResult = JSON.parse(dataResult);
				if(dataResult.statusCode==200){
					$('#update_country').modal().hide();
					alert('Data updated successfully !');
					location.reload();					
				}
			}
		});
	}); 
});
</script>

<div class="modal fade" id="producto">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Bebidas y Platillos</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <?php


$con = new conexion();
$conn = new mysqli($con->getservername(), $con->getusername(), $con->getpassword(), $con->getdbname());                
$sql = "SELECT codigo,descripcion,precio_venta from articulos";
$resultarticulo = $conn->query($sql);
echo "<div><table >
    <tr> 
    <th style='width:8%'> CODIGO</th>
    <th style='width:8%'>DESCRIPCION</th>
    <th style='width:8%'>PRECIO</th>
    </tr>";
if ($resultarticulo->num_rows > 0) {
    while($row = $resultarticulo->fetch_assoc()) {
        
        echo "<tr >  
        
                <td align='center'>" . $row["codigo"] . "</td>

                <td align='center'>" . $row["descripcion"] . "</td>

                <td align='center'>" . $row["precio_venta"] . "</td>
               

                
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


      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          
         
          
          <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Delivery.</li>
            
          </ol>
        </section>
        <button  data-toggle="modal" data-target="#producto" class="btn btn-success btn-lg" type="button">Codigos de Productos</button>
        <!-- Main content -->
        <section class="content">

        
          <div class='row'>
          <div class='col-md-4'>
           <div class='box box-primary'>
           <div class='box-header with-border'>
           <h3 class='box-title'>Datos del Delivery</h3>
           </div>
           <div class='box-body'>
           <form class='form-horizontal' id="fupForm" name="form1" method="post">
            <div class='input-group'>
             <span class='input-group-addon bg-green'>Cliente:</span>
             <?php
             $con = new conexion();
            $conn = new mysqli($con->getservername(), $con->getusername(), $con->getpassword(), $con->getdbname());                
            $sql = "SELECT id_cliente from clientes";
            $result = $conn->query($sql);
            ?>

            <select  class="form-control"  id="cliente" name="cliente">
            <?php
            while($lista=mysqli_fetch_assoc($result))
            echo   "<option select value='".$lista["id_cliente"]."' > ".$lista['id_cliente']."</option>"; 
            ?>
            </select>
            </div>

            <br>

            <div class='input-group'>
             <span class='input-group-addon bg-green'><i class="fa fa-download"></i> Cadete:</span>
             <?Php
              
             $con = new conexion();
            $conn = new mysqli($con->getservername(), $con->getusername(), $con->getpassword(), $con->getdbname());                
            $sql = "SELECT id_user from usuarios WHERE id_user=6";
            $result = $conn->query($sql);
            ?>

            <select  class="form-control"  id="cadete" name="cadete">
            <?php
            while($lista=mysqli_fetch_assoc($result))
            echo   "<option select value='".$lista["id_user"]."' > ".$lista['id_user']."</option>"; 
            ?>
            </select>
             
            </div>
             <br>

             <div class='input-group'>
             <span class='input-group-addon bg-green'><i class="fa fa-calendar"></i> Dirección:</span>
             <input type='text' class='form-control' id='direccion' name='direccion'>
            </div>

            <br>
            <div class='input-group'>
             <span class='input-group-addon  bg-green'><i class="fa fa-database"></i> Casa:</span>
             <input type='number' class='form-control' id='casa' name='casa'>
            </div>
            <br>
            <div class='input-group'>
             <span class='input-group-addon  bg-green'><i class="fa fa-database"></i> Barrio:</span>
             <input type='text' class='form-control' id='barrio' name='barrio'>
            </div>
            <br>
            <div class='input-group'>
             <span class='input-group-addon  bg-green'><i class="fa fa-database"></i> Teléfono:</span>
             <input type='number' class='form-control' id='telefono' name='telefono'>
            </div>
            <br>
            <div class='input-group'>
             <span class='input-group-addon  bg-green'><i class="fa fa-plus"></i> Est. Pedido</span>
             
             
             <input type="text" class="form-control cantidades" id="pedido" name="pedido"  value="Pendiente">
            </div>
            
           </div>
           </div>
           </div>

           <div class='col-md-4'>
           <div class='box box-primary'>
           <div class='box-header with-border'>
           <h3 class='box-title'>Productos.</h3>
           </div>
           <div class='box-body'>
           <div class='input-group'>
             <span class='input-group-addon  bg-green'><i class="fa fa-barcode"></i> Codigo:</span>
             <input type="text" class="form-control" id="codigo" name="codigo" onchange='busca_articulo();'
             style="font-size:20px; text-align:center; color:blue; font-weight: bold;" >
            </div>
            <br>
            <div class='input-group'>
             <span class='input-group-addon bg-green'><i class="fa fa-code"></i> Producto:</span>
             <input type="text" class="form-control pull-right" id="descripcion"  name="descripcion" disabled>
            </div>
            <br>
            <div class='input-group'>
             <span class='input-group-addon bg-green'><i class="fa fa-usd"></i> Precio:</span>
             <input type="text" class="form-control pull-right cantidades" id="costo" name="costo"
             data-inputmask="'alias': 'numeric', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'placeholder': '0'"
             style="font-size:20px; text-align:center; color:blue; font-weight: bold;" disabled>
            </div>
            <br>
            <div class='input-group'>
             <span class='input-group-addon bg-green'><i class="fa fa-calculator"></i> Cantidad:</span>
             <input type="text" class="form-control pull-right cantidades" id="cantidad" name="cantidad" 
             data-inputmask="'alias': 'numeric', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'placeholder': '0'"
             style="font-size:20px; text-align:center; color:blue; font-weight: bold;" disabled>
            </div>
            <br>
            <div class='btn-group'>
            <input type="button" class='btn btn-primary' name="save" value="Enviar Pedido" id="butsave"> 
            <button class='btn btn-danger' type='button' onclick='cancela_add();' id='btn-cancel-article' disabled><i class='fa fa-times'></i> Cancelar...</button>
            </div>
            </form>
          
           </div>
           </div>
           </div>
           
           
         

         <div class="container">
  
	<table class="table table-bordered table-sm" >
    <thead>
      <tr>
      <th>Pedido</th>
        <th>Cliente</th>
        <th>Usuario</th>
		    <th>Descripcion</th>
        <th>Cantidad</th>
        <th>Total</th>
        <th>Fecha Toma</th>
        <th>Fecha Entre.</th>
        <th>Direccion</th>
        <th>Casa</th>
        <th>Barrio</th>
        <th>Telefono</th>
        <th>Estado</th>
      </tr>
    </thead>
    <tbody id="table">
      
    </tbody>
  </table>
</div>
         
         
         <script>
$(document).ready(function() {
	$('#butsave').on('click', function() {
		$("#butsave").attr("disabled", "disabled");
		var cliente = $('#cliente').val();
		var cadete = $('#cadete').val();
		var direccion = $('#direccion').val();
		var casa = $('#casa').val();
    var barrio = $('#barrio').val();
    var telefono = $('#telefono').val();
    var pedido = $('#pedido').val();
    var codigo = $('#codigo').val();
    var descripcion = $('#descripcion').val();
    var costo = $('#costo').val();
    var cantidad = $('#cantidad').val();
		if(cliente!="" && cadete!="" && direccion!="" && casa!="" && barrio!="" && telefono!="" && pedido!="" && codigo!="" && descripcion!="" &&  costo!="" && cantidad!=""){
			$.ajax({
				url: "guardar_delivery.php",
				type: "POST",
				data: {
					cliente: cliente,
					cadete: cadete,
          direccion: direccion,
          casa: casa,
          barrio: barrio,
          telefono: telefono,
          pedido: pedido,
          codigo: codigo,
          descripcion: descripcion,
					costo: costo,
					cantidad: cantidad				
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
    <script src="plugins/select2/select2.full.min.js"></script>
    <script src="plugins/datepicker/js/bootstrap-datepicker.js"></script>
    <script src="plugins/datepicker/locales/bootstrap-datepicker.es.min.js"></script>
    <script src="plugins/number/jquery.inputmask.bundle.js"></script>
    <script src="plugins/noty/packaged/jquery.noty.packaged.min.js"></script>
    <script src="dist/js/source_delivery.js"></script>
    <script type='text/javascript'>
    $("#fecha").datepicker({
      language: "es",
      format: "yyyy-mm-dd"
    });

    $(document).ready(function(){
    $(".cantidades").inputmask();
    });

  

    $(window).bind('beforeunload', function(){
         return 'Deseas salir de Entradas X Compra ? Si eliges que si y hay registros agregados a la entrada, quedara guardada pero no procesada, a menos que canceles la entrada temporalmente...';
        });
    });
    </script>
  </body>
  
</html>