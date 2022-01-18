<?php
	include 'conexionbase.php';
	$sql = " SELECT p.id_pedido,c.nombre_empresa,descripcion_articulo,cantidad,total,fecha,fecha_entrega,direccion,casa,barrio,p.telefono,estado_pedido FROM pedidos p INNER JOIN clientes c ON p.id_cliente=c.id_cliente WHERE estado_pedido !='Pagado' AND estado_pedido !='Entregado' AND estado_pedido !='Pendiente'  AND estado_pedido !='Preparacion'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
?>	
		<tr>
			<td><?=$row['id_pedido'];?></td>
			<td><?=$row['nombre_empresa'];?></td>
			<td><?=$row['descripcion_articulo'];?></td>
            <td><?=$row['cantidad'];?></td>
            <td><?=$row['total'];?></td>
            <td><?=$row['fecha'];?></td>
            <td><?=$row['fecha_entrega'];?></td>
            <td><?=$row['direccion'];?></td>
            <td><?=$row['casa'];?></td>
            <td><?=$row['barrio'];?></td>
            <td><?=$row['telefono'];?></td>
            <td><?=$row['estado_pedido'];?></td>
			<td><button type="button" class="btn btn-success btn-sm update" data-toggle="modal" data-keyboard="false" data-backdrop="static" data-target="#update_country"
			data-id_pedido="<?=$row['id_pedido'];?>"
            data-fecha_entrega="<?=$row['fecha_entrega'];?>"
			data-estado_pedido="<?=$row['estado_pedido'];?>"
			">Editar</button>
			
		</td>
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

