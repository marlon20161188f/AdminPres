<?php
    // $list = clsPorcobrar::Listar(Conexion::getInstancia());
    if(isset($_POST['submit'])){
      $ver=$_POST['verr'];
       $list = clsPorcobrar::Listar_ver(Conexion::getInstancia(), $ver);
    }else{
  $list = clsPorcobrar::Listar(Conexion::getInstancia());}
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
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"style="min-height: 1170.12px;">
  <section class="content-header">
      <div class="container-fluid">
      <div id="Message"></div>
      <div id="MessagePago"></div>
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Por cobrar</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header"style="background-color:#28a745;color:#ffffff;">
                                    <div class="doc-card-title float-left">LISTA DE CUOTAS POR COBRAR</div>
                                </div>
  <div id="facturaciones" class="card-block"><div class="table-buscar row">
    <div class="col-md-0">
    <form action=""method="POST">
  </div> <div id="filtra" class="col-md-3" style="padding-right: 0px;"><div class="col-md-4"><ul class="pagination justify-content-center"></div>
  <select method="POST" id="ver" name="verr" class="form-control" style="height: 35px; padding: 6px 8px;">
  <option value="1">--- VER TODOS ---</option> <option value="2">CON MORA</option> 
  <option value="3">PRÓXIMOS</option></select>
  <input type="submit" value="Filtrar" name="submit" class="btn btn-dark" style="margin-top: 10px; width: 90px; height: 35px; padding: 6px 8px;">
  </div></form><div class="col-md-4">
  <div class="input-group input-group-button">
      <!-- <input type="text" id="datos" placeholder="Buscar préstamo" class="form-control">  -->
      <span class="input-group-addon"><i class="ti-search"></i></span></div></div></div> 
      <div id="formularioModal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" class="modal fade">
        <div role="document" class="modal-dialog"><!----></div>
      </div> <div id="my_table" class="table-listar" style="position: relative;">
      <div class="table-responsive">
        <table id="tabla_id"class="table table-hover table-xs"style="background-color:#8f8f8f21;">
          <thead><tr class="first" style="background-color:#001f3f;color:#ffffff;">
            
             <th class="th2 text-center">CODIGO DE PRÉSTAMO</th>
              <th class="th3 text-center">FECHA DE VENCIMIENTO</th> 
              <th class="th4 text-center">CLIENTE</th> 
              <th class="th5 text-center">VALOR DE CUOTA</th> 
              <th class="th1 text-center">MORA</th>
              <th class="th6 text-center">TOTAL A COBRAR</th> 
              <th class="th7 text-center">OPCIONES</th></tr></thead>
                <tbody>
                <?php
                      foreach ($list as $item) {     
                  ?>
                    <tr><td class="text-center">      
                    <?php $codigo="B001-"; $codigo.=$item['id_prestamo']; echo $codigo; ?>
                  </td> <td class="text-center">
                  <?php echo $item['fecha_cobro']; ?>
                  </td> <td style="font-size: 11px;">
                   <strong><i class="ti-wheelchair"></i> <?php $nomapell=$item['nombre']; $nomapell.=" "; $nomapell.=$item['apellido']; echo $nomapell; ?>
                  </strong><br> 
                  <?php if( $item['dni'] !== '0' ){ ?>
                          <strong>DNI:</strong> <?php echo $item['dni']; ?><br>
                     <?php }else{ ?>
                      <strong>RUC:</strong> <?php echo $item['ruc']; ?><br> 
                      <?php  } ?> 
                   </td> <td class="text-center">S/ <?php echo $item['valor_cuota']; ?></td> <td class="text-center">
                    S/ <?php 
                    date_default_timezone_set('America/Lima');
                    $fecha = date("Y-m-d");
                    $date1 = new DateTime($item['fecha_cobro']);
                    $date2 = new DateTime("now");
                    if($date2>$date1){
                    $diff=$date1->diff($date2);
                    $dias=$diff->days;
                    }else{
                    $dias=0;
                    }
                    $moratotal=$item['mora']*$dias ; echo $moratotal; ?>
                     </td> 
                    <td class="text-center">S/ <?php $total=$item['valor_cuota']+$moratotal; echo $total; ?></td> 
                    <td class="text-center" style="padding: 0px !important; vertical-align: middle;"> 
                    <button id="btn_<?php echo $item['id_cobro']; ?>" class="btn btn-secondary btn-sm btn-circle margin" type="button" 
                    onclick="editModal(<?php echo $item['id_cobro']; ?>);" data-id="<?php echo $item['id_cobro']; ?>" 
                    data-fecha_cobro="<?php echo $item['fecha_cobro']; ?>" data-mora="<?php echo $item['mora']; ?>">
                    <span class="fa fa-pencil-alt"></span>
                    </button>
                    <button id="botn_<?php echo $item['id_cobro']; ?>" class="btn btn-secondary btn-sm btn-circle margin" type="button" 
                    onclick="addModal(<?php echo $item['id_cobro']; ?>);" data-id="<?php echo $item['id_cobro']; ?>" 
                    data-fecha_cobro="<?php echo $item['fecha_cobro']; ?>" data-mora="<?php echo $item['mora']; ?>"
                    data-total="<?php echo $total; ?>" data-total_cob="<?php echo $total; ?>"
                    data-codigo="<?php echo $item['codigo']; ?>">
                    <span class="fa fa-plus"></span>
                     </button>                       
                    </td>
                  <?php  } ?>  
                  </tbody></table></div> 
                    <!-- <div class="table-paginate row"><div class="col-md-4"><div class="text-left" style="padding-top: 5px;">1 de 1 Páginas </div></div> 
                     -->
                     <div class="col-md-4"><ul class="pagination justify-content-center"></div>
                      <!--<li class="page-item inicio disabled"><a href="#" title="Ir al inicio" class="page-link"><<<i class="ti-angle-double-left" style="vertical-align: middle;"></i></a></li> <li class="page-item disabled"><a href="#" title="Anterior" class="page-link"><<i class="ti-angle-left" style="vertical-align: middle;"></i></a></li> <li class="page-item active"><a href="#" class="page-link">1</a></li> <li class="page-item disabled"><a href="#" title="Siguiente" class="page-link">><i class="ti-angle-right" style="vertical-align: middle;"></i></a></li> <li class="page-item final disabled"><a href="#" aria-label="Next" title="Ir al final" class="page-link">>><i class="ti-angle-double-right" style="vertical-align: middle;"></i></a></li></ul></div> <div class="col-sm-4"> -->
                    <!-- <div class="text-right" style="padding-top: 5px;">7 de 7 Registros</div></div></div> <div id="bvkb4e4en7lxy2wirejhmg" class="busy-load-container" style="position: absolute; top: 0px; left: 0px; background: rgba(0, 0, 0, 0.71); color: rgb(255, 255, 255); display: none; align-items: center; justify-content: center; width: 100%; height: 100%; z-index: 9999;"><div class="busy-load-container-item" style="background: none; display: flex; justify-content: center; align-items: center; flex-direction: row-reverse;"><span class="busy-load-text" style="font-size: 1rem; margin-left: 0.5rem;">Cargando datos ...</span><div class="spinner-accordion busy-load-spinner-css busy-load-spinner" style="max-height: 50px; max-width: 50px; min-height: 20px; min-width: 20px;"><div class="rect1" style="background-color: rgb(255, 255, 255);"></div> <div class="rect2" style="background-color: rgb(255, 255, 255);"></div> <div class="rect3" style="background-color: rgb(255, 255, 255);"></div> <div class="rect4" style="background-color: rgb(255, 255, 255);"></div> <div class="rect5" style="background-color: rgb(255, 255, 255);"></div></div></div></div></div></div> -->
                    </div>
                        </div>
                    </div>
                </div>
   </div>
  <!-- /.content-wrapper -->
  <!-- Añadir pago -->
  <div class="modal fade" id="AddModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="AddModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header"style="background:#28a745;color:#fff">
        <h5 class="modal-title" id="staticBackdropLabel"><b>Registrar Pago</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"style="color:#fff">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="edits">
        <div class="row">
            <div class="form-group">
                <label class="col-12 control-label no-padding" for="fecha_pago">Ingresar fecha de pago :</label>
                <div class="col-12 no-padding">
                    <input type="date" class="form-control input-sm" name="fecha_pago" id="fecha_pago" value="<?php echo date('Y-m-d');?>" >
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="codigo" id="codigo">
                    <input type="hidden" name="option" value="R">
                </div>
            </div>
            <div class="form-group">
                <label class="col-12 control-label no-padding" for="total">Monto a cobrar :</label>
                <!-- <label class="col-12 control-label no-padding" for="total_mos"name="total_mos" id="total_mos"> S/ <?php echo $total; ?> </label> -->
                <div class="col-12 no-padding">
                  <input disabled type="number" class="form-control input-sm" name="total_cob" id="total_cob" >
                  <input type="hidden" class="form-control input-sm" name="total" id="total" >

                </div>
                <!-- <div class="col-12 no-padding">
                     --<input type="hidden" name="id" id="id">
                    <input type="hidden" name="option" value="U"> --
                    <input type="number" class="form-control input-sm" name="marca" id="marca" placeholder="50"calue="40">
                </div> -->
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
      <button type="button" class="btn btn-info" onclick="AddRegistro();">Registrar</button>
      </div>
    </div>
  </div>
</div>
  <!-- Editar  -->
  <div class="modal fade" id="EditModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="EditModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header"style="background:#ffc107;color:#fff">
        <h5 class="modal-title" id="staticBackdropLabel"><b>Editar</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"style="color:#fff">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="edit">
        <div class="row">
            <div class="form-group">
                <label class="col-12 control-label no-padding" for="fecha_cobro">Fecha de vencimiento :</label>
                <div class="col-12 no-padding">
                    <input type="date" class="form-control input-sm" name="fecha_cobro" id="fecha_cobro"  >
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="option" value="U">
                </div>
            </div>
            <div class="form-group">
                <label class="col-12 control-label no-padding" for="mora">Mora S/ :</label>
                <div class="col-12 no-padding">
                    <!-- <input type="hidden" name="id" id="id">
                    <input type="hidden" name="option" value="U"> -->
                    <input type="number" class="form-control input-sm" name="mora" id="mora" placeholder="S/ 100">
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
        <!-- <button type="button" class="btn btn-info"> Guardar</button> -->
        <button type="button" class="btn btn-info" onclick="EditarRegistro();">Guardar</button>
      </div>
    </div>
  </div>
</div>
<script>
    $(document).ready( function () {
    $('#tabla_ids').DataTable();
  } );
    //  function filtro(){
    //   var ver=document.getElementById("ver").value;
    //   var mData={ver: ver}
    //   $.ajax({
    //       type: 'POST',
    //       data: mData,
    //       dataType: 'html'
    //     });
    // }
      function editModal(id) {
        $('#EditModal').modal('show');
        $('#edit').find('#id').val($('#btn_' + id).data('id'));
        $('#edit').find('#fecha_cobro').val($('#btn_' + id).data('fecha_cobro'));
        $('#edit').find('#mora').val($('#btn_' + id).data('mora'));
        console.log($('#btn_' + id).data('id'));
    }function addModal(id) {
        $('#AddModal').modal('show');
        $('#edits').find('#id').val($('#botn_' + id).data('id'));
        $('#edits').find('#fecha_cobro').val($('#botn_' + id).data('fecha_cobro'));
        $('#edits').find('#mora').val($('#botn_' + id).data('mora'));
        $('#edits').find('#total').val($('#botn_' + id).data('total'));
        $('#edits').find('#total_cob').val($('#botn_' + id).data('total_cob'));
        $('#edits').find('#codigo').val($('#botn_' + id).data('codigo'));
        console.log($('#botn_' + id).data('id'));
    }

    function EditarRegistro() {
      let parametros = new FormData($('#edit')[0]);
      $.ajax({
        type: 'POST',
        url: '../ajax/porcobrar.php',
        data: parametros,
        contentType: false,
        processData: false,
        success: function(response) {
          console.log(response);  
          var jsonData = JSON.parse(response);
            console.log(jsonData.success);
            $('#EditModal').modal('hide');
            if(jsonData.success == "2"){
            $('#Message').html('<div class="alert bg-warning" role="alert"><em class="fa fa-exclamation-triangle-circle mr-2"></em>Se encontró mas de un 1 registró con la misma descripción, por favor intente con otros términos.<a href="#" class="float-right"><em class="fa fa-remove"></em></a></div>');
            }
            if(jsonData.success == "1"){
            $('#Message').html('<div class="alert bg-success" role="alert"><em class="fa fa-check-circle mr-2"></em>Se actualizó correctamente los datos de cobro. Por favor de comprobar los cambios.<a href="#" class="float-right"><em class="fa fa-remove"></em></a></div>');
            }
            if(jsonData.success == "0"){
            $('#Message').html('<div class="alert bg-danger" role="alert"><em class="fa fa-minus-circle mr-2"></em>Ocurrio un error inesperado, Por favor intente mas tarde nuevamente.<a href="#" class="float-right"><em class="fa fa-remove"></em></a></div>');
          }
        }
        }); 
    } function AddRegistro() {
      let parametros = new FormData($('#edits')[0]);
      $.ajax({
        type: 'POST',
        url: '../ajax/porcobrar.php',
        data: parametros,
        contentType: false,
        processData: false,
        success: function(response) {
          console.log(response);  
          var jsonData = JSON.parse(response);
            console.log(jsonData.success);
            $('#AddModal').modal('hide');
            if(jsonData.success == "2"){
            $('#MessagePago').html('<div class="alert bg-warning" role="alert"><em class="fa fa-exclamation-triangle-circle mr-2"></em>Se encontró mas de un 1 registró con la misma descripción, por favor intente con otros términos.<a href="#" class="float-right"><em class="fa fa-remove"></em></a></div>');
            }
            if(jsonData.success == "1"){
            $('#MessagePago').html('<div class="alert bg-success" role="alert"><em class="fa fa-check-circle mr-2"></em>Se realizó el cobro correctamente y se registro en "Reporte". Por favor de comprobar los cambios.<a href="#" class="float-right"><em class="fa fa-remove"></em></a></div>');
            }
            if(jsonData.success == "0"){
            $('#MessagePago').html('<div class="alert bg-danger" role="alert"><em class="fa fa-minus-circle mr-2"></em>Ocurrio un error inesperado, Por favor intente mas tarde nuevamente.<a href="#" class="float-right"><em class="fa fa-remove"></em></a></div>');
          }
        }
        }); 
    }
</script>