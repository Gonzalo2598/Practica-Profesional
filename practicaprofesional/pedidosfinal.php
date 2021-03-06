<html>
<body>

    <div class="container">
        <h2>Modal Example</h2>

        <div class="jumbotron">
            <h1>Hello, world!</h1>
            <p id="lblDatos">......</p>
            <button id="btnModal" class="btn btn-primary">Abrir modal</button>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal contenido-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Modal Header</h4>
                    </div>
                    <div class="modal-body">
                        <label for="txtNombre">Nombre: </label>
                        <input type="text" class="form-control" id="txtNombre"/>

                        <label for="txtApellido">Apellido:</label>
                        <input type="text" class="form-control" id="txtApellido"/>

                        <label for="txtTelefono">Telefono:</label>
                        <input type="text" class="form-control" id="txtTelefono"/>
                    </div>
                    <div class="modal-footer">                            
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-success" id="btnGuardar">Guardar</button>
                        <img src="img/cargandoPaginaWeb.gif" class="img-rounded" height="30px" width="30px" id="imgLoad" style="display:none">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--haca todos los script-->
    <!--Siempre debe ir jQuery primero q bootstrap-->
    <script src="js/jquery-3.1.0.js"></script>  
    <script src="js/bootstrap.js"></script>        
    <script type="text/javascript">  
        $(document).ready(function() { 
            $('#btnModal').click(function(event){
                clearModal();
                $('#myModal').modal('show');                
            }); 
            $('#btnGuardar').click(function(event){                    
                var n= $('#txtNombre').val();
                var a = $('#txtApellido').val();
                var t = $('#txtTelefono').val();
                $.ajax({
                    type: "POST",
                    data: {"nombre" : n, "apellido" : a, "telefono" : t},
                    url: "ajaxSleep.php",
                    beforeSend: function () {
                        $('#imgLoad').show();
                    },
                    success: function(response) { 
                        $('#lblDatos').text(response);                           
                    },
                    error: function(jqXHR, textStatus, errorThrown){
                        //if(textStatus === 'timeout'){alert('Failed from timeout');}   
                        if (jqXHR.status === 0) {alert('Not connect: Verify Network: ' + textStatus);}
                        else if (jqXHR.status == 404) {alert('Requested page not found [404]');} 
                        else if (jqXHR.status == 500) {alert('Internal Server Error [500].');}
                        else if (textStatus === 'parsererror') {alert('Requested JSON parse failed.');}
                        else if (textStatus === 'timeout') {alert('Time out error.');} 
                        else if (textStatus === 'abort') {alert('Ajax request aborted.');} 
                        else {alert('Uncaught Error: ' + jqXHR.responseText);}
                    },
                    timeout: 5000
                    //timeout: 1000//para probar timeout
                }).always(function(){
                    $('#imgLoad').hide();
                    $('#myModal').modal('toggle');//Verificar uso 
                    clearModal();
                });
                event.preventDefault();
            });  
            function clearModal(){
                //Limpio las cajas de texto del modal
                $('.modal-body input').val('');
            }    
        });            
    </script>

</body>
</html>