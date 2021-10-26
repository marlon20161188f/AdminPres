<?php
    session_start();
    header('Content-Type: text/html; charset=UTF-8');
    define('CONTROLADOR', TRUE);
    require '../config/database.php';
    require '../clases/clsPago.php';

    if($_POST['option'] == 'C'){
        $validar = clsPago::Validar(Conexion::getInstancia(), $_POST['placa'], $_POST['marca'], $_POST['color'], $_POST['estacionamiento']);

        if($validar == true){
            echo json_encode(array('success' => 2));
        }else{
            $registro = clsPago::Registro(Conexion::getInstancia(),  $_POST['placa'], $_POST['marca'], $_POST['color'], $_POST['estacionamiento']);
            if($registro > 0){
                echo json_encode(array('success' => 1));
            }else{
                echo json_encode(array('success' => 0));
            }
        } 
    }

    if($_POST['option'] == 'U'){
        $validar = clsPago::Validar(Conexion::getInstancia(), $_POST['placa'], $_POST['marca'], $_POST['color'], $_POST['estacionamiento']);
        if($validar == true){
            echo json_encode(array('success' => 2));
        }else{
            clsPago::Actualizar(Conexion::getInstancia(), $_POST['id'],  $_POST['placa'], $_POST['marca'], $_POST['color'], $_POST['estacionamiento']);
            echo json_encode(array('success' => 1));
        } 
    }

    if($_POST['option'] == 'D'){
        clsPago::Eliminar(Conexion::getInstancia(), $_POST['id']);
        echo json_encode(array('success' => 1));
    }



?>