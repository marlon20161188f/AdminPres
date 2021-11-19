<?php
    ob_start();
    session_start(); //=> trabajar sessiones
    header('Content-Type: text/html; charset=UTF-8'); //=> documento muestro con tipo utf-8 => tildes y ñ
    define('CONTROLADOR', TRUE);
    require 'config/database.php'; //Clase de conexion
    require 'config/constantes.php'; //Constantes de la aplicacion
    require 'clases/clsReporte.php'; // clase de reportes
    require 'clases/clsUtilidad.php'; // clase de usuario
    require 'clases/clsMoras.php'; // clase de moras
    require 'clases/clsCliente.php'; // clase de clientes
    require 'clases/clsPorcobrar.php'; // clase de registros por cobrar
    require 'clases/clsPrestamo.php'; // clase de prestamos
    // $usuario = clsUsuario::Obtener(Conexion::getInstancia(), $_SESSION['email']);
    // if($usuario->id_tipo_usuario == '3'){
    //     header('Location: http://resumeucci.me/');
    // }
    // if(empty($_SESSION['administrador'])){
    //     header('Location: ../index.php');
    // }
    date_default_timezone_set('America/Lima'); //Asignando una el tiempo de Lima al servidor Apache

?>