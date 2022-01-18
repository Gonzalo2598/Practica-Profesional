<?php
include "vista/header.php";
?>
  <title>Registro Compras</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <?php
include "vista/nav_cajero.php";
?>
<div class="compras">	
<div>
<div class="container">
  <h2>Registro de Compras</h2>
  <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
	  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
	</div>
	<table class="table table-bordered table-sm" >
    <thead>
      <tr>
        <th>Compra</th>
        <th>Proveedores</th>
        <th>Caja</th>
		<th>Fecha</th>
		<th>Descuento</th>
		<th>Impuesto</th>
		<th>Total</th>
		<th>Precio</th>
		<th>Cantidad</th>
		<th>Descripcion</th>
		<th>Accion</th>
      </tr>
    </thead>
    <tbody id="table">
      
    </tbody>
  </table>
</div>
<div>
<!-- Modal Update-->
    <div class="modal fade" id="update_country" role="dialog">
		<div class="modal-dialog modal-sm">
		  <div class="modal-content">
			<div class="modal-header" style="color:#fff;background-color: #e35f14;padding:6px;">
			  <h5 class="modal-title"><i class="fa fa-edit"></i> Actualizar</h5>
			 
			</div>
			<div class="modal-body">

			<div class="row">
					<div class="col-md-3">
					    <label>Precio</label>
					</div>
					<div class="col-md-9">
						<input type="text" name="precio_modal" id="precio_modal" class="form-control-sm" required>
					</div>	
				</div>

			<div class="row">
					<div class="col-md-3">
					    <label>Cantidad</label>
					</div>
					<div class="col-md-9">
						<input type="text" name="cantidad_modal" id="cantidad_modal" class="form-control-sm" required>
					</div>	
				</div>
				
				<div class="row">
					<div class="col-md-3">
					    <label>Total</label>
					</div>
					<div class="col-md-9">
						<input type="text" name="total_modal" id="total_modal" class="form-control-sm" required>
					</div>	
				</div>
				<input type="hidden" name="id_modal" id="id_modal" class="form-control-sm">
			</div>
			<div class="modal-footer" style="padding-bottom:0px !important;text-align:center !important;">
			<p style="text-align:center;float:center;"><button type="submit" id="update_data" class="btn btn-default btn-sm" style="background-color: #e35f14;color:#fff;">Guardar</button>
			<button type="button" class="btn btn-default btn-sm" data-dismiss="modal" style="background-color: #e35f14;color:#fff;">Cerrar</button></p>
			
		  </div>
		  </div>
		</div>
	</div>

    
<!-- Modal End-->

<!-- Modal Delete-->
<div class="modal fade" id="update_counter" role="dialog">
		<div class="modal-dialog modal-sm">
		  <div class="modal-content">
			<div class="modal-header" style="color:#fff;background-color: #e35f14;padding:6px;">
			  <h5 class="modal-title"><i class="fa fa-edit"></i> Borrar</h5>
			 
			</div>
			<div class="modal-body">
			
				
				<div class="row">
					<div class="col-md-3">
					    <label>Compra</label>
					</div>
					<div class="col-md-9">
						<input type="text" name="compra_id" id="compra_id" class="form-control-sm" required>
					</div>	
				</div>
				<input type="hidden" name="id_modal" id="id_modal" class="form-control-sm">
			</div>
			<div class="modal-footer" style="padding-bottom:0px !important;text-align:center !important;">
			<p style="text-align:center;float:center;"><button type="submit" id="delete_data" class="btn btn-default btn-sm" style="background-color: #e35f14;color:#fff;">Si</button>
			<button type="button" class="btn btn-default btn-sm" data-dismiss="modal" style="background-color: #e35f14;color:#fff;">No</button></p>
			
		  </div>
		  </div>
		</div>
	</div>

<script>
$(document).ready(function() {
	$.ajax({
		url: "View_compras.php",
		type: "POST",
		cache: false,
		success: function(dataResult){
			$('#table').html(dataResult); 
		}
	});
	$(function () {
		$('#update_country').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget); /*Button that triggered the modal*/
			var id_compra = button.data('id_compra');
			var precio_unitario = button.data('precio_unitario');
			var cantidad = button.data('cantidad');
			var total = button.data('total');
			var modal = $(this);
			modal.find('#precio_modal').val(precio_unitario);
			modal.find('#cantidad_modal').val(cantidad);
			modal.find('#total_modal').val(total);
			modal.find('#id_modal').val(id_compra);
		});
    });
	$(document).on("click", "#update_data", function() { 
		$.ajax({
			url: "update_compras.php",
			type: "POST",
			cache: false,
			data:{
				id_compra: $('#id_modal').val(),
				precio_unitario: $('#precio_modal').val(),
				cantidad: $('#cantidad_modal').val(),
				total: $('#total_modal').val(),
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

<script>
	$(document).ready(function() {
		$.ajax({
		url: "View_compras.php",
		type: "POST",
		cache: false,
		success: function(dataResult){
			$('#table').html(dataResult); 
		}
	});
	$(function () {
		$('#update_counter').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget); /*Button that triggered the modal*/
			var id_compra = button.data('id_compra');
			var id_compra = button.data('id_compra');
			var modal = $(this);
			modal.find('#compra_id').val(id_compra);
			modal.find('#id_modal').val(id_compra);
		});
    });
	$(document).on("click", "#delete_data", function() { 
		$.ajax({
			url: "delete_compras.php",
			type: "POST",
			cache: false,
			data:{
				id_compra: $('#id_modal').val(),
				id_compra: $('#compra_id').val(),
			},
			success: function(dataResult){
				var dataResult = JSON.parse(dataResult);
				if(dataResult.statusCode==200){
					$('#update_counter').modal().hide();
					alert('Data updated successfully !');
					location.reload();					
				}
			}
		});
	}); 
});
</script>

<footer class="footer" class="main-footer">
        <!-- To the right -->
        
      </footer>


      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->
    <div class="MsjAjaxForm"></div>
    <!-- jQuery 3.1.1 -->
<script src="./js/jquery-3.1.1.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="./js/bootstrap.min.js"></script>
<!-- Script AjaxForms-->
<script src="./js/AjaxForms.js"></script>
<!-- Sweet Alert 2-->
<script src="./js/sweetalert2.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.js"></script>
<style>
  .jumbotron {
    background-color: #f4511e;
    color: #fff;
    padding: 100px 25px;
  }
  .container-fluid {
    padding: 60px 50px;
  }
  .bg-grey {
    background-color: #f6f6f6;
  }
  .logo-small {
    color: #f4511e;
    font-size: 50px;
  }
  .logo {
    color: #f4511e;
    font-size: 200px;
  }
  @media screen and (max-width: 768px) {
    .col-sm-4 {
      text-align: center;
      margin: 25px 0;
    }
  }
  </style>
<!-- Script main-->
<script src="./js/main.js"></script>    <script src="plugins/fastclick/fastclick.min.js"></script>
    <script src="dist/js/source_lines.js"></script>
    <script src="plugins/jtable/jquery-ui.js" type="text/javascript"></script>
    <script src="plugins/jtable/jquery.jtable.js" type="text/javascript"></script>
    <script src="dist/js/source_clients.js"></script>
    </center>
  </body>
</html>