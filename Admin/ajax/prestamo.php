<?php
    session_start();
    header('Content-Type: text/html; charset=UTF-8');
    define('CONTROLADOR', TRUE);
    require '../config/database.php';
    require '../clases/clsPrestamo.php';

    if($_POST['options'] == 'C'){
        $validar = clsPrestamo::Validar(Conexion::getInstancia(), $_POST['tipo'], $_POST['idclient'], $_POST['cuotas'], $_POST['moras'],
         $_POST['monto'], $_POST['tasa'], $_POST['fecha_des']);

        if($validar == true){
            echo json_encode(array('success' => 2));
        }else{
            $registro = clsPrestamo::Registro(Conexion::getInstancia(), $_POST['tipo'], $_POST['idclient'], $_POST['cuotas'], $_POST['moras'],
            $_POST['monto'], $_POST['tasa'], $_POST['fecha_des']);
            if($registro > 0){
                echo json_encode(array('success' => 1));
            }else{
                echo json_encode(array('success' => 0));
            }
        } 
    }

    if($_POST['option'] == 'U'){
        $validar = clsPrestamo::Validar(Conexion::getInstancia(), $_POST['placa'], $_POST['marca'], $_POST['color'], $_POST['estacionamiento']);
        if($validar == true){
            echo json_encode(array('success' => 2));
        }else{
            clsPrestamo::Actualizar(Conexion::getInstancia(), $_POST['id'],  $_POST['placa'], $_POST['marca'], $_POST['color'], $_POST['estacionamiento']);
            echo json_encode(array('success' => 1));
        } 
    }

    if($_POST['option'] == 'D'){
        clsPrestamo::Eliminar(Conexion::getInstancia(), $_POST['id']);
        echo json_encode(array('success' => 1));
    }



?>