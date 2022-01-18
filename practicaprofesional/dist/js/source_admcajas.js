/*****************************************************************************/
function registra_cajas(){
    if($("#id_user").val()==""||$("#fecha_apertura").val()==""|$("#monto_inicial").val()==""|$("#estado").val()==""){
      alert("Debe de completar todos los campos...");
      $("#id_user").focus();
    }else{
      $.ajax({
            beforeSend: function(){
             },
            url: 'registra_apertura.php',
            type: 'POST',
            data: 'id_user='+$("#id_user").val()+'&fecha_apertura='+$("#fecha_apertura").val()+'&monto_inicial='+$("#monto_inicial").val()+'&estado='+$("#estado").val(),
            success: function(x){
                if(x!='0'){
                  alert("Se registro correctamente...");
                }
                pone_lista_registrocajas();
               },
             error: function(jqXHR,estado,error){
               $("#btn-reg-adm").html('Hubo un error: '+estado+' '+error);
               alert("Hubo un error al registrar el usuario, contacte a soporte inmediatamente...!");
             }
             });
             }
  }
  /***********************************************************************************/
  function registra_cierre(){
    if($("#fecha_cierre").val()==""||$("#monto_final").val()==""|$("#ingreso").val()==""|$("#egreso").val()==""|$("#estado_cierre").val()==""){
      alert("Debe de completar todos los campos...");
      $("#fecha_cierre").focus();
    }else{
      $.ajax({
            beforeSend: function(){
             },
            url: 'registra_cierre.php',
            type: 'POST',
            data: 'fecha_cierre='+$("#fecha_cierre").val()+'&monto_final='+$("#monto_final").val()+'&ingreso='+$("#ingreso").val()+'&egreso='+$("#egreso").val()+'&estado_cierre='+$("#estado_cierre").val(),
            success: function(x){
                if(x!='0'){
                  alert("Se registro correctamente...");
                }
                pone_lista_registrocajas();
               },
             error: function(jqXHR,estado,error){
               $("#btn-reg").html('Hubo un error: '+estado+' '+error);
               alert("Hubo un error al registrar el usuario, contacte a soporte inmediatamente...!");
             }
             });
             }
  }
  
  /***********************************************************************************/
  function pone_lista_registrocajas(){
     $.ajax({
            beforeSend: function(){
              $("#lista_cajas").html("<img src='dist/img/default.gif'></img>");
             },
            url: 'pone_listadocajas.php',
            type: 'POST',
            data: null,
            success: function(x){
               $("#lista_cajas").html(x);
               },
             error: function(jqXHR,estado,error){
               $("#lista_cajas").html('Hubo un error: '+estado+' '+error);
               alert("Hubo un error al consultar usuarios registrados, contacte a soporte inmediatamente...!");
             }
             });
  }
  /*******************************************************************************/