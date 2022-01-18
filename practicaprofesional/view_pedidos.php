<?php
	include 'conexionbase.php';
	$sql = "SELECT id_pedido,c.nombre_empresa,mozo,mesa,cantidad,total,descripcion_articulo,fecha,fecha_entrega,estado_pedido from pedidos p INNER JOIN clientes c ON p.id_cliente=c.id_cliente where estado_pedido !='Entregado' ORDER BY id_pedido desc";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()){
?>	


		<tr>
			<td><?=$row['id_pedido'];?></td>
			<td><?=$row['mozo'];?></td>
            <td><?=$row['nombre_empresa'];?></td>
			<td><?=$row['mesa'];?></td>
			<td><?=$row['descripcion_articulo'];?></td>
            <td><?=$row['cantidad'];?></td>
            <td><?=$row['total'];?></td>
            <td><?=$row['fecha'];?></td>
            <td><?=$row['fecha_entrega'];?></td>
            <td><?=$row['estado_pedido'];?></td>
			<td><button type="button" class="btn btn-success btn-sm update" data-toggle="modal" data-keyboard="false" data-backdrop="static" data-target="#update_country"
			data-id_pedido="<?=$row['id_pedido'];?>"
            data-fecha_entrega="<?=$row['fecha_entrega'];?>"
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

