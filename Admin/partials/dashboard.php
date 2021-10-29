<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> 
<div class="content-wrapper"style="min-height: 1170.12px;">
    <div class="container-fluid ">
        <div class="row justify-content-center">
            <div class="col-11 col-sm-9 col-md-7 col-lg-6 col-xl-10 text-center p-0 mt-3 mb-2">
                <div class="card px-4 pt-4 pb-0 mt-1 mb-1">
                    <h2 id="heading"> Nuevo Préstamo</h2>
                    <p>Ingrese los datos del préstamo a registrar</p>
                    <form id="msform">
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
                        <div id="MessageCrud"></div>
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
                                    <div class="col-4">
                                        <label class="fieldlabels">Tipo de documento:</label>
                                        <select class="form-control"type="text" name="uname" placeholder="DNI"style="margin:0px;margin-top:6px;"> 
                                            <option>DNI</option>
                                            <OPTIOn>RUC</OPTIOn>
                                        </select> 
                                    </div>
                                    <div class="col-1">
                                        
                                        <input hidden style="margin-left:0px" type="text"placeholder="73208361" /> 
                                    </div>
                                    <div class="col-4">
                                        <label class="fieldlabels">Número de documento:</label>
                                        <input style="margin-left:0px" type="text"placeholder="73208361" /> 
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
                            <input hidden id="sig" type="button" name="next" class="next action-button" value="Siguiente" />  
                        </fieldset>
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Parámetros del préstamo:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Paso 2 - 4</h2>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label class="fieldlabels">Tipo de préstamo: </label> 
                                        <select class="form-control"type="email" name="email" placeholder="Mensual"style="margin-top:5px;margin-bottom: 0rem;" >
                                            <option>Diario</option>
                                            <option>Semanal</option>
                                            <option>Mensual</option>
                                        </select> 
                                        <label class="fieldlabels">Número de cuotas: </label>
                                        <input type="number"  placeholder="10" />
                                        <label class="fieldlabels">Mora por día de retraso S/ : </label> 
                                        <input type="number" name="cpwd" placeholder="10" />
                                    </div>
                                    <div class="col-6">
                                        <label class="fieldlabels">Monto prestado S/ : </label> 
                                        <input type="number" name="pwd" placeholder="12000" /> 
                                        <label class="fieldlabels">Tasa de interés %: </label> 
                                        <input type="number" name="pwd" placeholder="5" /> 
                                        <label class="fieldlabels">Fecha de desembolso: </label> 
                                        <input type="date" name="pwd" placeholder="24/10/2021" /> 
                                        
                                    </div>
                                </div>
                            </div>
                             <input type="button" name="next" class="next action-button" value="Siguiente" />
                             <input type="button" name="previous" class="previous action-button-previous" value="Atrás" />
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
                                    <div class="col-6">
                                    <?php include('layout/tabla_de_prestamos.php'); ?>
                                    </div>
                                </div>
                            </div> <input type="button" name="next" class="next action-button" value="Siguiente" /> <input type="button" name="previous" class="previous action-button-previous" value="Atrás" />
                        </fieldset>
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Datos del préstamo:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Paso 4 - 4</h2>
                                    </div>
                                </div> 
                                <div class="row justify-content-center">
                                    <div class="col-6">
                                    <?php include('layout/tabla_visualisar.php'); ?>
                                    </div>
                                </div>
                            </div> <input type="button" name="next" class="next action-button" value="Validar" /> <input type="button" name="Atrás" class="previous action-button-previous" value="Atrás" />
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
        <h5 class="modal-title" id="staticBackdropLabel">Validar Datos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"style="color:#fff">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="edit">
        <div class="row">
            <div class="form-group">
                <label class="col-12 control-label no-padding" for="marca">Nombres</label>
                <div class="col-12 no-padding">
                    <!-- <input type="hidden" name="id" id="id">
                    <input type="hidden" name="option" value="U"> -->
                    <input type="text" class="form-control input-sm" name="marca"  placeholder="JUAN BRYAN">
                </div>
            </div>
            <div class="form-group">
                <label class="col-12 control-label no-padding" for="marca">Apellidos</label>
                <div class="col-12 no-padding">
                    <!-- <input type="hidden" name="id" id="id">
                    <input type="hidden" name="option" value="U"> -->
                    <input type="text" class="form-control input-sm" name="marca"  placeholder="GOMEZ ALFONSO">
                </div>
            </div>
            <div class="form-group">
                <label class="col-12 control-label no-padding" for="placa">DNI, RUC</label>
                <div class="col-12 no-padding">
                    <input type="text" class="form-control input-sm" name="placa"  placeholder="73208361">
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="option" value="U">
                </div>
            </div>
            <div class="form-group">
                <label class="col-12 control-label no-padding" for="color">Dirección</label>
                <div class="col-12 no-padding">
                    <!-- <input type="hidden" name="id" id="id">
                    <input type="hidden" name="option" value="U"> -->
                    <input type="text" class="form-control input-sm" name="color"  placeholder="Calle 53 No 10, Piso 2">
                </div>
            </div>
            <div class="form-group">
                <label class="col-12 control-label no-padding" for="estacionamiento">Ubigeo</label>
                <div class="col-12 no-padding">
                    <!-- <input type="hidden" name="id" id="id">
                    <input type="hidden" name="option" value="U"> -->
                    <input type="text" class="form-control input-sm" name="estacionamiento" placeholder="16414622">
                </div>
            </div>
            <div class="form-group">
                <label class="col-12 control-label no-padding" for="estacionamiento">Distrito</label>
                <div class="col-12 no-padding">
                    <!-- <input type="hidden" name="id" id="id">
                    <input type="hidden" name="option" value="U"> -->
                    <input type="text" class="form-control input-sm" name="estacionamiento" placeholder="Lonya Chico">
                </div>
            </div>
            <div class="form-group">
                <label class="col-12 control-label no-padding" for="estacionamiento">Provincia</label>
                <div class="col-12 no-padding">
                    <!-- <input type="hidden" name="id" id="id">
                    <input type="hidden" name="option" value="U"> -->
                    <input type="text" class="form-control input-sm" name="estacionamiento" placeholder="Luya">
                </div>
            </div>
            <div class="form-group">
                <label class="col-12 control-label no-padding" for="estacionamiento">Departamento</label>
                <div class="col-12 no-padding">
                    <!-- <input type="hidden" name="id" id="id">
                    <input type="hidden" name="option" value="U"> -->
                    <input type="text" class="form-control input-sm" name="estacionamiento"  placeholder="Amazonas">
                </div>
            </div>
            <div class="form-group">
                <label class="col-12 control-label no-padding" for="estacionamiento">Celular</label>
                <div class="col-12 no-padding">
                    <!-- <input type="hidden" name="id" id="id">
                    <input type="hidden" name="option" value="U"> -->
                    <input type="text" class="form-control input-sm" name="estacionamiento"  placeholder="995876803">
                </div>
            </div>
            <div class="form-group">
                <label class="col-12 control-label no-padding" for="estacionamiento">Teléfono</label>
                <div class="col-12 no-padding">
                    <!-- <input type="hidden" name="id" id="id">
                    <input type="hidden" name="option" value="U"> -->
                    <input type="text" class="form-control input-sm" name="estacionamiento"  placeholder="8844437">
                </div>
            </div>
            <!-- <div class="form-group">
                <label class="col-12 control-label no-padding" for="fecha">Fecha de registro</label>
                <div class="col-12 no-padding">
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="option" value="U"> 
                    <input type="text" class="form-control input-sm" name="fecha" id="fecha" placeholder="Ingrese la fecha del registro del vehículo">
                </div>
            </div> -->
        </div>
        <div class="message" id="editMessage"></div>
        </form>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-primary" onclick="ValidarRegistro();">
        <i class="fa fa-save"></i> Guardar</button> -->
        
         <button id="btn_10" class="action-button btn btn-primary"onclick="ValidarRegistro();" type="button" data-dismiss="modal" aria-label="Close" >
        Siguiente
         </button> 
         <!-- <input type="button" name="next" class="next action-button" value="Siguiente" data-dismiss="modal" aria-label="Close" />   -->
         
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
    function ValidarRegistro() {
      let parametros = new FormData($('#edit')[0]);
      $("#sig").click();
      //$('#Message').html('<input type="button" name="next" class="next action-button next" value="Siguiente" />');

      //$('#MessageCrud').html('<div class="alert bg-success" role="alert"><em class="fa fa-check-circle mr-2"></em>Se ha validado correctamente los datos del Cliente. Por favor continúe con el proceso del préstamo<a href="#" class="float-right"><em class="fa fa-remove"></em></a></div>');
    }
</script>