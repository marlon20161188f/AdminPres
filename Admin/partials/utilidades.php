<?php
    // $list = clsPorcobrar::Listar(Conexion::getInstancia());
$total_invertido = clsUtilidad::Listar_total_invertido(Conexion::getInstancia());
$total_cobrar = clsUtilidad::Listar_total_cobrar(Conexion::getInstancia());
$ret_esp = clsUtilidad::Listar_retorno_esperado(Conexion::getInstancia());
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
     $valor_total_invertido=0;
    foreach ($total_invertido as $itemss) {
      $valor_total_invertido = $valor_total_invertido + $itemss['monto'];
     }
     $valor_total_esperado=0;
    foreach ($ret_esp as $items) {
     $valor_total_esperado = $valor_total_esperado + $items['valor_cuota'];
    }
    $total_total=0;
     foreach ($total_cobrar as $item) {     
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
                        <h2 class="font-weight-semibold mt-0 mb-3"><?php echo $valor_total_invertido; ?></h2> 
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
                       <h2 class="font-weight-semibold mt-0 mb-3"><?php echo $valor_total_esperado; ?></h2>
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
                        <!-- GRAFICO 1 -->
                        <div class="card card-primary">
                          <div class="card-header">
                            <h3 class="card-title">Total cobrado y Total desembolsado</h3>

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
                          <form action=""method="POST">
                            <div class="row">
                            <div id="filtra" class="col-md-3" style="padding-right: 0px;">
                            <select method="POST" id="verT" name="verT" class="form-control" style="height: 35px; padding: 6px 8px;">
                            <option value="1" selected="selected">Día</option> 
                            <option value="2">Mes</option>
                            <!-- <option value="3">Rango de fecha</option> -->
                          </select>
                            </div>
                            <div id="filt"></div>
                            </div>
                            </form>
                            <div id="grafico1">
                              <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                <canvas id="barChart1" style="min-height: 362px; height: 396px; max-height: 362px; max-width: 100%; display: block; width: 604px;" width="604" height="250" class="chartjs-render-monitor"></canvas>
                              </div>
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
                        <!-- GRAFICO 2 -->
                        <div class="card card-primary">
                          <div class="card-header">
                            <h3 class="card-title">Saldo</h3>

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
                          <form action=""method="POST">
                            <div class="row">
                            <div id="filtra" class="col-md-3" style="padding-right: 0px;">
                            <select method="POST" id="verS" name="verS" class="form-control" style="height: 35px; padding: 6px 8px;">
                            <option value="1" selected="selected">Día</option> 
                            <option value="2">Mes</option>
                            <!-- <option value="3">Rango de fecha</option> -->
                          </select>
                            </div>
                            <div id="fils">
                            </div>
                            </div>
                            </form>
                            <div id="grafico2">
                              <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                <canvas id="barChart1" style="min-height: 362px; height: 396px; max-height: 362px; max-width: 100%; display: block; width: 604px;" width="604" height="250" class="chartjs-render-monitor"></canvas>
                              </div>
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
<script>
  $('#verT').change(function(){
    var val= $('#verT option:selected').val();
    console.log(val);
    switch (val) {
        case '1':
          $('#filt').html('<input type="text" name="dia" id="diaT" value="<?php date_default_timezone_set('America/Lima'); echo date('Y-m-d'); ?>" class="form-control" style="margin-left: 10px;margin-top: 0px; width: 140px; height: 35px; padding: 6px 8px;">');
        break;
        case '2':
          $('#filt').html('<input id="mesT" type="month" value="<?php date_default_timezone_set('America/Lima'); echo date('Y-m'); ?>" class="form-control" style="margin-left: 10px;margin-top: 0px; width: 180px; height: 35px; padding: 6px 8px;">');
          var verT= $('#verT option:selected').val();
          var mesT =$('#mesT').val();
          console.log(verT,mesT);
          grafico1_mes(verT,mesT);
          // $( "#mesT" ).datepicker({ 
          // changeMonth: true,
          // changeYear: true,
          // showButtonPanel: true,
          // dateFormat: 'yy-mm',
          // onSelect: function(){
          // var verT= $('#verT option:selected').val();
          // var mesT =$('#mesT').val();
          // console.log(verT,mesT);
          // grafico1_mes(verT,mesT);},
          // });
          // $('#mesT').focus(function () { $('.ui-datepicker-calendar').css("display", "none");});
          $( "#mesT" ).change(function(){
          var verT= $('#verT option:selected').val();
          var mesT =$('#mesT').val();
          console.log(verT,mesT);
          grafico1_mes(verT,mesT);});
        break;
        case '3':
          $('#filt').html('<div class="row" style="margin-left: 1px; margin-right: 1px;"><input type="DATE" class="form-control" style="margin-right: 5px;margin-left: 10px;margin-top: 0px; width: 140px; height: 35px; padding: 6px 8px;">-<input type="DATE" class="form-control" style="margin-left: 5px;margin-top: 0px; width: 140px; height: 35px; padding: 6px 8px;"></div>');
        break; 
    }
  }).change();
</script>
<script>
  $('#verS').change(function(){
    var val= $('#verS option:selected').val();
    console.log(val);
    switch (val) {
        case '1':
          $('#fils').html('<input type="text" id="diaS" name="dia" value="<?php date_default_timezone_set('America/Lima'); echo date('Y-m-d'); ?>" class="form-control" style="margin-left: 10px;margin-top: 0px; width: 140px; height: 35px; padding: 6px 8px;">');
        break;
        case '2':
          $('#fils').html('<input type="MONTH" id="mesS" value="<?php date_default_timezone_set('America/Lima'); echo date('Y-m'); ?>"class="form-control" style="margin-left: 10px;margin-top: 0px; width: 180px; height: 35px; padding: 6px 8px;">');
          var verS= $('#verS option:selected').val();
          var mesS =$('#mesS').val();
          console.log(verS,mesS);
          grafico2_mes(verS,mesS);
          $( "#mesS" ).change(function(){
          var verS= $('#verS option:selected').val();
          var mesS =$('#mesS').val();
          console.log(verS,mesS);
          grafico2_mes(verS,mesS);});
        break;
        case '3':
          $('#fils').html('<div class="row" style="margin-left: 1px; margin-right: 1px;"><input type="DATE" class="form-control" style="margin-right: 5px;margin-left: 10px;margin-top: 0px; width: 140px; height: 35px; padding: 6px 8px;">-<input type="DATE" class="form-control" style="margin-left: 5px;margin-top: 0px; width: 140px; height: 35px; padding: 6px 8px;"></div>');
        break; 
    }
  }).change();
</script>
<script>
  function grafico1(verT,diaT){
    $.ajax({
        url: '../ajax/grafico1.php',
        type: 'POST',
        dataType: 'html',
        data: {verT: verT, diaT: diaT},
    })
    .done(function(respuesta){
        $("#grafico1").html(respuesta);
    })
    .fail(function(){
         console.log("error");
    })
  }
  function grafico1_mes(verT,mesT){
    $.ajax({
        url: '../ajax/grafico1.php',
        type: 'POST',
        dataType: 'html',
        data: {verT: verT, mesT: mesT},
    })
    .done(function(respuesta){
        $("#grafico1").html(respuesta);
    })
    .fail(function(){
         console.log("error");
    })
  }
  function grafico2(verS,diaS){
    $.ajax({
        url: '../ajax/grafico2.php',
        type: 'POST',
        dataType: 'html',
        data: {verS: verS, diaS: diaS},
    })
    .done(function(respuesta){
        $("#grafico2").html(respuesta);
    })
    .fail(function(){
         console.log("error");
    })
  }
  function grafico2_mes(verS,mesS){
    $.ajax({
        url: '../ajax/grafico2.php',
        type: 'POST',
        dataType: 'html',
        data: {verS: verS, mesS: mesS},
    })
    .done(function(respuesta){
        $("#grafico2").html(respuesta);
    })
    .fail(function(){
         console.log("error");
    })
  }
  $(document).ready( function () {

    var verT= $('#verT option:selected').val();
    var diaT =$('#diaT').val();
    var mesT =$('#mesT').val();
    console.log(verT,diaT,mesT);
    if (mesT==undefined) {
      grafico1(verT,diaT);
    }else{
      grafico1_mes(verT,mesT);
    }
    var verS= $('#verS option:selected').val();
    var diaS =$('#diaS').val();
    console.log(verS,diaS);
    grafico2(verS,diaS);
    $( "#diaT" ).datepicker({
    dateFormat: 'yy-mm-dd',
    onSelect: function() {
      var verT= $('#verT option:selected').val();
    var diaT =$('#diaT').val();
    console.log(verT,diaT);
    grafico1(verT,diaT);    }
    });
    $( "#diaS" ).datepicker({
    dateFormat: 'yy-mm-dd',
    onSelect: function() {
      var verS= $('#verS option:selected').val();
    var diaS =$('#diaS').val();
    console.log(verS,diaS);
    grafico2(verS,diaS);    }
    });
  } );
   
</script>