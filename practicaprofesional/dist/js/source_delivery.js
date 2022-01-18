/***************************************************************************/
function busca_articulo(){
    if($("#codigo").val()!=""){
   $(document).ready(function(){
    $.ajax({
    beforeSend: function(){
      $("#descripcion").html("Buscando informacion del articulo...");
     },
    url: 'busca_articulo_delivery.php',
    type: 'POST',
    dataType: 'json',
    data: 'codigo='+$("#codigo").val(),
    success: function(x){
      if(x=='0'){
      alert("El codigo del articulo, no existe...");
      $("#codigo").val("");
      $('#codigo').focus();
      }else{
       $("#descripcion").val(x.descripcion);
       $("#costo").val(x.costo);
       $("#costo").attr("disabled", false);
       $("#cantidad").val("");
       $("#cantidad").attr("disabled", false);
       $("#btn-add-article").attr("disabled", false);
       $("#btn-cancel-article").attr("disabled", false);
       $("#costo").select();
       $("#costo").focus();
       }
     },
     error: function(jqXHR,estado,error){
       $("#data_articulo").html('Hubo un error: '+estado+' '+error);
     }
     });
    });
    }else{
    }
   }
/****************************************************************************/
function cancela_add(){
$("#descripcion").val("");
$("#costo").val("");
$("#cantidad").val("");
$("#costo").attr('disabled', true);
$("#cantidad").attr('disabled', true);
$("#btn-add-article").attr('disabled', true);
$("#btn-cancel-article").attr('disabled', true);
$("#codigo").val("");
$('#codigo').focus();
}
/********************************************************************************/