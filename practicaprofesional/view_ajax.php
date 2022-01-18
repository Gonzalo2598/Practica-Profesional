<?php
	include 'conexionbase.php';
	$sql = "SELECT * FROM pedidos WHERE estado_pedido !='Pagado' AND estado_pedido !='Entregado' AND estado_pedido !='Despachado' AND estado_pedido !='En camino'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
?>	
		<tr>
			<td><?=$row['id_pedido'];?></td>
			<td><?=$row['mozo'];?></td>
			<td><?=$row['mesa'];?></td>
			<td><?=$row['descripcion_articulo'];?></td>
			<td><?=$row['impuesto'];?></td>
            <td><?=$row['cantidad'];?></td>
            <td><?=$row['fecha'];?></td>
            <td><?=$row['estado_pedido'];?></td>
			<td><button type="button" class="btn btn-success btn-sm update" data-toggle="modal" data-keyboard="false" data-backdrop="static" data-target="#update_country"
			data-id_pedido="<?=$row['id_pedido'];?>"
			data-estado_pedido="<?=$row['estado_pedido'];?>"
			">Editar</button></td>
		</tr>



<?php	
	}
	}
	else {
		echo "<tr >
		<td colspan='5'>No Result found !</td>
		</tr>";
	}
	mysqli_close($conn);
?>

