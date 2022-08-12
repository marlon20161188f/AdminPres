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
             for ($i = 0 ; $i < $cuotas ; ++$i ) { 
                 $N = $i +1;
                 $feriados= array('1/1/2022','14/4/2022','15/4/2022','17/4/2022','1/5/2022','29/6/2022','28/7/2022','29/7/2022','06-08-2022',
                 '30/8/2022','8/10/2022','1/11/2022','8/12/2022','9/12/2022','25/12/2022');
                 $D = date('d-m-Y', strtotime($fecha."+ $N $f"));
                 if(date('l', strtotime($D)) == 'Sunday' ){
                    $D = date('d-m-Y', strtotime($D."+ 1 days"));
                 }
                 if (in_array($D, $feriados)) {
                    $D = date('d-m-Y', strtotime($D."+ 1 days"));
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

