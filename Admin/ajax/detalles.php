<?php
 $mysqli=new mysqli("bigputucjf2kra8nu8kp-mysql.services.clever-cloud.com","uszd9o98c5dnkk9e","VSjhvIO58NTNWmCMl82h","bigputucjf2kra8nu8kp");
 //$mysqli=new mysqli("localhost","roots","","adminpress");
if ($mysqli->connect_errno) {
  die("error de conexión: " . $mysqli->connect_error);
}
$salida="";
    $q=$mysqli->real_escape_string($_POST['id']);
    $query="SELECT a.fecha_de_pago,a.monto_cobrado FROM cobrados a
    WHERE a.codigo='".$q."'";
     date_default_timezone_set("America/Lima");
    $resultado=$mysqli->query($query);
    if( $resultado->num_rows > 0){
        $salida.="<table id='detalles' class='table table-hover table-xs'style='background-color:#8f8f8f21;' width='100%'>
                        <thead>
                        <tr class='first' style='background-color:#001f3f;color:#ffffff;'>
                            <th class='th1 text-center'>Fecha de pago</th>
                            <th class='th1 text-center'>Monto cobrado</th>
                        </tr>
                    </thead>
                    <tbody class='text-center' align='center' >"; 
                    while($fila=$resultado->fetch_assoc()){
                      $separar = (explode(" ",$fila['fecha_de_pago']));
                      $fecha = $separar[0];
                      $hora = $separar[1];
                        $salida.="
                        <tr>
                            <td  style='font-size: 14px;padding: 0rem;'align='center'width='60%'>".$fecha."<br>".$hora."</td>
                            <td  style='font-size: 18px;padding: 0rem;'align='center'width='40%'>".$fila['monto_cobrado']."</td>
                        </tr>
                     ";
                    }
                     $salida.="</tbody>
                     <tfooter class='text-center' align='center' >
                     <tr class='first' style='background-color:#001f3f;color:#ffffff;'>
                         <th class='th1 text-center'>Por cobrar</th>
                         <th class='th1 text-center'>".$_POST['por_cobrar']."</th>
                     </tr>
                  </tfooter>
                  </table>";echo $salida;
    }else{
             $salida.="<table class='tabla_datos heading text-center' width='100%'>
                <thead>
                   <tr>
                   <th colspan='1'></th>
                   <th align='center'width='54%'colspan='1'><H1 style='  border-radius: 5px; background: linear-gradient(180deg, rgba(255, 149, 16) 0%, rgba(255, 149, 16) 100%);' class='letra'>NO SE REGISTRÓ NINGÚN PAGO</H1></th>
                   <th colspan='1'></th>
                   </tr>
               </thead>"; $salida.="</tbody></table><div class='form-group text-center'style='margin-top:1rem'> 
                 </div>";echo $salida;}
 
?>
<script>
    $(document).ready( function () {
    $('#detalles').DataTable({
      retrieve: true,
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
      "dom": 'lfrBtip', 
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": [ 
        {
          extend:    'excelHtml5',
          text:      '<i class="fa fa-file-excel"></i> Exportar ',
          titleAttr: 'Exportar a Excel',
          className: 'btn btn-success'
        },
       ]
    });
  } );
</script>
