<?php
	include 'conexionbase.php';
	$sql = "SELECT id_user,Tipos.nombre_tipo,usuario,contraseña FROM usuarios,Tipos WHERE usuarios.id_tipo=Tipos.id_tipo and id_user=1";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
            $pass=$row['contraseña'];
            $c=str_replace($pass,'**********',$pass);
?>	
        
		<tr>
       
			<td><?=$row['nombre_tipo'];?></td>
			<td><?=$row['usuario'];?></td>
			<td><?=$c ;?></td>
			<td><button type="button" class="btn btn-success btn-sm update" data-toggle="modal" data-keyboard="false" data-backdrop="static" data-target="#update_country"
			data-id_user="<?=$row['id_user'];?>"
            data-usuario="<?=$row['usuario'];?>"
			data-contraseña="<?=$c;?>"
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
