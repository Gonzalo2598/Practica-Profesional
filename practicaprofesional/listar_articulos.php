<?
/////// CONEXIÓN A LA BASE DE DATOS /////////
$host = 'localhost';
$basededatos = 'agenda';
$usuario = 'root';
$contraseña = 'rootroot';

$conexion = new mysqli($host, $usuario,$contraseña, $basededatos);
if ($conexion -> connect_errno)
{
	die("Fallo la conexion:(".$conexion -> mysqli_connect_errno().")".$conexion-> mysqli_connect_error());
}

//////////////// VALORES INICIALES ///////////////////////

$tabla="";
$query="SELECT id_art,c.nombre_cat,codigo,descripcion,precio_compra,precio_venta,existencia FROM articulos a INNER JOIN categorias c ON a.id_cat=c.id_cat ORDER BY existencia asc";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['articulos']))
{
	$q=$conexion->real_escape_string($_POST['articulos']);
	$query="SELECT id_art,c.nombre_cat,codigo,descripcion,precio_compra,precio_venta,existencia FROM articulos a INNER JOIN categorias c ON a.id_cat=c.id_cat WHERE 
		id_art LIKE '%".$q."%' OR
		nombre_cat LIKE '%".$q."%' OR
        codigo LIKE '%".$q."%' OR
        descripcion LIKE '%".$q."%' OR
        precio_compra LIKE '%".$q."%' OR
        precio_venta LIKE '%".$q."%' OR
		existencia LIKE '%".$q."%'";
}

$buscarArticulos=$conexion->query($query);
if ($buscarArticulos->num_rows > 0)
{
	$tabla.= 
	'<div id="main-container">
		<table class="table table-hover" style="width:60%">
		<thead>
		<tr>
			<th style="width:10%">ID ART</th>
			<th style="width:10%">ID CAT</th>
			<th style="width:10%">CODIGO</th>
            <th style="width:10%">DESCRIPCION</th>
            <th style="width:10%">PRECIO COMPRA</th>
            <th style="width:10%">PRECIO VENTA</th>
            <th style="width:10%">EXISTENCIA</th>
            <th style="width:10%">OPCIONES</th>
		</tr>
		</thead>';

	while($filaArt= $buscarArticulos->fetch_assoc())
	{
		$tabla.=
		"<tr>
			<td align='center'>".$filaArt['id_art']."</td>
			<td align='center'>".$filaArt['nombre_cat']."</td>
			<td align='center'>".$filaArt['codigo']."</td>
            <td align='center'>".$filaArt['descripcion']."</td>
            <td align='center'>".$filaArt['precio_compra']."</td>
            <td align='center'>".$filaArt['precio_venta']."</td>
            <td align='center'>".$filaArt['existencia']."</td>
            <td align='center'>
            
                        
                        
                      
            <div class='btn-group'>
            <button type='button' class='btn btn-primary btn-md' data-toggle='dropdown'>
            <span class='fa fa-cogs'></span>
</button>
<ul class='dropdown-menu' role='menu'>
<li><a href='almacen_articulos.php?id_art=" .$filaArt['id_art'] ."'>Modificar</a></li>
<li><a class='btn-exit-user' href='eliminar_articulos.php?id_art=" .$filaArt['id_art'] ."'>Borrar</a></li>
<li> <a href='almacen_articulos.php'>Agregar</a></li>
</ul>
</div>             
</td> 
		 </tr>
		";
	}

	$tabla.='</table></div>';
} else
	{
		$tabla="No se encontraron coincidencias con sus criterios de búsqueda.";
	}


echo $tabla;
?>
