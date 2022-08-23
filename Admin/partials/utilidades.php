<?php
$list = clsPorcobrar::Listar(Conexion::getInstancia());
$ret_esp = clsPorcobrar::Listar_retorno_esperado(Conexion::getInstancia());
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
    <?php
     $valor_total=0;
    foreach ($ret_esp as $items) {
     $valor_total = $valor_total + $items['valor_cuota'];
    }
    $total_total=0;
     foreach ($list as $item) {     
      date_default_timezone_set('America/Lima');
      $fecha = date("Y-m-d");
      $date1 = new DateTime($item['fecha_cobro']);
      $date2 = new DateTime("now");
      $moraedit=$item['moratotal'];
      if($date2>$date1){
      $diff=$date1->diff($date2);
      $dias=$diff->days;
      $diamod=$item['diaMod'];
      $moraedit=$item['moratotal'];
      if($dias==0){
        $dias=0;
       $diamod=0;
      }
      }else{
      $dias=0;
      $diamod=0;
      $moraedit=0;
      }
      $moratotal=$item['mora']*($dias-$diamod)+$moraedit ; 
      $total=$item['valor_cuota']+$moratotal-$item['monto_cobrado'];
      $total_total = $total_total + $total;
     }
  ?>

    <section class="content">
        <div class="container-fluid">
        <div class="row">
              <div class="col-lg-4">
                <div class="row no-gutters">
                  <div class="col-md-12 mb-0">
                    <section class="card card-horizontal">
                      <header class="card-header bg-success">
                        <i class="fas fa-chart-line"></i>
                          <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                  <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                  <i class="fas fa-times"></i>
                                </button>
                          </div>
                      </header>
                      <div class="card-body p-1 text-center">
                        <p class="font-weight-semibold mb-0 mt-3">Total invertido</p> 
                        <h2 class="font-weight-semibold mt-0 mb-3">10000</h2> 
                      </div>
                    </section>
                  </div> 
                <div class="col-md-12 mb-0">
                  <section class="card card-horizontal">
                    <header class="card-header bg-info">
                        <i class="fas fa-reply-all"></i>
                      <div class="card-tools">
                              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                              </button>
                              <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                              </button>
                            </div>
                    </header>
                     <div class="card-body p-1 text-center">
                      <p class="font-weight-semibold mb-0 mt-3">Retorno esperado</p>
                       <h2 class="font-weight-semibold mt-0 mb-3"><?php echo $valor_total; ?></h2>
                      </div>
                    </section>
                  </div>
                  <div class="col-md-12 mb-0">
                    <section class="card card-horizontal">
                      <header class="card-header bg-warning">
                        <i class="fas fa-dollar-sign"></i>
                          <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                  <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                  <i class="fas fa-times"></i>
                                </button>
                          </div>
                      </header>
                      <div class="card-body p-1 text-center">
                        <p class="font-weight-semibold mb-0 mt-3">Total por cobrar</p> 
                        <h2 class="font-weight-semibold mt-0 mb-3"><?php echo $total_total; ?></h2> 
                      </div>
                    </section>
                  </div> 
                </div>
              </div>
              <div class="col-lg-8">
                <section class="content">
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
                              <canvas id="areaChart" style="min-height: 396px; height: 396px; max-height: 396px; max-width: 100%; display: block; width: 604px;" width="604" height="250" class="chartjs-render-monitor"></canvas>
                            </div>
                          </div>
                          <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                      </div>
                    </div>
                    <!-- /.row -->
                  <!-- /.container-fluid -->
                </section>
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
                              <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 604px;" width="604" height="250" class="chartjs-render-monitor"></canvas>
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
