<!-- </section>
		</div> -->
	</div>
 <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>

	<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/brands.js" integrity="sha384-sCI3dTBIJuqT6AwL++zH7qL8ZdKaHpxU43dDt9SyOzimtQ9eyRhkG3B7KMl6AO19" crossorigin="anonymous"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/fontawesome.js" integrity="sha384-7ox8Q2yzO/uWircfojVuCQOZl+ZZBg2D2J5nkpLqzH1HY0C1dHlTKIbpRz/LG23c" crossorigin="anonymous"></script>
<!-- jQuery -->
<script src="<?php echo $url_site; ?>plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo $url_site; ?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo $url_site; ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo $url_site; ?>plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo $url_site; ?>plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?php echo $url_site; ?>plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo $url_site; ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo $url_site; ?>plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo $url_site; ?>plugins/moment/moment.min.js"></script>
<script src="<?php echo $url_site; ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo $url_site; ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo $url_site; ?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo $url_site; ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo $url_site; ?>dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="dist/js/demo.js"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo $url_site; ?>dist/js/pages/dashboard.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo $url_site; ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo $url_site; ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo $url_site; ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo $url_site; ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo $url_site; ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo $url_site; ?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo $url_site; ?>plugins/jszip/jszip.min.js"></script>
<script src="<?php echo $url_site; ?>plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo $url_site; ?>plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo $url_site; ?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo $url_site; ?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo $url_site; ?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable({responsive: "true",
        dom: ''  });
} );</script>
<!-- <script type="text/javascript">
$(document).ready(function() {
    $('#example1').DataTable({responsive: "true",
        dom: ''  });
} );</script> -->
<script type="text/javascript">
            $(document).ready(function(){
              
        var current_fs, next_fs, previous_fs; //fieldsets
        var opacity;
        var current = 1;
        var steps = $("fieldset").length;

        setProgressBar(current);

        $(".next").click(function(){

        current_fs = $(this).parent();
        next_fs = $(this).parent().next();
        console.log(document);
        //Add Class Active
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

        //show the next fieldset
        next_fs.show();
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
        step: function(now) {
        // for making fielset appear animation
        opacity = 1 - now;

        current_fs.css({
        'display': 'none',
        'position': 'relative'
        });
        next_fs.css({'opacity': opacity});
        },
        duration: 500
        });
        setProgressBar(++current);
        });

        $(".previous").click(function(){

        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();

        //Remove class active
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

        //show the previous fieldset
        previous_fs.show();

        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
        step: function(now) {
        // for making fielset appear animation
        opacity = 1 - now;

        current_fs.css({
        'display': 'none',
        'position': 'relative'
        });
        previous_fs.css({'opacity': opacity});
        },
        duration: 500
        });
        setProgressBar(--current);
        });

        function setProgressBar(curStep){
        var percent = parseFloat(100 / steps) * curStep;
        percent = percent.toFixed();
        $(".progress-bar")
        .css("width",percent+"%")
        }

        $(".submit").click(function(){
        return false;
        })

        });
</script>
<script type="text/javascript">
$("#menu-toggle").click(function(e){
    e.preventDefault();$("#wrapper").toggleClass("toggled");
});
</script>    



<!-- AdminLTE App -->
<script src="<?php echo $url_site; ?>dist/js/adminlte.js"></script>
<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------
    <?php $list = clsUtilidad::Listar_fecha(Conexion::getInstancia()); ?>
    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
    var areaChartData = {
       //labels  : ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Setiembre', 'Octubre', 'Noviembre', 'Diciembre'],
      labels  : [<?php
                        foreach ($list as $item) { 
                          switch( $item['Mes']){
                            case 1:
                              echo "'Enero',";
                              break;
                            case 2:
                              echo "'Febrero',";
                              break;
                            case 3:
                              echo "'Marzo',";
                              break;
                            case 4:
                              echo "'Abril',";
                              break;
                            case 5:
                              echo "'Mayo',";
                              break;
                            case 6:
                              echo "'Junio',";
                              break;
                            case 7:
                              echo "'Julio',";
                              break;
                            case 8:
                              echo "'Agosto',";
                              break;
                            case 9:
                              echo "'Setiembre',";
                              break;  
                            case 10:
                              echo "'Octubre',";
                              break;
                            case 11:
                              echo "'Noviembre',";
                              break;
                            case 12:
                              echo "'Diciembre',";
                              break;   
                          }    }
                  ?>
                  ],
      datasets: [
        {
          label               : 'Utilidades',
          backgroundColor     : 'rgba(60,141,188,0.4)',
          borderColor         : 'rgba(60,141,188,0.4)',
          pointRadius          : true,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?php
                        foreach ($list as $item) { echo $item['utilidades'].","; } ?>]
        },
        {
          label               : 'Prestamos emitidos',
          backgroundColor     : 'rgba(210, 214, 222, 0.4)',
          borderColor         : 'rgba(210, 214, 222, 0.4)',
          pointRadius         : true,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [<?php
                        foreach ($list as $item) { echo $item['total_prestado'].","; } ?>]
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
      type: 'line',
      data: areaChartData,
      options: areaChartOptions
    })

    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
    var lineChartOptions = $.extend(true, {}, areaChartOptions)
    var lineChartData = $.extend(true, {}, areaChartData)
    lineChartData.datasets[0].fill = false;
    lineChartData.datasets[1].fill = false;
    lineChartOptions.datasetFill = false

    var lineChart = new Chart(lineChartCanvas, {
      type: 'line',
      data: lineChartData,
      options: lineChartOptions
    })

    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Chrome',
          'IE',
          'FireFox',
          'Safari',
          'Opera',
          'Navigator',
      ],
      datasets: [
        {
          data: [700,500,400,600,300,100],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = donutData;
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions
    })

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })

    //---------------------
    //- STACKED BAR CHART -
    //---------------------
    var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
    var stackedBarChartData = $.extend(true, {}, barChartData)

    var stackedBarChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      }
    }

    new Chart(stackedBarChartCanvas, {
      type: 'bar',
      data: stackedBarChartData,
      options: stackedBarChartOptions
    })
  })
</script>

<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo $url_site; ?>plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo $url_site; ?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo $url_site; ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo $url_site; ?>plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo $url_site; ?>plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?php echo $url_site; ?>plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo $url_site; ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo $url_site; ?>plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo $url_site; ?>plugins/moment/moment.min.js"></script>
<script src="<?php echo $url_site; ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo $url_site; ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo $url_site; ?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo $url_site; ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo $url_site; ?>dist/js/adminlte.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo $url_site; ?>dist/js/pages/dashboard.js"></script>




<!-- DataTables  & Plugins -->
<script src="<?php echo $url_site; ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo $url_site; ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo $url_site; ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo $url_site; ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo $url_site; ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo $url_site; ?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo $url_site; ?>plugins/jszip/jszip.min.js"></script>
<script src="<?php echo $url_site; ?>plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo $url_site; ?>plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo $url_site; ?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo $url_site; ?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo $url_site; ?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="<?php echo $url_site; ?>plugins/datatables-searchbuilder/js/dataTables.searchBuilder.js"></script>
<script src="<?php echo $url_site; ?>plugins/DateTime-1.1.1/js/dataTables.dateTime.min.js"></script>

<!-- historial -->
<script src="<?php echo $url_site; ?>dist/js/main1.js"></script>
<!-- tabla clientes -->
<script type="text/javascript">
  $(function () {
    $("#example1").DataTable({
      language: {
        "lengthMenu": "Mostrar _MENU_ registros",
                  "zeroRecords": "No se encontraron resultados",
                  "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                  "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                  "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                  "sSearch": "Buscar:",
                  "oPaginate": {
                      "sFirst": "Primero",
                      "sLast":"Último",
                      "sNext":"Siguiente",
                      "sPrevious": "Anterior"
            },
            "sProcessing":"Procesando...",
              },    
      "dom": 'lfBrtip', 
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": [ 
        {
          extend:    'excelHtml5',
          text:      '<i class="fa fa-file-excel"></i> ',
          titleAttr: 'Exportar a Excel',
          className: 'btn btn-success'
        },
        {
          extend:    'pdfHtml5',
          text:      '<i class="fa fa-file-pdf"></i> ',
          titleAttr: 'Exportar a PDF',
          className: 'btn btn-danger'
        },
        {
          extend:    'colvis',
          text:      'Visualizar Columnas',
          titleAttr: 'Visualizar Columnas',
          className: 'btn btn-info'
        },]
    }).buttons().container().appendTo('#examples_wrapper .col-md-6:eq(0)');
    $('#tabla_id').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "dom": 'lfBrtip',
      language: {
        "lengthMenu": "Mostrar _MENU_ registros",
                  "zeroRecords": "No se encontraron resultados",
                  "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                  "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                  "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                  "sSearch": "Buscar:",
                  "oPaginate": {
                      "sFirst": "Primero",
                      "sLast":"Último",
                      "sNext":"Siguiente",
                      "sPrevious": "Anterior"
            },
            "sProcessing":"Procesando...",
              },  
      "buttons": [
            // {
            //     extend: 'searchBuilder',
            //     config: {
            //         depthLimit: 1,
            //     }
            // },
            {
          extend:    'excelHtml5',
          text:      '<i class="fa fa-file-excel"></i> ',
          titleAttr: 'Exportar a Excel',
          className: 'btn btn-success'
        },
        {
          extend:    'pdfHtml5',
          text:      '<i class="fa fa-file-pdf"></i> ',
          titleAttr: 'Exportar a PDF',
          className: 'btn btn-danger'
        },
        {
          extend:    'colvis',
          text:      'Visualizar Columnas',
          titleAttr: 'Visualizar Columnas',
          className: 'btn btn-info'
        }
        ],
    });
    $('#tabla_idd').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "dom": 'lfBrtip',
      language: {
        "lengthMenu": "Mostrar _MENU_ registros",
                  "zeroRecords": "No se encontraron resultados",
                  "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                  "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                  "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                  "sSearch": "Buscar:",
                  "oPaginate": {
                      "sFirst": "Primero",
                      "sLast":"Último",
                      "sNext":"Siguiente",
                      "sPrevious": "Anterior"
            },
            "sProcessing":"Procesando...",
              },  
              "buttons": [ {
          extend:    'excelHtml5',
          text:      '<i class="fa fa-file-excel"></i> ',
          titleAttr: 'Exportar a Excel',
          className: 'btn btn-success'
        },
        {
          extend:    'pdfHtml5',
          text:      '<i class="fa fa-file-pdf"></i> ',
          titleAttr: 'Exportar a PDF',
          className: 'btn btn-danger'
        },
        {
          extend:    'colvis',
          text:      'Visualizar Columnas',
          titleAttr: 'Visualizar Columnas',
          className: 'btn btn-info'
        },]
    });
    $('#utilidad').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "dom": 'lfBrtip',
      language: {
        "lengthMenu": "Mostrar _MENU_ registros",
                  "zeroRecords": "No se encontraron resultados",
                  "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                  "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                  "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                  "sSearch": "Buscar:",
                  "oPaginate": {
                      "sFirst": "Primero",
                      "sLast":"Último",
                      "sNext":"Siguiente",
                      "sPrevious": "Anterior"
            },
            "sProcessing":"Procesando...",
              },  
              "buttons": [ {
          extend:    'excelHtml5',
          text:      '<i class="fa fa-file-excel"></i> ',
          titleAttr: 'Exportar a Excel',
          className: 'btn btn-success'
        },
        {
          extend:    'pdfHtml5',
          text:      '<i class="fa fa-file-pdf"></i> ',
          titleAttr: 'Exportar a PDF',
          className: 'btn btn-danger'
        },
        {
          extend:    'colvis',
          text:      'Visualizar Columnas',
          titleAttr: 'Visualizar Columnas',
          className: 'btn btn-info'
        },]
    });
    $('.dataTables_length').addClass('bs-select');
  });
  
</script>
<!-- validar   -->
<script src="<?php echo $url_site; ?>dist/js/main2.js"></script>
</body>
</html>