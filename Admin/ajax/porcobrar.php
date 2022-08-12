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
                clsPorcobrar::Actualizar_estado_pago(Conexion::getInstancia(), $_POST['id'], $estado_pago);
                $registro_cobro = clsPorcobrar::Registro_cobro(Conexion::getInstancia(),$_POST['id'],$codigo,$_POST['fecha_pago'],$_POST['total_cob']);
                
                if($registro_cobro > 0){
                    echo json_encode(array('success' => 1));
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

    }

?>