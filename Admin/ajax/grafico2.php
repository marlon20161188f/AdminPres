<?php
    session_start();
    header('Content-Type: text/html; charset=UTF-8');
    define('CONTROLADOR', TRUE);
    require '../config/database.php';
    require '../clases/clsUtilidad.php';
$salida="";
$salida.="<div class='chart'><div class='chartjs-size-monitor'><div class='chartjs-size-monitor-expand'><div class=''></div></div><div class='chartjs-size-monitor-shrink'><div class=''></div></div></div>
<canvas id='barChart2' style='min-height: 362px; height: 396px; max-height: 362px; max-width: 100%; display: block; width: 604px;' width='604' height='250' class='chartjs-render-monitor'></canvas>
</div>";
echo $salida;
?>
<script>
  
  $(function () {
    <?php 
     $ver_S=$_POST['verS'];
     if ($ver_S==1) {
         $fil_data=$_POST['diaS'];
     }
     if ($ver_S==2) {
         $fil_data=$_POST['mesS'];
     }
    $list_graf2 = clsUtilidad::Listar_ver(Conexion::getInstancia(),$fil_data, $ver_S); ?>
    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#barChart2').get(0).getContext('2d')
    var areaChartData = {
       //labels  : ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Setiembre', 'Octubre', 'Noviembre', 'Diciembre'],
      labels  : ['<?php
                          echo $fil_data;
                  ?>'
                  ],
      datasets: [
        {
          label               : 'Saldo',
          backgroundColor     : 'rgba(60,141,188,0.4)',
          borderColor         : 'rgba(60,141,188,0.4)',
          pointRadius          : true,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?php
                        foreach ($list_graf2 as $item_graf2) {
                            if ($item_graf2['monto_cobrado']==null) {
                              $item_graf2['monto_cobrado']=0;
                            }
                            if ($item_graf2['monto']==null) {
                              $item_graf2['monto']=0;
                            }
                            $saldo=$item_graf2['monto_cobrado']-$item_graf2['monto'];
                            echo $saldo.","; } ?>]
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