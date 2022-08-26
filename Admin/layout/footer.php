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
<!-- flatpickr -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
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
<script>
  $( function() {
    $( "#fecha_des" ).datepicker({
      dateFormat: "dd-mm-yy ",
      beforeShowDay: function(date) {
        var day = date.getDay();
        return [(day != 0), ''];
    },
    });
  } );
  </script>
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
<script src="<?php echo $url_site; ?>dist/js/historial.js"></script>
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