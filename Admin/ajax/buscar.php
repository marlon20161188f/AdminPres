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
                            <td align='center'width='8%'><button id='btn_".$fila['id_prestamo']." class='btn btn-secondary btn-sm btn-circle margin' type='button'>Ver mas</button></td>
                        </tr>
                     ";
                    }
                     $salida.="</tbody></table>";echo $salida;
    }else{
    
                $salida.="<table class='tabla_datos heading text-center' width='100%'>
                <thead>
                   <tr>
                   <th colspan='1'></th>
                   <th align='center'width='34%'colspan='1'><H1 style='  border-radius: 5px; background: linear-gradient(180deg, rgba(255, 149, 16) 0%, rgba(255, 149, 16) 100%);' class='letra'>PRESTAMO DEL CLIENTE NO REGISTRADO</H1></th>
                   <th colspan='1'></th>
                   </tr>
               </thead>"; $salida.="</tbody></table><div class='form-group text-center'style='margin-top:1rem'> 
                 </div>";echo $salida;}?>
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
                          <td align='center'width='8%'><button style='color: #fff;
                          background-color: #6c757d;border-color: #6c757d; padding: 0.175rem 0.25rem;
                          box-shadow: none;
                          font-size: .875rem;
                          line-height: 1.5;cursor: pointer;
                          border-radius: 0.2rem;' id='btn_".$fila['id_prestamo']."  type='button'>Ver más</button></td>
                      </tr>
                   ";
                  }
                   $salida.="</tbody></table>";echo $salida;
  }else{
    $salida.="<table class='tabla_datos heading text-center' width='100%'>
    <thead>
       <tr>
       <th colspan='1'></th>
       <th align='center'width='34%'colspan='1'><H1 style='  border-radius: 5px; background: linear-gradient(180deg, rgba(255, 149, 16) 0%, rgba(255, 149, 16) 100%);' class='letra'>PRESTAMO DEL CLIENTE NO REGISTRADO</H1></th>
       <th colspan='1'></th>
       </tr>
   </thead>"; $salida.="</tbody></table><div class='form-group text-center'style='margin-top:1rem'> 
     </div>";echo $salida; ?>
      <?php
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

?>

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