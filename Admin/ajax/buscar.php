<?php
 $mysqli=new mysqli("bigputucjf2kra8nu8kp-mysql.services.clever-cloud.com","uszd9o98c5dnkk9e","VSjhvIO58NTNWmCMl82h","bigputucjf2kra8nu8kp");
 //$mysqli=new mysqli("localhost","roots","","adminpress");
if ($mysqli->connect_errno) {
  die("error de conexión: " . $mysqli->connect_error);
}
$salida="";
if(isset($_POST['consulta'])){
    $q=$mysqli->real_escape_string($_POST['consulta']);
    $query="SELECT a.mora, a.tasa, a.monto, a.fecha, a.id_prestamo, CONCAT ( b.nombre,' ',b.apellido ) 
    as client, sum(c.monto_cobrado) as monto_cobrado_total from prestamos a INNER JOIN clientes b ON a.cliente = b.id_cliente 
    LEFT JOIN cobrados c on a.id_prestamo = c.codigo
    WHERE CONCAT ( b.nombre,' ',b.apellido ) LIKE '%".$q."%' GROUP BY a.id_prestamo";
     date_default_timezone_set("America/Lima");
    $resultado=$mysqli->query($query);
    if( $resultado->num_rows > 0){
        $salida.="<table class='table table-hover table-xs'style='background-color:#8f8f8f21;' width='100%'>
                     <thead>
                        <tr class='first' style='background-color:#001f3f;color:#ffffff;'>
                            <th class='th1 text-center'>Cliente</th>
                            <th class='th1 text-center'>Código de Prestamo</th>
                            <th class='th1 text-center'>Fecha de desembolso</th>
                            <th class='th1 text-center'>Mora por día de retraso</th>
                            <th class='th1 text-center'>Monto prestado</th> 
                            <th class='th1 text-center'>Por cobrar</th> 
                            <th class='th1 text-center'></th>   
                        </tr>
                    </thead>
                    <tbody class='text-center' align='center' >"; 
                    while($fila=$resultado->fetch_assoc()){
                        $salida.="
                        <tr>
                            <td align='center'width='17%'>".$fila['client']."</td>
                            <td align='center'width='15%'>B001-".$fila['id_prestamo']."</td>
                            <td align='center'width='15%'>".$fila['fecha']."</td>
                            <td align='center'width='15%'>S/ ".$fila['mora']."</td>
                            <td align='center'width='15%'>S/ ".$fila['monto']."</td>
                            <td align='center'width='15%'>S/ "; $por_cobrar =$fila['monto']*(1+$fila['tasa']/100)-$fila['monto_cobrado_total'] ;$salida.="$por_cobrar</td>
                            <td align='center'width='8%'><button class='btn btn-secondary btn-sm btn-circle margin' style='color: #fff;
                            background-color: #6c757d;border-color: #6c757d; padding: 0.175rem 0.25rem;
                            box-shadow: none;
                            font-size: .875rem;
                            line-height: 1.5;cursor: pointer;
                            border-radius: 0.2rem;'
                            onclick='vermas(".$fila['id_prestamo'].",".$por_cobrar." );'
                            id='botn_".$fila['id_prestamo']."' data-id='".$fila['id_prestamo']."' type='button'>Ver más
                            <span class='fa fa-plus'></button></td>
                        </tr>
                     ";
                    }
                     $salida.="</tbody></table>";
    }else{
    
                $salida.="<table class='tabla_datos heading text-center' width='100%'>
                <thead>
                   <tr>
                   <th colspan='1'></th>
                   <th align='center'width='34%'colspan='1'><H1 style='  border-radius: 5px; background: linear-gradient(180deg, rgba(255, 149, 16) 0%, rgba(255, 149, 16) 100%);' class='letra'>PRESTAMO DEL CLIENTE NO REGISTRADO</H1></th>
                   <th colspan='1'></th>
                   </tr>
               </thead>"; $salida.="</tbody></table><div class='form-group text-center'style='margin-top:1rem'> 
                 </div>";}?>
                  <?php

    
}
else {
  date_default_timezone_set("America/Lima");
  $fecha = date("Y-m-d");
  $query="SELECT a.mora, a.tasa, a.monto, a.fecha, a.id_prestamo, CONCAT ( b.nombre,' ',COALESCE(b.apellido,'') ) 
  as client, sum(c.monto_cobrado) as monto_cobrado_total from prestamos a 
  INNER JOIN clientes b ON a.cliente = b.id_cliente
  LEFT JOIN cobrados c on a.id_prestamo = c.codigo
  WHERE fecha <= '".$fecha."'
  GROUP BY a.id_prestamo
  ORDER BY fecha DESC LIMIT 10";
  $resultado=$mysqli->query($query);
  if( $resultado->num_rows > 0){
      $salida.="<table class='table table-hover table-xs'style='background-color:#8f8f8f21;' width='100%'>
                   <thead>
                      <tr class='first' style='background-color:#001f3f;color:#ffffff;'>
                          <th class='th1 text-center'>Cliente</th>
                          <th class='th1 text-center'>Código de Prestamo</th>
                          <th class='th1 text-center'>Fecha de desembolso</th>
                          <th class='th1 text-center'>Mora por día de retraso</th>
                          <th class='th1 text-center'>Monto prestado</th>
                          <th class='th1 text-center'>Por cobrar</th> 
                          <th class='th1 text-center'></th>   
                      </tr>
                  </thead>
                  <tbody class='text-center' align='center' >"; 
                  while($fila=$resultado->fetch_assoc()){
                      $salida.="
                      <tr>
                          <td align='center'width='17%'>".$fila['client']."</td>
                          <td align='center'width='15%'>B001-".$fila['id_prestamo']."</td>
                          <td align='center'width='15%'>".$fila['fecha']."</td>
                          <td align='center'width='15%'>S/ ".$fila['mora']."</td>
                          <td align='center'width='15%'>S/ ".$fila['monto']."</td>
                          <td align='center'width='15%'>S/ "; $por_cobrar =$fila['monto']*(1+$fila['tasa']/100)-$fila['monto_cobrado_total'] ;$salida.="$por_cobrar</td>
                          <td align='center'width='8%'><button class='btn btn-secondary btn-sm btn-circle margin' style='color: #fff;
                          background-color: #6c757d;border-color: #6c757d; padding: 0.175rem 0.25rem;
                          box-shadow: none;
                          font-size: .875rem;
                          line-height: 1.5;cursor: pointer;
                          border-radius: 0.2rem;'
                          onclick='vermas(".$fila['id_prestamo'].",".$por_cobrar." );'
                          id='botn_".$fila['id_prestamo']."' data-id='".$fila['id_prestamo']."' type='button'>Ver más
                          <span class='fa fa-plus'></button></td>
                      </tr>
                   ";
                  }
                   $salida.="</tbody></table>";
  }else{
    $salida.="<table class='tabla_datos heading text-center' width='100%'>
    <thead>
       <tr>
       <th colspan='1'></th>
       <th align='center'width='34%'colspan='1'><H1 style='  border-radius: 5px; background: linear-gradient(180deg, rgba(255, 149, 16) 0%, rgba(255, 149, 16) 100%);' class='letra'>PRESTAMO DEL CLIENTE NO REGISTRADO</H1></th>
       <th colspan='1'></th>
       </tr>
   </thead>"; $salida.="</tbody></table><div class='form-group text-center'style='margin-top:1rem'> 
     </div>"; 
  }
    // echo $salida="
    //  <table class='table table-hover table-xs' style='background-color:#8f8f8f21;'
    //   width='100%'><thead><tr class='first' style='background-color:#001f3f;color:#ffffff;'>
    //   <th class='th1 text-center'>Cliente</th><th class='th1 text-center'>Código de Prestamo</th>
    //   <th class='th1 text-center'>Fecha de desembolso</th><th class='th1 text-center'>Monto prestado</th> 
    //    </tr></thead><tbody class='text-center' align='center'><tr><td align='center' width='20%'>MERA SEDANO, ERIKA MILAGROS</td>
    //    <td align='center' width='20%'>B001-0003</td><td align='center' width='20%'>2021-10-29</td><td align='center' width='20%'>
    //    S/ 1000</td> </tr> <tr><td align='center' width='20%'>MERA RIOS, ERIKA MILAGROS</td><td align='center' width='20%'>
    //    B001-0004</td><td align='center' width='20%'>2021-10-28</td><td align='center' width='20%'>S/ 40000</td></tr></tbody>
    //    </table>
    // ";
}

$salida.="<div class='modal fade' id='Vermas' data-backdrop='static' data-keyboard='false' tabindex='-1' aria-labelledby='Vermas' aria-hidden='true' >
<div class='modal-dialog modal-dialog-centered'>
 <div class='modal-content' style='width: auto;'>
   <div class='modal-header'style='background:#001f3f;color:#fff'>
     <h5 class='modal-title' id='staticBackdropLabel'><b>Pagos realizados</b></h5>
     <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
       <span aria-hidden='true'style='color:#fff'>&times;</span>
     </button>
   </div>
   <div class='modal-body' style='width: 500px;'>
   <div id='pagos'>
   <table id='detalles' class='table table-hover table-xs'style='background-color:#8f8f8f21;' width='100%'>
   <thead>
   <tr class='first' style='background-color:#001f3f;color:#ffffff;'>
       <th class='th1 text-center'>Fecha de pago</th>
       <th class='th1 text-center'>Monto cobrado</th>
   </tr>
</thead>
<tbody class='text-center' align='center' >
  <tr>
    <td align='center'width='60%'></td>
    <td align='center'width='40%'></td>
  </tr>
</tbody>
<tfooter class='text-center' align='center' >
   <tr class='first' style='background-color:#001f3f;color:#ffffff;'>
       <th class='th1 text-center'></th>
       <th class='th1 text-center'>Por cobrar</th>
   </tr>
</tfooter>
</table>
</div>
   </div>
   <div class='modal-footer'>
   <button type='button' class='btn btn-info' onclick='cerrar();'>cerrar</button>
   </div>
 </div>
</div>
</div>
";echo $salida;
?>
<script>
    $(document).ready( function () {
    $('#detalles').DataTable({
      retrieve: true,});
  } );
    function vermas(id,por_cobrar) {
        $('#Vermas').appendTo('body').modal('show');
        console.log($('#botn_' + id).data('id'));
        $.ajax({
        url: '../ajax/detalles.php',
        type: 'POST',
        dataType: 'html',
        data: {id: id,
          por_cobrar: por_cobrar},
    })
    .done(function(respuesta){
        $("#pagos").html(respuesta);
    })
    .fail(function(){
         console.log("error");
    })
    }function cerrar() {
      $('#Vermas').appendTo('body').modal('hide');
    }
    
</script>
<script type="text/javascript"> 
function miFunc() {
      $.ajax({
        type: 'POST',
        url: '../ajax/registrar_vehiculo.php',
        data: $('#register').serialize(),
        success: function(response) {
          var jsonData = JSON.parse(response);
          console.log(jsonData.success);
          $('#RegisterModal').modal('hide');
          if(jsonData.success == "2"){
            $('#MessageCrud').html('<div class="alert bg-success" role="alert"><em class="fa fa-check-circle mr-2"></em>Se registró correctamente el vehiculo ingresado. Por favor de comprobar el registro.<a href="#" class="float-right"><em class="fa fa-remove"></em></a></div>');
          }
      
        }
      });
    }
   
</script>