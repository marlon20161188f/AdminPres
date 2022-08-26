<?php
    session_start();
    header('Content-Type: text/html; charset=UTF-8');
    define('CONTROLADOR', TRUE);
    require '../config/database.php';
    require '../clases/clsUtilidad.php';
$salida="";
$salida.="<div class='chart'><div class='chartjs-size-monitor'><div class='chartjs-size-monitor-expand'><div class=''></div></div><div class='chartjs-size-monitor-shrink'><div class=''></div></div></div>
<canvas id='barChart1' style='min-height: 362px; height: 396px; max-height: 362px; max-width: 100%; display: block; width: 604px;' width='604' height='250' class='chartjs-render-monitor'></canvas>
</div>";
echo $salida;
?>
<script>
  
  $(function () {
    <?php 
    $ver_T=$_POST['verT'];
    if ($ver_T==1) {
        $fil_data=$_POST['diaT'];
    }
    if ($ver_T==2) {
        $fil_data=$_POST['mesT'];
    }
    $list_graf1 = clsUtilidad::Listar_ver(Conexion::getInstancia(),$fil_data, $ver_T); ?>
    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#barChart1').get(0).getContext('2d')
    var areaChartData = {
       //labels  : ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Setiembre', 'Octubre', 'Noviembre', 'Diciembre'],
      labels  : ['<?php
                          echo $fil_data;
                  ?>'
                  ],
      datasets: [
        {
          label               : 'Total Cobrado',
          backgroundColor     : 'rgba(60,141,188,0.4)',
          borderColor         : 'rgba(60,141,188,0.4)',
          pointRadius          : true,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?php
                        foreach ($list_graf1 as $item_graf1) {
                            if ($item_graf1['monto_cobrado']==null) {
                              $item_graf1['monto_cobrado']=0;
                            }
                            echo $item_graf1['monto_cobrado'].","; } ?>]
        },
        {
          label               : 'Total Desembolsado',
          backgroundColor     : 'rgba(210, 214, 222, 0.4)',
          borderColor         : 'rgba(210, 214, 222, 0.4)',
          pointRadius         : true,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [<?php
                        
                          foreach ($list_graf1 as $item_graf1) { 
                            if ($item_graf1['monto']==null) {
                                $item_graf1['monto']=0;
                              }
                            echo $item_graf1['monto'].","; } ?>]
        },
      ]
    }

    var areaChartOptions = {
    "animation": {
      "duration": 1000,
      "onComplete": function() {
        var chartInstance = this.chart,
          ctx = chartInstance.ctx;

        ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
        ctx.textAlign = 'center';
        ctx.textBaseline = 'bottom';

        this.data.datasets.forEach(function(dataset, i) {
          var meta = chartInstance.controller.getDatasetMeta(i);
          meta.data.forEach(function(bar, index) {
            var data = dataset.data[index];
            // ctx.fillText(data, bar._model.x, bar._model.y - 5);
          });
        });
      }
    },
      maintainAspectRatio : false,
      datasetFill : true,
      responsive : true,
      legend: {
        display: true
      },
      tooltips: {
      "enabled": true
    },
      scales: {
        xAxes: [{
          gridLines : {
            display : true,
          }
        }],
        yAxes: [{
          gridLines : {
            display : true,
          }
        }]
      }
    }

    // This will get the first returned node in the jQuery collection.
    new Chart(areaChartCanvas, {
      type: 'bar',
      data: areaChartData,
      options: areaChartOptions
    })
   

  })
</script>