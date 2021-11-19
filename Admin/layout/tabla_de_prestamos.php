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
            <th class='text-center'> #  </th>
                <th class='text-center'style='width:104;'>Vencimientos</th>
                <th class='text-center'> A cobrar  </th>
            </tr>
        </thead>
        <tbody method='POST'>";
             for ($i = 0 ; $i < $cuotas ; ++$i ) { 
                 $N = $i +1;
                 $salida.="
            <tr> 
            <td class='text-center' style='width:50%;padding: 10px 1% 10px; background:#fff;'>".$N." </td>
                <td class='text-center' contenteditable='true'style='padding:0px;width:50$; background:#fff;'> 
                    <input name='fecha_cobro_".$i."' id='fecha_cobro_".$i."' style='margin-butom:0px; background:#fff; border: 0px solid rgba(0, 0, 0, 0.5);'value='".date('Y-m-d', strtotime($fecha."+ $i $f"))."' type='date'style='background:#ffffff;'/></td>
                <td class='text-center' contenteditable='false'style='border-color:#dee2e6; background:#eceff1; padding:0px;width:50%; '>
                    S/ ".$cobrar." 
                     <input hidden name='monto_cobro_".$i."' id='monto_cobro_".$i."' class='text-center' 
                     style='margin-butom:0px;'value='".$cobrar."' type='number'style='background:#ffffff;'/></td>
            </tr>";
             } $salida.="
        </tbody>
</table> </div>"; 
echo $salida; 
?>

