<?php
    session_start();
    header('Content-Type: text/html; charset=UTF-8');
    define('CONTROLADOR', TRUE);
    require '../config/database.php';
    require '../clases/clsPorcobrar.php';
    require '../clases/clsReporte.php';

    $conexion=Conexion::getInstancia();
    $query=$conexion->prepare("SELECT * FROM prestamos ORDER BY id_prestamo DESC LIMIT 1");
    $resultado=$query->execute();
    $estado_pago=1;
    $estado_mora=2;//sin mora
    if(isset($_POST['cuotas'])){
    $cuotas=$_POST['cuotas'];
    }else{
        $cuotas="";
    }

while($fila = $query->fetch(PDO::FETCH_ASSOC)){
    $codigo=$fila['id_prestamo'];
    $mora=$fila['mora'];
    if($_POST['option'] == 'C'){
        for ($i = 0 ; $i < $cuotas ; ++$i ) { 
            $registro = clsPorcobrar::Registro(Conexion::getInstancia(),  $estado_pago,
            $estado_mora, $_POST['fecha_cobro_'.$i], $_POST['monto_cobro_'.$i], $codigo, $mora);
            if($registro > 0){
                echo json_encode(array('success' => 1));
            }else{
                echo json_encode(array('success' => 0));
            }
        } 
    }

}

    if($_POST['option'] == 'U'){
        if ( $_POST['fecha_cobro'] !==""){
            $validar = clsPorcobrar::Validar(Conexion::getInstancia(), $_POST['id'],  $_POST['fecha_cobro'], $_POST['mora'], $_POST['diaMod'], $_POST['moratotal']);
            if($validar == true){
                echo json_encode(array('success' => 2));

            }else{
                clsPorcobrar::Actualizar(Conexion::getInstancia(), $_POST['id'],  $_POST['fecha_cobro'], $_POST['mora'], $_POST['diaMod'], $_POST['moratotal']);
                echo json_encode(array('success' => 1));
            } 
        }else{
            echo json_encode(array('success' => 0));
        }
    }
    if($_POST['option'] == 'R'){
        if($_POST['total_cob'] == $_POST['total']){
            $estado_pago=2;//pagado cancelado
        }else{
            $estado_pago=1;//pagado
        }
        $codigo=$_POST['codigo'];
        if ( $_POST['fecha_pago'] !==""){
            date_default_timezone_set('America/Lima');
            $_POST['fecha_pago'] =$_POST['fecha_pago']." ".date('H-i-s');
                $registro_cobro = clsPorcobrar::Registro_cobro(Conexion::getInstancia(),$_POST['id'],$codigo,$_POST['fecha_pago'],$_POST['total_cob']);
                $list = clsPorcobrar::Obtener(Conexion::getInstancia(), $_POST['id']);
                clsPorcobrar::Actualizar_estado_pago(Conexion::getInstancia(), $_POST['id'], $estado_pago);
                $fil= clsPorcobrar::Listar_filas(Conexion::getInstancia());
  foreach ($fil as $filas) {
    if ( $filas['filas']>0) {
      clsPorcobrar::Actualizar_estado_prestamo(Conexion::getInstancia(), $filas['codigo'],1);
    }else {
      clsPorcobrar::Actualizar_estado_prestamo(Conexion::getInstancia(), $filas['codigo'],0);
    }
  }
                if($registro_cobro > 0){
                    // echo json_encode(array('success' => 1));
                    foreach ($list as $item) {  
                        date_default_timezone_set('America/Lima');
                        $fecha = date("Y-m-d");
                        $date1 = new DateTime($item['fecha_cobro']);
                        $date2 = new DateTime("now");
                        $moraedit=$item['moratotal'];
                        if($date2>$date1){
                        $diff=$date1->diff($date2);
                        $dias=$diff->days;
                        $diamod=$item['diaMod'];
                        $moraedit=$item['moratotal'];
                        if($dias==0){
                          $dias=0;
                         $diamod=0;
                        }
                        }else{
                        $dias=0;
                        $diamod=0;
                        $moraedit=0;
                        }
                        $moratotal=$item['mora']*($dias-$diamod)+$moraedit ;
                        $total=$item['valor_cuota']+$moratotal-$item['monto_cobrado'];
                        if ($total==null) {
                            $total=0;
                        }
                    echo json_encode(array('success' => 1,'total' => $total,'total_cobrar' => $total,'id_cobro' => $item['id_cobro']));
                    }
                }else{
                    echo json_encode(array('success' => 0));
                }
        }else{
            echo json_encode(array('success' => 0));
        }
    }
    if($_POST['option'] == 'D'){
        $estado_pago=1;
        clsPorcobrar::Actualizar_estado_pago(Conexion::getInstancia(), $_POST['id_cobro'], $estado_pago);
        clsReporte::Eliminar(Conexion::getInstancia(), $_POST['id_cobrado']);
        echo json_encode(array('success' => 1));
        $fil= clsPorcobrar::Listar_filas(Conexion::getInstancia());
  foreach ($fil as $filas) {
    if ( $filas['filas']>0) {
      clsPorcobrar::Actualizar_estado_prestamo(Conexion::getInstancia(), $filas['codigo'],1);
    }else {
      clsPorcobrar::Actualizar_estado_prestamo(Conexion::getInstancia(), $filas['codigo'],0);
    }
  }

    }

?>