$(obtener_registros());

function obtener_registros(articulos)
{
	$.ajax({
		url : 'listar_articulos.php',
		type : 'POST',
		dataType : 'html',
		data : { articulos: articulos },
		})

	.done(function(resultado){
		$("#tabla_articulo").html(resultado);
	})
}

$(document).on('keyup', '#busqueda_articulo', function()
{
	var valorBusqueda=$(this).val();
	if (valorBusqueda!="")
	{
		obtener_registros(valorBusqueda);
	}
	else
		{
			obtener_registros();
		}
});
