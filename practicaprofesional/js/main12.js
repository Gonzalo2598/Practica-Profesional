$(document).ready(function(){
	$(".btn-exit-acad").on("click", function(e){
		e.preventDefault();
		var urlDir=$(this).attr("href");
		swal({
		  title: '¿Estás seguro?',
          text: 'Eliminar esta academia, recuerde que para borrar esta academia debe borrar todos los docentes, alumnos(datos academicos, medicos y cuotas)',
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Si, Eliminar',
		  cancelButtonText: 'Cancelar'
		}).then(function () {
		  window.location.href=urlDir;
		});
	});
});