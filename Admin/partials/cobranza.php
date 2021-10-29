
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"style="min-height: 1170.12px;">
  <section class="content-header">
      <div class="container-fluid">
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
  <div id="facturaciones" class="card-block"><div class="table-buscar row"><div class="col-md-5">
  </div> <div class="col-md-3" style="padding-right: 0px;">
  <select id="anulado" class="form-control" style="height: 35px; padding: 6px 8px;">
  <option value="">--- VER TODOS ---</option> <option value="SI">CON MORA</option> 
  <option value="NO">PRÓXIMOS</option></select></div> <div class="col-md-4">
    <div class="input-group input-group-button">
      <input type="text" id="datos" placeholder="Buscar préstamo" class="form-control"> 
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
                <tbody><tr><td class="text-center">
                                                             
                                                            B001-0002
                                                        </td> <td class="text-center">
                                                            24/10/2021
                                                        </td> <td style="font-size: 11px;">
                                                        <strong><i class="ti-wheelchair"></i> MERA SEDANO, ERIKA MILAGROS</strong><br> <strong>DNI:</strong> 47012506<br>  
                                                        </td> <td class="text-center">S/ 39.00</td> <td class="text-center">
                                                          S/ 10.00
                                                        </td> 
                                                        <td class="text-center">S/ 49.00</td> 
                                                        <td class="text-center" style="padding: 0px !important; vertical-align: middle;"> 
                                                            <button id="btn_1" class="btn btn-secondary btn-sm btn-circle margin" type="button" onclick="editModal(1);" data-id="  1" > <!-- data-estado="<?php //echo $item['id_provedor']; ?>"-->
                                                                <span class="fa fa-pencil-alt"></span>
                                                            </button>
                                                            <button id="butn_1" class="btn btn-secondary btn-sm btn-circle margin" type="button" onclick="addModal(1);" data-id="  1" > <!-- data-estado="<?php //echo $item['id_provedor']; ?>"-->
                                                                <span class="fa fa-plus"></span>
                                                            </button>
                                                    
                                                        </td></tr>
                                                        <tr> <td class="text-center">
                                                             
                                                            B001-0003
                                                        </td> <td class="text-center">
                                                            24/10/2021
                                                        </td> <td style="font-size: 11px;">
                                                        <strong><i class="ti-wheelchair"></i> GOMEZ ALFONSO, JUAN BRYAN</strong><br>  <strong>RUC:</strong> 4701250<br>
                                                        </td> <td class="text-center">S/ 45.00</td><td class="text-center"><!---->
                                                          S/ 20.00
                                                        </td>
                                                         <td class="text-center">S/ 65.00</td> 
                                                         <td class="text-center" style="padding: 0px !important; vertical-align: middle;">
                                                         <button id="btn_2" class="btn btn-secondary btn-sm btn-circle margin" type="button" onclick="editModal(2);" data-id="2" > <!-- data-estado="<?php //echo $item['id_provedor']; ?>"-->
                                                                <span class="fa fa-pencil-alt"></span>
                                                            </button>
                                                            <button id="butn_2" class="btn btn-secondary btn-sm btn-circle margin" type="button" onclick="addModal(2);" data-id="2" > <!-- data-estado="<?php //echo $item['id_provedor']; ?>"-->
                                                                <span class="fa fa-plus"></span>
                                                            </button>
                                                         </td></tr>
                                                        <tr> <td class="text-center">
                                                             
                                                            B001-0004
                                                        </td> <td class="text-center">
                                                            24/10/2021
                                                        </td> <td style="font-size: 11px;"><strong><i class="ti-wheelchair"></i> DOMINGUEZ FERNANDEZ, YOVANA OLGA</strong><br> <strong>RUC:</strong> 4701250<br> 
                                                        </td> <td class="text-center">S/ 35.00</td> <td class="text-center"><!---->
                                                           S/ 00.00
                                                        </td>
                                                        <td class="text-center">S/ 35.00</td> 
                                                        <td class="text-center" style="padding: 0px !important; vertical-align: middle;">
                                                        <button id="btn_3" class="btn btn-secondary btn-sm btn-circle margin" type="button" onclick="editModal(3);" data-id="3" > <!-- data-estado="<?php //echo $item['id_provedor']; ?>"-->
                                                                <span class="fa fa-pencil-alt"></span>
                                                            </button>
                                                            <button id="butn_3" class="btn btn-secondary btn-sm btn-circle margin" type="button" onclick="addModal(3);" data-id="3" > <!-- data-estado="<?php //echo $item['id_provedor']; ?>"-->
                                                                <span class="fa fa-plus"></span>
                                                            </button>
                                                         </td></tr>
                                                        <tr> <td class="text-center">
                                                             
                                                            B001-0005
                                                        </td> <td class="text-center">
                                                            23/10/2021
                                                        </td> <td style="font-size: 11px;"><strong><i class="ti-wheelchair"></i> MERA RIOS, ERIKA MILAGROS</strong><br>  <strong>RUC:</strong> 4701250<br> 
                                                        </td> <td class="text-center">S/ 39.00</td> <td class="text-center"><!---->
                                                           S/ 00.00
                                                        </td>
                                                        <td class="text-center">S/ 39.00</td>
                                                         <td class="text-center" style="padding: 0px !important; vertical-align: middle;">
                                                         <button id="btn_4" class="btn btn-secondary btn-sm btn-circle margin" type="button" onclick="editModal(4);" data-id="4" > <!-- data-estado="<?php //echo $item['id_provedor']; ?>"-->
                                                                <span class="fa fa-pencil-alt"></span>
                                                            </button>
                                                            <button id="butn_4" class="btn btn-secondary btn-sm btn-circle margin" type="button" onclick="addModal(4);" data-id="4" > <!-- data-estado="<?php //echo $item['id_provedor']; ?>"-->
                                                                <span class="fa fa-plus"></span>
                                                            </button>
                                                        </td></tr><tr> <td class="text-center">
                                                             
                                                            B001-0006
                                                        </td> <td class="text-center">
                                                            22/10/2021
                                                        </td> <td style="font-size: 11px;"><strong><i class="ti-wheelchair"></i> COAQUIRA CHARAGUA, ROSA MARIA</strong><br> <strong>DNI:</strong> 45420911<br> 
                                                        </td> <td class="text-center">S/ 36.00</td> <td class="text-center"><!---->
                                                            S/ 10.00
                                                        </td>
                                                        <td class="text-center">S/ 46.00</td> 
                                                        <td class="text-center" style="padding: 0px !important; vertical-align: middle;">
                                                        <button id="btn_5" class="btn btn-secondary btn-sm btn-circle margin" type="button" onclick="editModal(5);" data-id="5" > <!-- data-estado="<?php //echo $item['id_provedor']; ?>"-->
                                                                <span class="fa fa-pencil-alt"></span>
                                                            </button>
                                                            <button id="butn_5" class="btn btn-secondary btn-sm btn-circle margin" type="button" onclick="addModal(5);" data-id="5" > <!-- data-estado="<?php //echo $item['id_provedor']; ?>"-->
                                                                <span class="fa fa-plus"></span>
                                                            </button>
                                                        </td></tr><tr> <td class="text-center">
                                                             
                                                            B001-0045
                                                        </td> <td class="text-center">
                                                            22/10/2021
                                                        </td> <td style="font-size: 11px;"><strong><i class="ti-wheelchair"></i> CARRUS BONILLA, FREDY</strong><br> <strong>DNI:</strong> 47012502<br>
                                                        </td> <td class="text-center">S/ 40.00</td> <td class="text-center"><!---->
                                                            S/ 60.00
                                                        </td>
                                                        <td class="text-center">S/ 100.00</td> 
                                                        <td class="text-center" style="padding: 0px !important; vertical-align: middle;">
                                                        <button id="btn_6" class="btn btn-secondary btn-sm btn-circle margin" type="button" onclick="editModal(6);" data-id="6" > <!-- data-estado="<?php //echo $item['id_provedor']; ?>"-->
                                                                <span class="fa fa-pencil-alt"></span>
                                                            </button>
                                                            <button id="butn_6" class="btn btn-secondary btn-sm btn-circle margin" type="button" onclick="addModal(6);" data-id="6" > <!-- data-estado="<?php //echo $item['id_provedor']; ?>"-->
                                                                <span class="fa fa-plus"></span>
                                                            </button>
                                                        </td></tr><tr><td class="text-center">
                                                             
                                                            B001-0091
                                                        </td> <td class="text-center">
                                                            22/10/2021
                                                        </td> <td style="font-size: 11px;"><strong><i class="ti-wheelchair"></i> ESTEBAN BEJARANO, JIM ALBERT</strong><br> <strong>RUC:</strong> 953957595<br> 
                                                        </td> <td class="text-center">S/ 40.00</td> <td class="text-center"><!---->
                                                           S/ 00.00
                                                        </td> 
                                                        <td class="text-center">S/ 40.00</td>
                                                         <td class="text-center" style="padding: 0px !important; vertical-align: middle;">
                                                         <button id="btn_7" class="btn btn-secondary btn-sm btn-circle margin" type="button" onclick="editModal(7);" data-id="7" > <!-- data-estado="<?php //echo $item['id_provedor']; ?>"-->
                                                                <span class="fa fa-pencil-alt"></span>
                                                            </button>
                                                            <button id="butn_7" class="btn btn-secondary btn-sm btn-circle margin" type="button" onclick="addModal(7);" data-id="7" > <!-- data-estado="<?php //echo $item['id_provedor']; ?>"-->
                                                                <span class="fa fa-plus"></span>
                                                            </button>
                                                        </td></tr></tbody></table></div> 
                                                        <div class="table-paginate row"><div class="col-md-4"><div class="text-left" style="padding-top: 5px;">1 de 1 Páginas </div></div> <div class="col-md-4"><ul class="pagination justify-content-center"><li class="page-item inicio disabled"><a href="#" title="Ir al inicio" class="page-link"><<<i class="ti-angle-double-left" style="vertical-align: middle;"></i></a></li> <li class="page-item disabled"><a href="#" title="Anterior" class="page-link"><<i class="ti-angle-left" style="vertical-align: middle;"></i></a></li> <li class="page-item active"><a href="#" class="page-link">1</a></li> <li class="page-item disabled"><a href="#" title="Siguiente" class="page-link">><i class="ti-angle-right" style="vertical-align: middle;"></i></a></li> <li class="page-item final disabled"><a href="#" aria-label="Next" title="Ir al final" class="page-link">>><i class="ti-angle-double-right" style="vertical-align: middle;"></i></a></li></ul></div> <div class="col-sm-4">
                                                          <div class="text-right" style="padding-top: 5px;">7 de 7 Registros</div></div></div> <div id="bvkb4e4en7lxy2wirejhmg" class="busy-load-container" style="position: absolute; top: 0px; left: 0px; background: rgba(0, 0, 0, 0.71); color: rgb(255, 255, 255); display: none; align-items: center; justify-content: center; width: 100%; height: 100%; z-index: 9999;"><div class="busy-load-container-item" style="background: none; display: flex; justify-content: center; align-items: center; flex-direction: row-reverse;"><span class="busy-load-text" style="font-size: 1rem; margin-left: 0.5rem;">Cargando datos ...</span><div class="spinner-accordion busy-load-spinner-css busy-load-spinner" style="max-height: 50px; max-width: 50px; min-height: 20px; min-width: 20px;"><div class="rect1" style="background-color: rgb(255, 255, 255);"></div> <div class="rect2" style="background-color: rgb(255, 255, 255);"></div> <div class="rect3" style="background-color: rgb(255, 255, 255);"></div> <div class="rect4" style="background-color: rgb(255, 255, 255);"></div> <div class="rect5" style="background-color: rgb(255, 255, 255);"></div></div></div></div></div></div>
                                                          </div>
                        </div>
                    </div>
                </div>
   </div>
  <!-- /.content-wrapper -->
  <!-- Añadir pago -->
  <div class="modal fade" id="AddModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="EditModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header"style="background:#28a745;color:#fff">
        <h5 class="modal-title" id="staticBackdropLabel"><b>Registrar Pago</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"style="color:#fff">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="edit">
        <div class="row">
            <div class="form-group">
                <label class="col-12 control-label no-padding" for="placa">Ingresar fecha de pago :</label>
                <div class="col-12 no-padding">
                    <input type="date" class="form-control input-sm" name="placa" id="placa" placeholder="27/10/2021" value="27/10/2021">
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="option" value="U">
                </div>
            </div>
            <div class="form-group">
                <label class="col-12 control-label no-padding" for="marca">Monto a cobrar :</label>
                <label class="col-12 control-label no-padding" for="marca"> S/ 49.00 </label>
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
        <button type="button" class="btn btn-info"> Registrar</button>
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
                <label class="col-12 control-label no-padding" for="placa">Fecha de vencimiento :</label>
                <div class="col-12 no-padding">
                    <input type="date" class="form-control input-sm" name="placa" id="placa" placeholder="Ingrese la placa del vehículo">
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="option" value="U">
                </div>
            </div>
            <div class="form-group">
                <label class="col-12 control-label no-padding" for="marca">Mora :</label>
                <div class="col-12 no-padding">
                    <!-- <input type="hidden" name="id" id="id">
                    <input type="hidden" name="option" value="U"> -->
                    <input type="number" class="form-control input-sm" name="marca" id="marca" placeholder="S/ 50">
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
        <button type="button" class="btn btn-info"> Guardar</button>
      </div>
    </div>
  </div>
</div>
<script>
    $(document).ready( function () {
    $('#tabla_id').DataTable();
  } );
      function editModal(id) {
        $('#EditModal').modal('show');
        $('#edit').find('#id').val($('#btn_' + id).data('id'));
        $('#edit').find('#placa').val($('#btn_' + id).data('placa'));
        $('#edit').find('#marca').val($('#btn_' + id).data('marca'));
        $('#edit').find('#color').val($('#btn_' + id).data('color'));
        $('#edit').find('#estacionamiento').val($('#btn_' + id).data('estacionamiento'));
        $('#edit').find('#fecha').val($('#btn_' + id).data('fecha'));
        console.log($('#btn_' + id).data('id'));
    }function addModal(id) {
        $('#AddModal').modal('show');
        $('#edit').find('#id').val($('#btn_' + id).data('id'));
        $('#edit').find('#placa').val($('#btn_' + id).data('placa'));
        $('#edit').find('#marca').val($('#btn_' + id).data('marca'));
        $('#edit').find('#color').val($('#btn_' + id).data('color'));
        $('#edit').find('#estacionamiento').val($('#btn_' + id).data('estacionamiento'));
        $('#edit').find('#fecha').val($('#btn_' + id).data('fecha'));
        console.log($('#btn_' + id).data('id'));
    }

    function EditarRegistro() {
      let parametros = new FormData($('#edit')[0]);
      $.ajax({
        type: 'POST',
        url: '../ajax/forma-de-pago.php',
        data: parametros,
        contentType: false,
        processData: false,
        success: function(response) {
          console.log(response);  
          var jsonData = JSON.parse(response);
            console.log(jsonData.success);
            $('#EditModal').modal('hide');
            if(jsonData.success == "2"){
            $('#MessageCrud').html('<div class="alert bg-warning" role="alert"><em class="fa fa-exclamation-triangle-circle mr-2"></em>Se encontró mas de un 1 registró con la misma descripción, por favor intente con otro término.<a href="#" class="float-right"><em class="fa fa-remove"></em></a></div>');
            }
            if(jsonData.success == "1"){
            $('#MessageCrud').html('<div class="alert bg-success" role="alert"><em class="fa fa-check-circle mr-2"></em>Se actualizó correctamente el vehiculo seleccionado. Por favor de comprobar los cambios.<a href="#" class="float-right"><em class="fa fa-remove"></em></a></div>');
            }
            
            //actualizar la tabla
            // $('#tabla_id').DataTable().ajax.reload();
            // window.setTimeout(function(){ 
            //     $('.alert').alert('close');
            // }, 3000);
        }
        }); 
    }
</script>