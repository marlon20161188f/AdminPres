<?php 
session_start();
header('Content-Type: text/html; charset=UTF-8');
define('CONTROLADOR', TRUE);
require '../config/database.php';

$q=$_POST['dniruc'];
    $conexion=Conexion::getInstancia();
    $dniuruc=strlen($q);
    if( $dniuruc == 8 ){
        $query=$conexion->prepare("SELECT clientes.id_cliente, clientes.nombre, clientes.apellido, clientes.dni, clientes.ruc, clientes.direccion, clientes.distrito, clientes.provincia,
        clientes.departamento, clientes.celular, clientes.telefono FROM clientes
        WHERE dni LIKE '%".$q."%' "); }
    if( $dniuruc == 11 ){
        $query=$conexion->prepare("SELECT clientes.id_cliente, clientes.nombre, clientes.apellido, clientes.dni, clientes.ruc, clientes.direccion, clientes.distrito, clientes.provincia,
        clientes.departamento, clientes.celular, clientes.telefono FROM clientes
        WHERE ruc LIKE '%".$q."%' "); }
$resultado=$query->execute();
$dniruc = $_POST['dniruc'];
$tipo = $_POST['tipo'];
$cuotas = $_POST['cuotas'];
$monto_cobro = $_POST['monto_cobro_1'];
$tasa = $_POST['tasa'];
$moras = $_POST['moras'];
$fecha_des = $_POST['fecha_des'];
$monto = $_POST['monto'];
if($tipo==1){
    $f="Diario";
}if($tipo==2){
    $f="Semanal";
}if($tipo==3){
    $f="Mensual";
}
$salid="";
while($fila = $query->fetch(PDO::FETCH_ASSOC)){
$salid.="<table id='examples' class='cell-border' style='width:100%'>
        <tbody>
             <tr>
                <th>Nombre </th>
                <th>: </th>
                <th style='width:1rem;'></th>
                <td> ".$fila['nombre']." ".$fila['apellido']."</td>
            </tr>
            <tr>
                <th>DNI, RUC </th>
                <th>: </th>
                <th style='width:1rem;'></th>
                <td> ".$dniruc."</td>
            </tr>
            <tr>
                <th>Tipo de Préstamo</th>
                <th>:</th>
                <th style='width:1rem;'></th>
                <td> ".$f."</td>
            </tr>
            <tr>
                <th>Cantidad de cuotas</th>
                <th>: </th>
                <th style='width:1rem;'></th>
                <td> ".$cuotas."</td>
            </tr>
            <tr>
                <th>Valor de cuotas</th>
                <th>: </th>
                <th style='width:1rem;'></th>
                <td> S/ ".$monto_cobro."</td>
            </tr>
            <tr>
                <th>Tasa de Interés</th>
                <th>: </th>
                <th style='width:1rem;'></th>
                <td> ".$tasa." %</td>
            </tr>
            <tr>
                <th>Mora por día de retraso</th>
                <th>: </th>
                <th style='width:1rem;'></th>
                <td> S/ ".$moras."</td>
            </tr>
            <tr>
                <th>Fecha de desembolso</th>
                <th>: </th>
                <th style='width:1rem;'></th>
                <td> ".$fecha_des."</td>
            </tr>
            <tr>
                <th>Monto prestado</th>
                <th>: </th>
                <th style='width:1rem;'></th>
                <td> S/ ".$monto."</td>
            </tr>
        </tbody>
</table>";
echo $salid ;
}
?>