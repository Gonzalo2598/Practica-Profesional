<?php
	include 'conexionbase.php';
	$sql = "SELECT id_pedido,c.nombre_empresa,u.usuario,cantidad,total,descripcion_articulo,fecha,fecha_entrega,estado_pedido,direccion,casa,barrio,p.telefono from pedidos p INNER JOIN clientes c ON p.id_cliente=c.id_cliente INNER JOIN usuarios u ON p.id_user=u.id_user ORDER BY id_pedido desc";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()){
?>	


		<tr>
			<td><?=$row['id_pedido'];?></td>
            <td><?=$row['nombre_empresa'];?></td>
			<td><?=$row['usuario'];?></td>
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
