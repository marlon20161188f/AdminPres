<?php
    session_start();
    header('Content-Type: text/html; charset=UTF-8');
    define('CONTROLADOR', TRUE);
    require '../config/database.php';
    require '../clases/clsCliente.php';

    if($_POST['option'] == 'C'){
        if ( $_POST['nombre'] !==""){
            $validar = clsCliente::Validar(Conexion::getInstancia(), $_POST['nombre'],
            $_POST['apellido'], $_POST['dniruc'], $_POST['direccion'], $_POST['distrito'],
            $_POST['provincia'], $_POST['departamento'], $_POST['celular'], $_POST['telefono']);

            if($validar == true){
                echo json_encode(array('success' => 2));
            }else{
                $registro = clsCliente::Registro(Conexion::getInstancia(),  $_POST['nombre'],
                $_POST['apellido'], $_POST['dniruc'], $_POST['direccion'], $_POST['distrito'],
                $_POST['provincia'], $_POST['departamento'], $_POST['celular'], $_POST['telefono']);
                if($registro > 0){
                    echo json_encode(array('success' => 1));
                }else{
                    echo json_encode(array('success' => 0));
                }
            } 
        }else{
            echo json_encode(array('success' => 0));
        }

    }

    if($_POST['option'] == 'U'){
        $validar = clsCliente::Validar(Conexion::getInstancia(),  $_POST['nombre'],
        $_POST['apellido'], $_POST['dniruc'], $_POST['direccion'], $_POST['distrito'],
         $_POST['provincia'], $_POST['departamento'], $_POST['celular'],$_POST['telefono']);
        if($validar == true){
            echo json_encode(array('success' => 2));
        }else{
            clsCliente::Actualizar(Conexion::getInstancia(), $_POST['id_cliente'], $_POST['direccion'],
             $_POST['distrito'], $_POST['provincia'], $_POST['departamento'], 
             $_POST['celular'], $_POST['telefono']);
            echo json_encode(array('success' => 1));
        } 
    }

    if($_POST['option'] == 'D'){
        clsCliente::Eliminar(Conexion::getInstancia(), $_POST['id']);
        echo json_encode(array('success' => 1));
    }
?>