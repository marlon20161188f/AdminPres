<?php

include('layout/header.php');

if(isset($_GET['ruta'])){
    $ruta = $_GET['ruta'];
}else{
   include('partials/dashboard.php');
    $ruta = 'dashboard';
}

if($ruta == 'cobranza'){
    include('partials/cobranza.php');
}
if($ruta == 'reporte'){
     include('partials/reporte.php');
    //include('partials/vehiculos_registrados.php');
}

if($ruta == 'historial'){
    include('partials/historial.php');
}
if($ruta == 'utilidades'){
    include('partials/utilidades.php');
}

include('layout/footer.php');
?>
			