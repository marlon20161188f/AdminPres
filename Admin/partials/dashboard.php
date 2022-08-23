<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>
  <div id="MessageCruds"></div>   
<div class="content-wrapper"style="min-height: 1170.12px;">
    <div class="container-fluid ">
        <div class="row justify-content-center">
            <div class="col-11 col-sm-9 col-md-7 col-lg-6 col-xl-10 text-center p-0 mt-3 mb-2">
                <div class="card px-4 pt-4 pb-0 mt-1 mb-1">
                    <h2 id="heading"> Nuevo Préstamo</h2>
                    <p>Ingrese los datos del préstamo a registrar</p>
                    <form id="msform" method="POST">
                        <!-- progressbar -->
                        <ul id="progressbar">
                            <li class="active" id="account"><strong>DNI, RUC</strong></li>
                            <li id="personal"><strong>Datos</strong></li>
                            <li id="payment"><strong>Cronograma</strong></li>
                            <li id="confirm"><strong>Visualización</strong></li>
                            <li id="viuw"><strong>Finalizar</strong></li>
                        </ul>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                        </div> <br> <!-- fieldsets -->
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Documento de identidad:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Paso 1 - 4</h2>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4" id="dniruc">
                                        <label class="fieldlabels">Tipo de documento:</label>
                                        <select class="form-control"type="text" name="tipodoc" id="elije" onchange="modificarTexbox()" placeholder="DNI"style="margin:0px;margin-top:6px;"> 
                                            <option value="1">DNI</option>
                                            <OPTIOn value="2">RUC</OPTIOn>
                                        </select> 
                                    </div>
                                    <div class="col-1">
                                        
                                        <input hidden style="margin-left:0px" type="text"placeholder="" > 
                                    </div>
                                    <div class="col-4" method="post">
                                        <label class="fieldlabels">Número de documento:</label>
                                        <input value="" maxlength="8" id="caja_bus" name="dniruc"style="font-family: inherit; margin-left:0px; background:#ffffff;
                                            height: 39px; margin-top:4px;border: 1px solid #ced4da; border-radius: 0.25rem;" type="text"placeholder="" maxlength="11" > 
                                    </div>
                                    <div class="col-3">
                                    <button id="btn_7" class="action-button " style="margin-top:1.9rem;"type="button" onclick="validModal(7);" data-id="7" > <!-- data-estado="<?php //echo $item['id_provedor']; ?>"-->
                                    <i class="fa fa-check"></i> Validar
                                    </button>
                                    </div>
                                <!-- <div class="row">
                                    <div class="col-6">
                                        <label class="fieldlabels">Email: *</label> 
                                        <input type="email" name="email" placeholder="Email Id" /> 
                                        <label class="fieldlabels">Username: *</label>
                                        <input type="text" name="uname" placeholder="UserName" />
                                    </div>
                                    <div class="col-6">
                                        <label class="fieldlabels">Password: *</label> 
                                        <input type="password" name="pwd" placeholder="Password" /> 
                                        <label class="fieldlabels">Confirm Password: *</label> 
                                        <input type="password" name="cpwd" placeholder="Confirm Password" />
                                    </div> -->
                                </div>    
                            </div> 
                            <!-- <div id="Message"></div> -->
                            <input hidden id="sig" type="button" name="next" class="next action-button" value="Siguiente" >  
                        </fieldset>
                        <fieldset >
                            <div class="form-card" id="register_prestamos">
                              
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Parámetros del préstamo:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Paso 2 - 4</h2>
                                    </div>
                                </div>
                                <div class="row" id="register_prestamo" method="post">
                                    <div class="col-6" >
                                    
                                        <label class="fieldlabels">Tipo de préstamo: </label> 
                                        <select method="post"class="form-control"type="email" name="tipo" id="tipo" value="1"style="margin-top:5px;margin-bottom: 0rem;" >
                                            <option value="1">Diario</option>
                                            <option value="2">Semanal</option>
                                            <option value="3">Mensual</option>
                                        </select> 
                                        <label class="fieldlabels">Número de cuotas: </label>
                                        <input type="hidden" name="options" value="C">
                                        <input hidden type="number"name="idclient" id="idclient" placeholder="" value="3" >
                                        <input method="post"type="number"class="form-control input-sm"name="cuotas" id="cuotas" placeholder="" style="font-family: inherit;background:#ffffff; height: 39px; margin-top:4px; border: 1px solid #ced4da; border-radius: 0.25rem;" required>
                                        <label class="fieldlabels">Mora por día de retraso S/ : </label> 
                                        <input method="post"type="number" class="form-control" name="moras" id="moras" placeholder=""style="font-family: inherit;background:#ffffff; height: 39px; margin-top:4px; border: 1px solid #ced4da; border-radius: 0.25rem;" required>
                                    
                                    </div>
                                    <div class="col-6" method="post">
                                       
                                        <label class="fieldlabels">Monto prestado S/ : </label> 
                                        <input method="post"type="number"class="form-control" name="monto" id="monto" placeholder=""style="font-family: inherit;background:#ffffff; height: 39px; margin-top:4px; border: 1px solid #ced4da; border-radius: 0.25rem;" required> 
                                        <label class="fieldlabels">Tasa de interés %: </label> 
                                        <input method="post"type="number"class="form-control" name="tasa"id="tasa" placeholder="" style="font-family: inherit;background:#ffffff; height: 39px; margin-top:4px; border: 1px solid #ced4da; border-radius: 0.25rem;" required> 
                                        <label for="fecha_des"class="fieldlabels">Fecha de desembolso: </label> 
                                        <input method="post"type="text"class="form-control" name="fecha_des" id="fecha_des"value="<?php echo date('d-m-Y');?>" placeholder="<?php echo date('d-m-Y');?>" style="font-family: inherit;background:#ffffff; height: 39px; margin-top:4px;border: 1px solid #ced4da; border-radius: 0.25rem;" > 
                                       
                                    </div>
                                </div>
                            </div>
                            <!-- <button id='btn_10' class='next action-button btn btn-primary'onclick="Registrar_prestamo();" type="button" data-dismiss="modal" aria-label="Close" >
                                Siguiente
                             </button>  -->
                             <input type="button" name="next" class="next action-button"onmouseover="validdata();" onclick="Registrar_prestamos();" value="Siguiente" >
                             <input type="button" name="previous" class="previous action-button-previous" value="Atrás" >
                        </fieldset>
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Cronograma de cobros:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Paso 3 - 4</h2>
                                    </div>
                                </div> 
                                <div class="row justify-content-center">
                                    <div class="col-8" id="tabla_prestamos">
                                            espere se esta cargando la tabla
                                    </div>
                                </div>
                            </div> <input type="button" name="next" class="next action-button"onclick="verRegistro();" value="Siguiente" > <input type="button" name="previous" class="previous action-button-previous" value="Atrás" >
                        </fieldset>
                        <fieldset>
                            <div class="form-card" >
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Datos del préstamo:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Paso 4 - 4</h2>
                                    </div>
                                </div> 
                                <div class="row justify-content-center">
                                    <div class="col-6" id="tabla_visualizar">
                                    </div>
                                </div>
                            </div> <input type="button" name="next" class="next action-button"onclick="Registrar_prestamo();Registrar_porcobrar();//Registrar_cuotas();" value="Validar" > <input type="button" name="Atrás" class="previous action-button-previous" value="Atrás" >
                        </fieldset>
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Fin:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps"></h2>
                                    </div>
                                </div> <br><br>
                                <h2 class="purple-text text-center"><strong>ÉXITO !</strong></h2> <br>
                                <div class="row justify-content-center">
                                    <div class="col-1"> <img src="https://i.imgur.com/GwStPmg.png" class="fit-image"> </div>
                                </div> <br><br>
                                <div class="row justify-content-center">
                                    <div class="col-7 text-center">
                                        <h5 class="purple-text text-center">Su préstamo ha sido registrado con éxito</h5>
                                    </div>
                                </div>
                            </div> <a href="<?php echo $url_site; ?>index.php" type="button" name="next" class="next action-button" value="Nuevo">Nuevo </a> 
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="EditModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="EditModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="background:#673AB7;color:#fff">
        <h5 class="modal-title" id="staticBackdropLabel">Ingresar datos del cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"style="color:#fff">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="edit">
        <div class="row">
        <div id="datos_validados">
            <h2>Error, no ingresó ningun número de documento</h2>
        </div>
        
      </div>
    </div>
  </div>
</div>
<style>
    #btn_10{
        border-color:#673ab7;
        background-color:#673ab7;
    }
    #btn_10:hover{
        border-color:#311B92;
        background-color:#311B92;
    }
</style>
<script>
  
    $(document).ready( function () {
    $('#tabla_id').DataTable();
  } );
      function validModal(id) {
        $('#EditModal').modal('show');
        $('#edit').find('#id').val($('#btn_' + id).data('id'));
        $('#edit').find('#placa').val($('#btn_' + id).data('placa'));
        $('#edit').find('#marca').val($('#btn_' + id).data('marca'));
        $('#edit').find('#color').val($('#btn_' + id).data('color'));
        $('#edit').find('#estacionamiento').val($('#btn_' + id).data('estacionamiento'));
        $('#edit').find('#fecha').val($('#btn_' + id).data('fecha'));
        console.log($('#btn_' + id).data('id'));
    }
    function idRegistro(id_cliente) {
        $("#sig").click();
        console.log(id_cliente);
        document.getElementById("idclient").value = id_cliente;
         //   let parametros = new FormData($('#edit')[0]);
        //$('#Message').html('<input type="button" name="next" class="next action-button next" value="Siguiente" />');
        //$('#MessageCrud').html('<div class="alert bg-success" role="alert"><em class="fa fa-check-circle mr-2"></em>Se ha validado correctamente los datos del Cliente. Por favor continúe con el proceso del préstamo<a href="#" class="float-right"><em class="fa fa-remove"></em></a></div>');
       }
    function Registrar_prestamo() {
      $.ajax({
        type: 'POST',
        url: '../ajax/prestamo.php',
        data: $('#register_prestamo').find("select, input").serialize(),
        success: function(response) {
          var jsonData = JSON.parse(response);
          console.log(jsonData.success);
          if(jsonData.success == "2"){
            $('#MessageCruds').html('<div class="alert bg-warning" role="alert"><em class="fa fa-exclamation-triangle-circle mr-2"></em>Se encontró mas de un 1 registró con la misma descripción, por favor intente con otro término.<a href="#" class="float-right"><em class="fa fa-remove"></em></a></div>');
          }
          if(jsonData.success == "0"){
            $('#MessageCruds').html('<div class="alert bg-danger" role="alert"><em class="fa fa-minus-circle mr-2"></em>Ocurrio un error inesperado, Por favor intente mas tarde nuevamente.<a href="#" class="float-right"><em class="fa fa-remove"></em></a></div>');
          }
          if(jsonData.success == "1"){
            $('#MessageCruds').html('<div class="alert bg-success" role="alert"><em class="fa fa-check-circle mr-2"></em>Se registró correctamente el vehiculo ingresado. Por favor de comprobar los cambios.<a href="#" class="float-right"><em class="fa fa-remove"></em></a></div>');
          }
        }
      });
      
    }
    function Registrar_prestamos() {
    $.ajax({
        type: 'POST',
        url: '../layout/tabla_de_prestamos.php',
        data: $('#register_prestamo').find("select, input").serialize(),
      }).done(function(respuesta){
        $("#tabla_prestamos").html(respuesta);
    })
    } function Registrar_porcobrar() {
    $.ajax({
        type: 'POST',
        url: '../ajax/porcobrar.php',
        data: $('#porcobrar').find("select, input").serialize(),
      }).done(function(respuesta){
        $("#tabla_prestamos").html(respuesta);
    })
    }
    function Registrar_cuotas() {
    $.ajax({
        type: 'POST',
        url: '../ajax/cuotas.php',
        data: $('#msform,#register_prestamo,#register_prestamo').find("select, input").serialize(),
      }).done(function(respuesta){
        $("#tabla_prestamos").html(respuesta);
    })
    }
    function verRegistro() {
    $.ajax({
        type: 'POST',
        url: '../layout/tabla_visualisar.php',
        data: $('#msform,#register_prestamo,#register_prestamo').find("select, input").serialize(),
      }).done(function(respuesta){
        $("#tabla_visualizar").html(respuesta);
    })
    }
    function validdata(){
        var cuotasLength = document.getElementById("cuotas").value.length;
        var morasLength = document.getElementById("moras").value.length;
        var montoLength = document.getElementById("monto").value.length;
        var tasaLength = document.getElementById("tasa").value.length;
        if (cuotasLength == 0 || morasLength==0 || montoLength==0 || tasaLength==0) {
            Swal.fire({
  title: 'Campos vacíos, ingrese los parametros del prestamo para continuar.',
  showCancelButton: false,
  confirmButtonText: `Aceptar`,
});
        //alert("Campos vacíos, ingrese los valores para enviar.");
        return false;
    }
    }
    function valid(){
        var nombreLength = document.getElementById("nombrew").value.length;
        var apellidoLength = document.getElementById("apellidow").value.length;
        var celularLength = document.getElementById("cel").value.length;
        if (nombreLength == 0 || apellidoLength==0) {
            Swal.fire({
  title: 'Campos vacíos, ingrese nombre y apellido para continuar.',
  showCancelButton: false,
  confirmButtonText: `Aceptar`,
});
       // alert("Campos vacíos, ingrese nombre y apellido para enviar.");
        return false;
    }
    if (celularLength == 0 ) {
            Swal.fire({
  title: 'Campos vacíos, ingrese número de celular para continuar.',
  showCancelButton: false,
  confirmButtonText: `Aceptar`,
});
       // alert("Campos vacíos, ingrese nombre y apellido para enviar.");
        return false;
    }
    }
    function validruc(){
        var nombreLength = document.getElementById("nombrerazon").value.length;
        var celularLength = document.getElementById("cel").value.length;
        if (nombreLength == 0 ) {
            Swal.fire({
  title: 'Campo vacío, ingrese nombre o razón social para continuar.',
  showCancelButton: false,
  confirmButtonText: `Aceptar`,
});
       // alert("Campo vacío, ingrese nombre o razón social para enviar.");
        return false;
    }
    if (celularLength == 0 ) {
            Swal.fire({
  title: 'Campos vacíos, ingrese número de celular para continuar.',
  showCancelButton: false,
  confirmButtonText: `Aceptar`,
});
       // alert("Campos vacíos, ingrese nombre y apellido para enviar.");
        return false;
    }
    }
    function actualizarCliente() {
       
      $.ajax({
        type: 'POST',
        url: '../ajax/cliente.php',
        data: $('#validarcliente').find("select, input").serialize(),
        success: function(response) {
          var jsonData = JSON.parse(response);
          console.log(jsonData.success);
          if(jsonData.success == "2"){
            $('#MessageCruds').html('<div class="alert bg-warning" role="alert"><em class="fa fa-exclamation-triangle-circle mr-2"></em>Se encontró mas de un 1 registró con la misma descripción, por favor intente con otro término.<a href="#" class="float-right"><em class="fa fa-remove"></em></a></div>');
          }
          if(jsonData.success == "0"){
            $('#MessageCruds').html('<div class="alert bg-danger" role="alert"><em class="fa fa-minus-circle mr-2"></em>Ocurrio un error inesperado, Por favor intente mas tarde nuevamente.<a href="#" class="float-right"><em class="fa fa-remove"></em></a></div>');
          }
          if(jsonData.success == "1"){
            $('#MessageCruds').html('<div class="alert bg-success" role="alert"><em class="fa fa-check-circle mr-2"></em>Se registró correctamente el vehiculo ingresado. Por favor de comprobar los cambios.<a href="#" class="float-right"><em class="fa fa-remove"></em></a></div>');
          }
        }
      });
    }
    function modificarTexbox(){
    document.getElementById("caja_bus").value="";
    switch(document.getElementById("elije").value) {
        case "1":         
            document.getElementById("caja_bus").setAttribute("maxlength", "8");
            document.getElementById("caja_bus").setAttribute("size", "8");
        break;
        case "2":
            document.getElementById("caja_bus").setAttribute("maxlength", "11");
            document.getElementById("caja_bus").setAttribute("size", "11");
        break;
    }
    } 
</script>
<script src="<?php echo $url_site; ?>dist/js/main2.js"></script>
