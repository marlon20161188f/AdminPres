<?php
    $list = clsCliente::Listar(Conexion::getInstancia());
?> 
<style>
.dataTables_wrapper .dataTables_paginate .paginate_button:hover {
  background: black;
  color: black!important;
  border-radius: 4px;
  border: 1px solid #828282;
}
 
.dataTables_wrapper .dataTables_paginate .paginate_button:active {
  background: black;
  color: black!important;
}
</style>
<div class="content-wrapper"style="min-height: 1170.12px;">
    <section class="content-header">
      <div class="container-fluid">
      <div id="MessageCrud"></div>
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Clientes</h1><input hidden id="sig" type="button" name="next" class="next action-button" value="" />  
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header"style="background:#001f3f;color:#fff;">
                <h3 class="card-title">Lista de clientes registrados</h3>
              </div>
              <!-- /.card-header -->
              <div class="col-12 widget-right no-padding" >
                        <button class="btn btn-info btn-md float-right" data-toggle="modal" data-target="#RegisterModal"style="margin-top:1rem; margin-right: 0.8rem;">
                            Registrar nuevo cliente
                        </button>
                    </div>
              <div class="card-body">
                <table id="example1" class="table table-hover table-xs" style="background:#8f8f8f21!important;">
                  <thead style="background:#001f3f;color:#fff;">
                  <tr>
                    <th>DNI, RUC o Extranjero</th>
                    <th>Nombres y apellidos</th>
                    <th>Dirección</th>
                    <!-- <th>Ubigeo</th> -->
                    <th>Distrito</th>
                    <th>Provincia</th>
                    <th>Departamento</th>
                    <th>Celular</th>
                    <th>Teléfono</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                      foreach ($list as $item) {     
                  ?>
                  <tr >
                        <td > <?php if( $item['dni'] !== '0' ){
                          echo $item['dni']; 
                        }else{
                          echo $item['ruc']; 
                          } ?></td>
                         <td ><?php $nomapell=$item['nombre']; $nomapell.=" "; $nomapell.=$item['apellido']; echo $nomapell; ?></td> 
                        <td ><?php echo $item['direccion']; ?></td>
                        <td ><?php echo $item['distrito']; ?></td>
                        <td ><?php echo $item['provincia']; ?></td>
                        <td ><?php echo $item['departamento']; ?></td>
                        <td ><?php echo $item['celular']; ?></td>
                        <td ><?php echo $item['telefono']; ?></td>
                      </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
  
</div>         
                  
                  
<div class="modal fade" id="RegisterModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="RegisterModal" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="background:#001f3f;color:#fff">
        <h5 class="modal-title" id="staticBackdropLabel">Registrar Datos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"style="color:#fff">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="register">
        <div class="row">
            <div class="form-group">
                <label class="col-12 control-label no-padding" for="nombre">Nombres</label>
                <div class="col-12 no-padding">
                    <input type="hidden" name="id" id="id" value="<?php echo $item['id_cliente']; ?>">
                    <input type="hidden" name="option" value="C"> 
                    <input type="text" class="form-control input-sm" name="nombre" id="nombre" placeholder="Ingrese su nombre">
                </div>
            </div>
            <div class="form-group">
                <label class="col-12 control-label no-padding" for="apellido">Apellidos</label>
                <div class="col-12 no-padding">
                    <!-- <input type="hidden" name="id" id="id">
                    <input type="hidden" name="option" value="U"> -->
                    <input type="text" class="form-control input-sm" name="apellido" id="apellido" placeholder="Ingrese su apellido">
                </div>
            </div>
            <div class="form-group">
                <label class="col-12 control-label no-padding" for="dniruc">DNI, RUC</label>
                <div class="col-12 no-padding">
                    <input type="text" class="form-control input-sm" name="dniruc" id="dniruc" placeholder="Ingrese DNI o RUC">
                    <!-- <input type="hidden" name="id" id="id">
                    <input type="hidden" name="option" value="U"> -->
                </div>
            </div>
            <div class="form-group">
                <label class="col-12 control-label no-padding" for="direccion">Dirección</label>
                <div class="col-12 no-padding">
                    <!-- <input type="hidden" name="id" id="id">
                    <input type="hidden" name="option" value="U"> -->
                    <input type="text" class="form-control input-sm" name="direccion" id="direccion" placeholder="Ingrese la dirección">
                </div>
            </div>
            <div class="form-group">
                <label class="col-12 control-label no-padding" for="distrito">Distrito</label>
                <div class="col-12 no-padding">
                    <!-- <input type="hidden" name="id" id="id">
                    <input type="hidden" name="option" value="U"> -->
                    <input type="text" class="form-control input-sm" name="distrito" id="distrito" placeholder="Ingrese el distrito">
                </div>
            </div>
            <div class="form-group">
                <label class="col-12 control-label no-padding" for="provincia">Provincia</label>
                <div class="col-12 no-padding">
                    <!-- <input type="hidden" name="id" id="id">
                    <input type="hidden" name="option" value="U"> -->
                    <input type="text" class="form-control input-sm" name="provincia" id="provincia" placeholder="Ingrese la provincia">
                </div>
            </div>
            <div class="form-group">
                <label class="col-12 control-label no-padding" for="departamento">Departamento</label>
                <div class="col-12 no-padding">
                    <!-- <input type="hidden" name="id" id="id">
                    <input type="hidden" name="option" value="U"> -->
                    <input type="text" class="form-control input-sm" name="departamento" id="departamento" placeholder="Ingrese el departamento">
                </div>
            </div>
            <div class="form-group">
                <label class="col-12 control-label no-padding" for="celular">Celular</label>
                <div class="col-12 no-padding">
                    <!-- <input type="hidden" name="id" id="id">
                    <input type="hidden" name="option" value="U"> -->
                    <input type="text" class="form-control input-sm" name="celular" id="celular" placeholder="Ingrese el celular">
                </div>
            </div>
            <div class="form-group">
                <label class="col-12 control-label no-padding" for="telefono">Teléfono</label>
                <div class="col-12 no-padding">
                    <!-- <input type="hidden" name="id" id="id">
                    <input type="hidden" name="option" value="U"> -->
                    <input type="text" class="form-control input-sm" name="telefono" id="telefono" placeholder="Ingrese el teléfono">
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
        <button type="button" class="action-button btn btn-primary" onclick="Registrar();"data-dismiss="modal" aria-label="Close" > Registrar</button>
        <!-- <button id="btn_10" class="action-button btn btn-info"onclick="ValidarRegistro();" type="button" data-dismiss="modal" aria-label="Close" >
           Registrar
         </button> -->
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
    function Registrar() {
      $.ajax({
        type: 'POST',
        url: '../ajax/cliente.php',
        data: $('#register').serialize(),
        success: function(response) {
          var jsonData = JSON.parse(response);
          console.log(jsonData.success);
          $('#RegisterModal').modal('hide');
          if(jsonData.success == "2"){
            $('#MessageCrud').html('<div class="alert bg-warning" role="alert"><em class="fa fa-exclamation-triangle-circle mr-2"></em>Se encontró mas de un 1 cliente con la misma descripción, por favor intente con otro término.<a href="#" class="float-right"><em class="fa fa-remove"></em></a></div>');
          }
          if(jsonData.success == "0"){
           // $('#MessageCrud').html('<div class="alert bg-danger" role="alert"><em class="fa fa-minus-circle mr-2"></em>Ocurrio un error inesperado, Por favor intente mas tarde nuevamente.<a href="#" class="float-right"><em class="fa fa-remove"></em></a></div>');
          }
          if(jsonData.success == "1"){
            $('#MessageCrud').html('<div class="alert bg-success" role="alert"><em class="fa fa-check-circle mr-2"></em>Se registró correctamente al cliente ingresado. Por favor de comprobar los cambios.<a href="#" class="float-right"><em class="fa fa-remove"></em></a></div>');
          }
        }
      });
      $("#val").click();
    }
  
</script>   
                  
                  