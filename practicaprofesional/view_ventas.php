<?php
	include 'conexionbase.php';
	$sql = "SELECT v.id_venta,cl.nombre_empresa,v.id_caja,fecha,total,d.precio_unitario,d.cantidad,a.descripcion,pedido FROM ventas v INNER JOIN cajas c ON v.id_caja=c.id_caja INNER JOIN detalles d ON v.id_venta=d.id_venta INNER JOIN clientes cl ON v.id_cliente=cl.id_cliente INNER JOIN articulos a ON d.id_art=a.id_art WHERE c.estado=1 ORDER BY v.id_venta desc";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()){
?>	


		<tr>
			<td><?=$row['id_venta'];?></td>
            <td><?=$row['nombre_empresa'];?></td>
			<td><?=$row['id_caja'];?></td>
			<td><?=$row['fecha'];?></td>
            <td><?=$row['total'];?></td>
            <td><?=$row['precio_unitario'];?></td>
            <td><?=$row['cantidad'];?></td>
            <td><?=$row['descripcion'];?></td>
			<td><?=$row['pedido'];?></td>
			<td>
            <button type="button" class="btn btn-success btn-sm update" data-toggle="modal" data-keyboard="false" data-backdrop="static" data-target="#update_counter"
			data-id_venta="<?=$row['id_venta'];?>"
			">Borrar</button>
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
