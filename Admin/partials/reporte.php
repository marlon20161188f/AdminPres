<?php
    $list = clsReporte::Listar(Conexion::getInstancia());
?> 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"style="min-height: 1170.12px;">
  <section class="content-header">
      <div class="container-fluid">
      <div id="MessageCobro"></div>
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Reporte</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">

                            <div class="card">
                                <div class="card-header"style="background-color:#ffc107;color:#ffffff;">
                                    <div class="doc-card-title float-left">COBROS REGISTRADOS</div>
                                </div>
  <div id="facturaciones" class="card-block"><div class="table-buscar row"><div class="col-md-5">
  </div> <div class="col-md-3" style="padding-right: 0px;">
  </div> <div class="col-md-4">
    <div class="input-group input-group-button">
      <input type="text" id="datos" placeholder="Buscar Reporte" class="form-control"> 
      <span class="input-group-addon"><i class="ti-search"></i></span></div></div></div> 
      <div id="formularioModal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" class="modal fade">
        <div role="document" class="modal-dialog"><!----></div>
      </div> <div id="my_table" class="table-listar" style="position: relative;">
      <div class="table-responsive">
        <table id="tabla_idd"class="table table-hover table-xs"style="background-color:#8f8f8f21;">
          <thead><tr class="first"style="background-color:#001f3f;color:#ffffff;">
             <th class="th2 text-center">CODIGO DE PRÉSTAMO</th>
              <th class="th3 text-center">FECHA DE PAGO</th> 
              <th class="th4">DATOS</th> 
              <th class="th5 text-center">MONTO COBRADO</th> 
              <th class="th7 text-center">ELIMINAR</th></tr></thead>
       <tbody>
       <?php
         foreach ($list as $item) {     
       ?>
           <tr> <td class="text-center">    
                <?php $codigo="B001-"; $codigo.=$item['id_prestamo']; echo $codigo; ?>
                  </td> <td class="text-center">
                  <?php echo $item['fecha_de_pago']; ?>
                  </td> <td style="font-size: 11px;">
                   <strong><i class="ti-wheelchair"></i>  <?php $nomapell=$item['nombre']; $nomapell.=" "; $nomapell.=$item['apellido']; echo $nomapell; ?>
                </strong><br> <?php if( $item['dni'] !== '0' ){ ?>
                          <strong>DNI:</strong> <?php echo $item['dni']; ?><br>
                     <?php }else{ ?>
                      <strong>RUC:</strong> <?php echo $item['ruc']; ?><br> 
                      <?php  } ?> 
                  </td> <td class="text-center">S/ <?php echo $item['monto_cobrado']; ?></td> 
                    <td class="text-center" style="padding: 0px !important; vertical-align: middle;">  
                    <button id="btn_<?php echo $item['id_cobrado']; ?>" class="btn btn-secondary btn-sm btn-circle margin" onclick="Eliminar(<?php echo $item['id_cobrado']; ?>,<?php echo $item['id_cobro']; ?> )">
                     <span class="fa fa-trash"></span>
                    </button>
                  </td></tr>
            <?php  } ?>      
                </tbody></table></div> <div class="table-paginate row"><div class="col-md-4"><div class="text-left" style="padding-top: 5px;">1 de 1 Páginas </div></div> <div class="col-md-4"><ul class="pagination justify-content-center"><li class="page-item inicio disabled"><a href="#" title="Ir al inicio" class="page-link"><<<i class="ti-angle-double-left" style="vertical-align: middle;"></i></a></li> <li class="page-item disabled"><a href="#" title="Anterior" class="page-link"><<i class="ti-angle-left" style="vertical-align: middle;"></i></a></li> <li class="page-item active"><a href="#" class="page-link">1</a></li> <li class="page-item disabled"><a href="#" title="Siguiente" class="page-link">><i class="ti-angle-right" style="vertical-align: middle;"></i></a></li> <li class="page-item final disabled"><a href="#" aria-label="Next" title="Ir al final" class="page-link">>><i class="ti-angle-double-right" style="vertical-align: middle;"></i></a></li></ul></div> <div class="col-sm-4">
                                                          <div class="text-right" style="padding-top: 5px;">7 de 7 Registros</div></div></div> <div id="bvkb4e4en7lxy2wirejhmg" class="busy-load-container" style="position: absolute; top: 0px; left: 0px; background: rgba(0, 0, 0, 0.71); color: rgb(255, 255, 255); display: none; align-items: center; justify-content: center; width: 100%; height: 100%; z-index: 9999;"><div class="busy-load-container-item" style="background: none; display: flex; justify-content: center; align-items: center; flex-direction: row-reverse;"><span class="busy-load-text" style="font-size: 1rem; margin-left: 0.5rem;">Cargando datos ...</span><div class="spinner-accordion busy-load-spinner-css busy-load-spinner" style="max-height: 50px; max-width: 50px; min-height: 20px; min-width: 20px;"><div class="rect1" style="background-color: rgb(255, 255, 255);"></div> <div class="rect2" style="background-color: rgb(255, 255, 255);"></div> <div class="rect3" style="background-color: rgb(255, 255, 255);"></div> <div class="rect4" style="background-color: rgb(255, 255, 255);"></div> <div class="rect5" style="background-color: rgb(255, 255, 255);"></div></div></div></div></div></div>
                                                          </div>
                        </div>
                    </div>
                </div>
   </div>
  <!-- /.content-wrapper -->


  <script>
        $(document).ready( function () {
    $('#tabla_idd').DataTable();
  } );
    function Eliminar(id_cobrado,id_cobro) {
      Swal.fire({
  title: '¿Usted esta seguro de eliminar el monto cobrado?',
  text: 'Este monto se va a reponer en "Por cobrar"',
  showCancelButton: true,
  confirmButtonText: `Aceptar`,
}).then((result) => {
  if (result.isConfirmed) {
     $.ajax({
             type: 'POST',
             url: '../ajax/porcobrar.php',
             data: {option:'D', id_cobrado: id_cobrado, id_cobro: id_cobro},
             success: function(response) {
               var jsonData = JSON.parse(response);
               if(jsonData.success == "1"){
             $('#MessageCobro').html('<div class="alert bg-success" role="alert"><em class="fa fa-check-circle mr-2"></em>El reporte del cobro será regresado a la tabla "Por cobrar". Por favor de comprobar los cambios.<a href="#" class="float-right"><em class="fa fa-remove"></em></a></div>');
           }
             }
           });
  } 
})
      

      
    }
  </script>