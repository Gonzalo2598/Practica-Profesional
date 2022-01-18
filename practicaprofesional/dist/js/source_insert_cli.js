/*****************************************************************************/
function registra_cliente(){
    if($("#nombre_empresa").val()==""){
      alert("Debe de completar todos los campos...");
      $("#nombre_empresa").focus();
    }else{
      $.ajax({
            beforeSend: function(){
             },
            url: 'insert_clientes.php',
            type: 'POST',
            data: 'nombre_empresa='+$("#nombre_empresa").val(),
            success: function(x){
                if(x!='0'){
                  alert("Se registro correctamente...");
                }
                pone_lista_registro_clientes();
               },
             error: function(jqXHR,estado,error){
               $("#btn-reg-cli").html('Hubo un error: '+estado+' '+error);
               alert("Hubo un error al registrar el usuario, contacte a soporte inmediatamente...!");
             }
             });
             }
  }
  /***********************************************************************************/
  function pone_lista_registro_clientes(){
    $.ajax({
           beforeSend: function(){
             $("#lista_clientes").html("<img src='dist/img/default.gif'></img>");
            },
           url: 'pone_lista_clientes.php',
           type: 'POST',
           data: null,
           success: function(x){
              $("#lista_clientes").html(x);
              },
            error: function(jqXHR,estado,error){
              $("#lista_clientes").html('Hubo un error: '+estado+' '+error);
              alert("Hubo un error al consultar usuarios registrados, contacte a soporte inmediatamente...!");
            }
            });
 }
 /*******************************************************************************/