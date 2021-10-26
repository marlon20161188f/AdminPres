<?php
    session_start();
    header('Content-Type: text/html; charset=UTF-8');
    define('CONTROLADOR', TRUE);
    require '../config/database.php';
    require '../clases/clsEstablecimiento.php';
    if(isset($_POST['option'])){
        if($_POST['option'] == 'C'){ //create del crud
            $validar = clsEstablecimiento::Validar(Conexion::getInstancia(), $_POST['nombre'],  $_POST['direccion'], $_POST['telefono'], $_POST['horario'], $_POST['monto'], $_POST['tiempo']);
    
            if($validar == true){
                echo json_encode(array('success' => 2));
            }else{
                //obtener el ultimo id 
                $last_id = clsEstablecimiento::ObtenerUltimoID(Conexion::getInstancia());
                $last_id = $last_id->id + 1;
                $foto = $_FILES['foto']; // name, tmp_name, type, size, error
                /*
                    if($foto['size'] > 5000000){ //tamaño esta el bytes
                        echo 'mandarle un error';
                    }
                */
                if($foto['type'] == "image/jpg" OR $foto['type'] == "image/jpeg"){
                    
                    $nombre = $last_id.".jpg";
                    $ruta = "../uploads/establecimientos/".$nombre;
                    move_uploaded_file($foto['tmp_name'], $ruta);
                    $registro = clsEstablecimiento::Registro(Conexion::getInstancia(), $_POST['nombre'], $nombre, $_POST['direccion'], $_POST['telefono'], $_POST['horario'], $_POST['monto'], $_POST['tiempo']);
                    if($registro > 0){
                        echo json_encode(array('success' => 1));
                    }else{
                        echo json_encode(array('success' => 0));
                    }
                }else{
                    echo json_encode(array('success' => 3));
                }

                
            }
        }

        if($_POST['option'] == 'R'){
            $listar = clsEstablecimiento::Listar(Conexion::getInstancia());
            echo json_encode(array('data' => $listar));
        }

        /*
         {"data":[{"id":"1","0":"1","nombre":"KFC","1":"KFC","foto":"961510082","2":"961510082","telefono":"998675122","3":"998675122","direccion":"Centro Civico","4":"Centro Civico","horario":"Lunes a Domingo de 10:00 am a 10:00 pm","5":"Lunes a Domingo de 10:00 am a 10:00 pm","monto_minimo":"15","6":"15","tiempo_entrega":"15","7":"15","fecha_modificacion":"2021-04-07 04:26:21","8":"2021-04-07 04:26:21","id_estado":"1","9":"1","10":"1","descripcion":"ACTIVO","11":"ACTIVO"}]}
         
        */
        
        if($_POST['option'] == 'U'){
            $validar = clsEstablecimiento::Validar(Conexion::getInstancia(), $_POST['nombre'],  $_POST['direccion'], $_POST['telefono'], $_POST['horario'], $_POST['monto'], $_POST['tiempo']);
    
            if($validar == true){
                echo json_encode(array('success' => 2));
            }else{
                $foto = $_FILES['foto']; // name, tmp_name, type, size, error
                if($foto['type'] == "image/jpg" OR $foto['type'] == "image/jpeg" OR $foto['type'] == "image/png"){
                    $nombre = $_POST['id'].".jpg";
                    $ruta = "../uploads/establecimientos/".$nombre;
                    move_uploaded_file($foto['tmp_name'], $ruta);
                    $actualizar = clsEstablecimiento::Actualizar(Conexion::getInstancia(), $_POST['id'], $_POST['nombre'], $nombre, $_POST['direccion'], $_POST['telefono'], $_POST['horario'], $_POST['monto'], $_POST['tiempo']);
                    echo json_encode(array('success' => 1));
                }else{
                    echo json_encode(array('success' => 3));
                }
                
            } 
        }

        if($_POST['option'] == 'D'){
            $eliminar = clsEstablecimiento::Eliminar(Conexion::getInstancia(), $_POST['id']);
            echo json_encode(array('success' => 1));
        }



    }
?>