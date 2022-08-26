<?php 

$salida="";
$cuotas = $_POST['cuotas'];
$tasa = $_POST['tasa'];
$monto = $_POST['monto'];
$tipo = $_POST['tipo'];
$fecha = $_POST['fecha_des'];
$param =1 + ( $tasa / 100) ;
$monto_cobrado = $monto * $param ;
if( $cuotas == 0){
$cobrar = $monto_cobrado / 10 ;}
else{
    $cobrar = round($monto_cobrado / $cuotas, 2 );
    $cobrar = ceil($cobrar);
} 
if($tipo==1){
    $f="days";
}if($tipo==2){
    $f="week";
}if($tipo==3){
    $f="month";
}
?><?php $salida.="
<div id='porcobrar'>
<input type='hidden' name='option' value='C'>
<input type='hidden' name='cuotas' value='".$cuotas."'>
<table id='example' class='cell-border compact stripe' style='width:80%'border='1'>
        <thead style='background:#001f3f;color:#fff;'>
            <tr>
            <th class='text-center'> Cuota  </th>
                <th class='text-center'style='width:104;'>Vencimiento</th>
                <th class='text-center'> A cobrar  </th>
            </tr>
        </thead>
        <tbody method='POST'>";
        $N = 0;
             for ($i = 0 ; $i < $cuotas ; ++$i ) { 
                 $N = $N +1;
                 $feriados= array('2022-01-01','2022-04-14','2022-04-15','2022-04-17','2022-05-01','2022-06-29','2022-07-28','2022-07-29','2022-08-06',
                 '2022-08-30','2022-10-08','2022-11-01','2022-12-08','2022-12-09','2022-12-25','2023-01-01','2023-04-14','2023-04-15','2023-04-17','2023-05-01','2023-06-29','2023-07-28','2023-07-29','2023-08-06',
                 '2023-08-30','2023-10-08','2023-11-01','2023-12-08','2023-12-09','2023-12-25','2024-01-01','2024-04-14','2024-04-15','2024-04-17','2024-05-01','2024-06-29','2024-07-28','2024-07-29','2024-08-06',
                 '2024-08-30','2024-10-08','2024-11-01','2024-12-08','2024-12-09','2024-12-25','2025-01-01','2025-04-14','2025-04-15','2025-04-17','2025-05-01','2025-06-29','2025-07-28','2025-07-29','2025-08-06',
                 '2025-08-30','2025-10-08','2025-11-01','2025-12-08','2025-12-09','2025-12-25','2026-01-01','2026-04-14','2026-04-15','2026-04-17','2026-05-01','2026-06-29','2026-07-28','2026-07-29','2026-08-06',
                 '2026-08-30','2026-10-08','2026-11-01','2026-12-08','2026-12-09','2026-12-25');
                 $D = date('Y-m-d', strtotime($fecha."+ $N $f"));
                 if(date('l', strtotime($D)) == 'Sunday' ){
                    $D = date('Y-m-d', strtotime($D."+ 1 days"));
                    if (in_array($D, $feriados)) {
                        $D = date('Y-m-d', strtotime($D."+ 1 days"));
                        $N = $N +1;
                    }
                    $N = $N +1;
                 }
                 if (in_array($D, $feriados)) {
                    $D = date('Y-m-d', strtotime($D."+ 1 days"));
                    if(date('l', strtotime($D)) == 'Sunday' ){
                        $D = date('Y-m-d', strtotime($D."+ 1 days"));
                        $N = $N +1;
                     }
                     $N = $N +1;
                };
                
                 $salida.="
            <tr> 
            <td class='text-center' style='width:20%;padding: 10px 1% 10px; background:#fff;'>".$N." </td>
                <td class='text-center' contenteditable='true'style='padding:0px;width:40%; background:#fff;'> 
                    <input name='fecha_cobro_".$i."' id='fecha_cobro_".$i."' style='text-align: center; margin-butom:0px; background:#fff; border: 0px solid rgba(0, 0, 0, 0.5);'value='".$D."' type='text'style='background:#ffffff;'/></td>
                <td class='text-center' contenteditable='false'style='border-color:#dee2e6; background:#eceff1; padding:0px; width:40% ; '>
                    S/ ".$cobrar." 
                     <input hidden name='monto_cobro_".$i."' id='monto_cobro_".$i."' class='text-center' 
                     style='margin-butom:0px;'value='".$cobrar."' type='number'style='background:#ffffff;'/></td>
            </tr>";
             } $salida.="
        </tbody>
</table> </div>";
for ($i = 0 ; $i < $cuotas ; ++$i ) { 
    $salida.="   
<script>
  $( function() {
    $( '#fecha_cobro_".$i."' ).datepicker({
        dateFormat: 'dd-mm-yy',
        showOn: 'button',
      buttonImage: 'https://jqueryui.com/resources/demos/datepicker/images/calendar.gif',
      buttonImageOnly: true,
      buttonText: 'Select date',
      datesDisabled: ['1/1/2022','14/4/2022','15/4/2022','17/4/2022','1/5/2022','29/6/2022','28/7/2022','29/7/2022','6/8/2022',
      '30/8/2022','8/10/2022','1/11/2022','8/12/2022','9/12/2022','25/12/2022'],
      beforeShowDay: function(date) {
        var QuitarFechas = ['1/1/2022','14/4/2022','15/4/2022','17/4/2022','1/5/2022','29/6/2022','28/7/2022','29/7/2022','6/8/2022',
        '30/8/2022','8/10/2022','1/11/2022','8/12/2022','9/12/2022','25/12/2022'];
        hoy = date.getDate() + '/' + (date.getMonth()+1) + '/' + date.getFullYear();
        var day = date.getDay();
        if ($.inArray(hoy, QuitarFechas) < 0) { } 
        else {return [false,'','Fecha deshabilitada'];}
        return [(day != 0), ''];
    },
      });
  } );
  </script>";
} 
echo $salida; 
?>

