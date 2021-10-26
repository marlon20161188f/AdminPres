<?php
    session_start();
    header('Content-Type: text/html; charset=UTF-8');
    define('CONTROLADOR', TRUE);
    require '../config/database.php';
    require '../clases/clsGestor.php';

    if($_POST['option'] == 'C'){
        $validar = clsGestor::Validar(Conexion::getInstancia(), $_POST['nombres'], $_POST['apellidos'], $_POST['correo'], $_POST['descripcion']);

        if($validar == true){
            echo json_encode(array('success' => 2));
        }else{
            $registro = clsGestor::Registro(Conexion::getInstancia(),  $_POST['nombres'], $_POST['apellidos'], $_POST['correo'], $_POST['descripcion']);
            if($registro > 0){
                echo json_encode(array('success' => 1));
            }else{
                echo json_encode(array('success' => 0));
            }
        } 
    }
    if($_POST['option'] =='R'){
        clsGestor::Cambiar(Conexion::getInstancia(), $_POST['id'],$_POST['id_estado']);
            echo json_encode(array('success' => 1));
    }
    if($_POST['option'] == 'U'){
        $validar = clsGestor::Validar(Conexion::getInstancia(), $_POST['nombres'], $_POST['apellidos'], $_POST['id_tipo_usuario']);
        if($validar == true){
            echo json_encode(array('success' => 2));
        }else{
            clsGestor::Actualizar(Conexion::getInstancia(), $_POST['id'],  $_POST['nombres'], $_POST['apellidos'], $_POST['id_tipo_usuario']);
            echo json_encode(array('success' => 1));
        } 
    }

    if($_POST['option'] == 'D'){
        clsGestor::Eliminar(Conexion::getInstancia(), $_POST['id']);
        echo json_encode(array('success' => 1));
    }

