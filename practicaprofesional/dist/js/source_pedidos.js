
/***************************************************************************/
function busca_articulo(){
     if($("#codigo").val()!=""){
    $(document).ready(function(){
     $.ajax({
     beforeSend: function(){
       $("#descripcion").html("Buscando informacion del articulo...");
      },
     url: 'busca_articulo_pedido.php',
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
function registra_pedido(){
  if($("#cliente").val()==""||$("#mesa").val()==""|$("#mozo").val()==""|$("#pedido").val()==""|$("#descripcion").val()==""|$("#costo").val()==""|$("#cantidad").val()==""){
    console.log($("#cliente").val());
    console.log($("#mesa").val());
    console.log($("#mozo").val());
    console.log($("#pedido").val());
    console.log($("#descripcion").val());
    console.log($("#costo").val());
    console.log($("#cantidad").val());
    alert("Debe de completar todos los campos...");
    $("#cliente").focus();
  }else{
    $.ajax({
          beforeSend: function(){
           },
          url: 'registra_pedido.php',
          type: 'POST',
          data: 'cliente='+$("#cliente").val()+'&mesa='+$("#mesa").val()+'&mozo='+$("#mozo").val()+'&pedido='+$("#pedido").val()+'&descripcion='+$("#descripcion").val()+'&costo='+$("#costo").val()+'&cantidad='+$("#cantidad").val(),
          success: function(x){
              if(x!='0'){
                alert("Se registro correctamente...");
              }
              pone_lista_pedidos();
             },
           error: function(jqXHR,estado,error){
             $("#btn-add-article").html('Hubo un error: '+estado+' '+error);
             alert("Hubo un error al registrar, contacte a soporte inmediatamente...!");
           }
           });
           }
}
  /***********************************************************************************/
  function pone_lista_pedidos(){
    $.ajax({
           beforeSend: function(){
             $("#lista_pedidos").html("<img src='dist/img/default.gif'></img>");
            },
           url: 'lista_pedidos.php',
           type: 'POST',
           data: null,
           success: function(x){
              $("#lista_pedidos").html(x);
              },
            error: function(jqXHR,estado,error){
              $("#lista_pedidos").html('Hubo un error: '+estado+' '+error);
              alert("Hubo un error, contacte a soporte inmediatamente...!");
            }
            });
  }
  /*******************************************************************************/