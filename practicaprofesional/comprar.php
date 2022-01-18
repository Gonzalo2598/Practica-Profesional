<?php
include "vista/header.php";
session_start();
if(!isset($_SESSION["carrito"])) $_SESSION["carrito"] = [];
$granTotal = 0;
?>
    <title>Comprar</title>
<?php
include "vista/nav.php";
?>

<div >
		<h1 class="titulo">Compras</h1>
		<?php
			if(isset($_GET["status"])){
				if($_GET["status"] === "1"){
					?>
						<div class="alert alert-success">
							<strong class="derecha">¡Correcto! Venta realizada correctamente</strong>
						</div>
					<?php
				}else if($_GET["status"] === "2"){
					?>
					<div class="alert alert-info">
							<strong class="derecha">Venta cancelada</strong>
						</div>
					<?php
				}else if($_GET["status"] === "3"){
					?>
					<div class="alert alert-info">
							<strong class="derecha">Ok Producto quitado de la lista</strong> 
						</div>
					<?php
				}else if($_GET["status"] === "4"){
					?>
					<div class="alert alert-warning">
							<strong class="derecha">Error:El producto que buscas no existe</strong> 
						</div>
					<?php
				}else if($_GET["status"] === "5"){
					?>
					<div class="alert alert-danger">
							<strong class="derecha">Error: El producto está agotado</strong>
						</div>
					<?php
				}else{
					?>
					<div class="alert alert-danger">
							<strong class="derecha">Error:</strong> Algo salió mal mientras se realizaba la venta
						</div>
					<?php
				}
			}
		?>
		<br>
        
		<form class="derecha" method="post" action="agregarAlCarrito.php">
			<label for="codigo">Descripción:</label>
			<input style='width:15%' autocomplete="off" autofocus class="form-control" name="descripcion" required type="text" id="descripcion" placeholder="Escribe el producto" >
            <div class="form-group">
<label> Proveedores:</label>
<?Php
include "conexionusuarios.php";
      $con = new conexion();
      $conn = new mysqli($con->getservername(), $con->getusername(), $con->getpassword(), $con->getdbname());                
      $sql = "SELECT * FROM proveedores";
      $result = $conn->query($sql);
?>
    <select style='width:15%' class="form-control" name="id_prov" id="id_prov" value="<?php echo $id_prov ?>">
    <option>Seleccioná</option>
<?php
    while($lista=mysqli_fetch_assoc($result))
    echo   "<option value='".$lista["id_prov"]."'> ".$lista['nombre_empresa']."</option>"; 
?>
</select>
 </div>
		</form>
		<br><br>
		<table class="derecha" class="table table-hover" >
			<thead>
				<tr>
					
					<th style='width:1%'>Proveedor</th>
					<th style='width:2%'>Descripción</th>
					<th style='width:2%'>Precio de compra</th>
					<th style='width:2%'>Cantidad</th>
					<th style='width:2%'>Total</th>
					<th style='width:5%'>Quitar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($_SESSION["carrito"] as $indice => $articulo){ 
						$granTotal += $articulo->total;
					?>
				<tr>
					
					<td><?php echo $proveedores->nombre_empresa ?></td>
					<td><?php echo $articulo->descripcion ?></td>
					<td><?php echo $articulo->precio_compra ?></td>
					<td><?php echo $articulo->cantidad ?></td>
					<td><?php echo $articulo->total ?></td>
					<td><a class="btn btn-danger" href="<?php echo "quitarDelCarrito.php?indice=" . $indice?>"><i class="fa fa-trash"></i></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>

		<h3  class="derecha">Total: <?php echo $granTotal; ?></h3>
		<form  class="derecha" action="./terminarVenta.php" method="POST">
			<input name="total" type="hidden" value="<?php echo $granTotal;?>">
			<button type="submit" class="btn btn-success" >Terminar Compra</button>
			<a href="./cancelarVenta.php" class="btn btn-danger" >Cancelar Compra</a>
		</form>
	</div>
                
    <?php
    include "vista/footer.php";

 ?>