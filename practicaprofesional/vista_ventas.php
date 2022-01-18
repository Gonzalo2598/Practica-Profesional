<?php
include "vista/header.php";
?>
  <title>Registro Ventas</title>
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
  <h2>Registro de Ventas</h2>
  <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
	  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
	</div>
	<table class="table table-bordered table-sm" >
    <thead>
      <tr>
        <th>Venta</th>
        <th>Cliente</th>
        <th>Caja</th>
		<th>Fecha</th>
		<th>Total</th>
		<th>Precio</th>
		<th>Cantidad</th>
		<th>Descripcion</th>
		<th>Pedido</th>
		<th>Accion</th>
      </tr>
    </thead>
    <tbody id="table">
      
    </tbody>
  </table>
</div>
<div>


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
					    <label>Venta</label>
					</div>
					<div class="col-md-9">
						<input type="text" name="venta_id" id="venta_id" class="form-control-sm" required>
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
		url: "View_ventas.php",
		type: "POST",
		cache: false,
		success: function(dataResult){
			$('#table').html(dataResult); 
		}
	});
	$(function () {
		$('#update_counter').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget); /*Button that triggered the modal*/
			var id_venta = button.data('id_venta');
			var id_venta = button.data('id_venta');
			var modal = $(this);
			modal.find('#venta_id').val(id_venta);
			modal.find('#id_modal').val(id_venta);
		});
    });
	$(document).on("click", "#delete_data", function() { 
		$.ajax({
			url: "delete_ventas.php",
			type: "POST",
			cache: false,
			data:{
				id_venta: $('#id_modal').val(),
				id_venta: $('#venta_id').val(),
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