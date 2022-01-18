/*****************************************************************************/
function registra_mesas(){
    if($("#estado_mesa").val()==""||$("#estado_pago").val()==""){
      alert("Debe de completar todos los campos...");
      $("#estado_mesa").focus();
    }else{
      $.ajax({
            beforeSend: function(){
             },
            url: 'insert_mesas.php',
            type: 'POST',
            data: 'estado_mesa='+$("#estado_mesa").val()+'&estado_pago='+$("#estado_pago").val(),
            success: function(x){
                if(x!='0'){
                  alert("Se registro correctamente...");
                }
                pone_lista_registro_mesas();
               },
             error: function(jqXHR,estado,error){
               $("#btn-reg-mesa").html('Hubo un error: '+estado+' '+error);
               alert("Hubo un error al registrar el usuario, contacte a soporte inmediatamente...!");
             }
             });
             }
  }
  /***********************************************************************************/
  function pone_lista_registro_mesas(){
    $.ajax({
           beforeSend: function(){
             $("#lista_mesas").html("<img src='dist/img/default.gif'></img>");
            },
           url: 'pone_lista_mesas.php',
           type: 'POST',
           data: null,
           success: function(x){
              $("#lista_mesas").html(x);
              },
            error: function(jqXHR,estado,error){
              $("#lista_mesas").html('Hubo un error: '+estado+' '+error);
              alert("Hubo un error al consultar usuarios registrados, contacte a soporte inmediatamente...!");
            }
            });
 }
 /*******************************************************************************/