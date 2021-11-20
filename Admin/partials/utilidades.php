<?php
    $list = clsUtilidad::Listar(Conexion::getInstancia());
    $list_mora = clsMoras::Listar(Conexion::getInstancia());
?> 
<style>
  #menu * { list-style:none;}
  #menu li{ line-height:180%;}
  #menu li a{color:#222; text-decoration:none;}
  #menu li a:before{ content:"\025b8"; color:#ddd; margin-right:4px;}
  #menu input[name="list"] {
    position: absolute;
    left: -1000em;
    }
  #menu label:before{ content:"\025b8"; margin-right:4px;}
  #menu input:checked ~ label:before{ content:"\025be";}
  #menu .interior{display: none;}
  #menu input:checked ~ ul{display:block;}

</style>
<div class="content-wrapper"style="min-height: 1170.12px;">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Utilidades</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Monto ganado por préstamo</h3>

                <div class="card-tools">
                  <!-- <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div> -->
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
              <div class="col-md-4"><ul class="pagination justify-content-center"></div>
                <table id="utilidad" class="table table-hover text-nowrap">
                  <thead>
                    <tr style="background-color:#001f3f;color:#ffffff;">
                      <th>Código de préstamo</th>
                      <th>Datos del cliente</th>
                      <th>Monto desembolsado</th>
                      <th>Interés </th>
                      <th>Monto cobrado</th>
                      <th>Utilidades</th>
                      <th>Moras</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                        foreach ($list as $item) {     
                  ?>
                    <tr>
                      <td> <?php $codigo="B001-"; $codigo.=$item['id_prestamo']; echo $codigo; ?></td>
                      <td style="font-size: 11px;">
                   <strong><i class="ti-wheelchair"></i>  <?php $nomapell=$item['nombre']; $nomapell.=" "; $nomapell.=$item['apellido']; echo $nomapell; ?>
                </strong><br> <?php if( $item['dni'] !== '0' ){ ?>
                          <strong>DNI:</strong> <?php echo $item['dni']; ?><br>
                     <?php }else{ ?>
                      <strong>RUC:</strong> <?php echo $item['ruc']; ?><br> 
                      <?php  } ?> 
                  </td> 
                      <td>S/  <?php echo $item['monto']; ?></td>
                      <td> <?php echo $item['tasa']; ?>%</td>
                      <td>S/  <?php echo $item['montotatalcobrado']; ?></td>
                      <td>S/  <?php $utilidad=$item['montotatalcobrado']-$item['monto'];
                      // if($utilidad<0){
                      //   $utilidad="pendiente";
                      // }
                      echo $utilidad; ?></td>
                      <td style="font-size: 11px;">
                        <ul id="menu">
                        <li><input type="checkbox" name="list" id="nivel1-<?php echo $item['id_prestamo']; ?>"><label for="nivel1-<?php echo $item['id_prestamo']; ?>"><strong><i class="ti-wheelchair"></i> Moras: </strong><?php 
                        if(isset(array_count_values(array_column($list_mora,'codigo'))[$item['id_prestamo']])){
                        echo array_count_values(array_column($list_mora,'codigo'))[$item['id_prestamo']]; }?><br></label>
                        <ul class="interior">
                          <?php foreach ($list_mora as $item_mora) {
                                  if ( $item_mora['codigo']==$item['id_prestamo'] ) {
                            ?>
                              <li><input name="list"   ><label for="nivel2-1"> <strong> </strong> <?php echo $item_mora['fecha_de_pago']; ?> - S/ <?php echo $item_mora['mora']; ?><br></label>
                              </li>
                              <?php } ?>
                          <?php } ?>   
                        </ul>
                        </li>
                        </ul>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        </div>
    </section>  
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <!-- AREA CHART -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Préstamos y Ganancias</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body" style="display: block;">
                <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                  <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 604px;" width="604" height="250" class="chartjs-render-monitor"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    
</div>
