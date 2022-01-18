<?php
	include 'conexionbase.php';
	$sql = "SELECT e.id_compra,p.nombre_empresa,e.id_caja,fecha,total,d.precio_unitario,d.cantidad,a.descripcion FROM compras e INNER JOIN cajas c ON e.id_caja=c.id_caja INNER JOIN detalles_compras d ON e.id_compra=d.id_compra INNER JOIN proveedores p ON e.id_prov=p.id_prov INNER JOIN articulos a ON d.id_art=a.id_art WHERE c.estado=1 ORDER BY e.id_compra desc";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()){
?>	


		<tr>
			<td><?=$row['id_compra'];?></td>
            <td><?=$row['nombre_empresa'];?></td>
			<td><?=$row['id_caja'];?></td>
			<td><?=$row['fecha'];?></td>
            <td><?=$row['descuento_porcentaje'];?></td>
            <td><?=$row['impuesto_porcentaje'];?></td>
            <td><?=$row['total'];?></td>
            <td><?=$row['precio_unitario'];?></td>
            <td><?=$row['cantidad'];?></td>
            <td><?=$row['descripcion'];?></td>
			<td><button type="button" class="btn btn-success btn-sm update" data-toggle="modal" data-keyboard="false" data-backdrop="static" data-target="#update_country"
			data-id_compra="<?=$row['id_compra'];?>"
            data-precio_unitario="<?=$row['precio_unitario'];?>"
			data-cantidad="<?=$row['cantidad'];?>"
            data-total="<?=$row['total'];?>"
			">Editar</button>
            <button type="button" class="btn btn-red btn-sm update" data-toggle="modal" data-keyboard="false" data-backdrop="static" data-target="#update_counter"
			data-id_compra="<?=$row['id_compra'];?>"
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

