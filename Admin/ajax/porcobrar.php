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
            $validar = clsPorcobrar::Validar(Conexion::getInstancia(), $_POST['fecha_cobro'], $_POST['mora']);
            if($validar == true){
                echo json_encode(array('success' => 1));
                clsPorcobrar::Actualizar(Conexion::getInstancia(), $_POST['id'],  $_POST['fecha_cobro'], $_POST['mora']);

            }else{
                clsPorcobrar::Actualizar(Conexion::getInstancia(), $_POST['id'],  $_POST['fecha_cobro'], $_POST['mora']);
                echo json_encode(array('success' => 1));
            } 
        }else{
            echo json_encode(array('success' => 0));
        }
    }
    if($_POST['option'] == 'R'){
        $estado_pago=2;
        $codigo=$_POST['codigo'];
        if ( $_POST['fecha_pago'] !==""){
                clsPorcobrar::Actualizar_estado_pago(Conexion::getInstancia(), $_POST['id'], $estado_pago);
                $registro_cobro = clsPorcobrar::Registro_cobro(Conexion::getInstancia(),$_POST['id'],$codigo,$_POST['fecha_pago'],$_POST['total']);
                
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