<?php
    if(!defined('CONTROLADOR'))
    exit;

    class clsUsuario {
        public static function Registro($conexion, $dni, $nombres, $apellidos, $departamento, $provincia, $id_distrito, $celular, $correo, $ruc, $usuario, $contrasena){
            try {
                $query = $conexion->prepare("INSERT INTO usuario(dni, nombres, apellidos, id_departamento, id_provincia, id_distrito, celular, correo, ruc, usuario, clave) VALUES (:dni, :nombres, :apellidos, :id_departamento, :id_estado, :id_distrito, :celular, :correo, :ruc, :usuario, :clave)");
                $query->bindParam("dni", $dni, PDO::PARAM_STR);
                $query->bindParam("nombres", $mombres, PDO::PARAM_STR);
                $query->bindParam("apellidos", $apellidos, PDO::PARAM_STR);
                $query->bindParam("id_departamento", $departamento, PDO::PARAM_STR);
                $query->bindParam("id_provincia", $provincia, PDO::PARAM_STR);
                $query->bindParam("id_distrito", $id_distrito, PDO::PARAM_STR);
                $query->bindParam("celular", $celular, PDO::PARAM_STR);
                $query->bindParam("correo", $correo, PDO::PARAM_STR);
                $query->bindParam("ruc", $ruc, PDO::PARAM_STR);
                $query->bindParam("usuario", $usuario, PDO::PARAM_STR);
                $enc_password = hash('sha256', $contrasena);
                $query->bindParam("clave", $enc_password, PDO::PARAM_STR);
                $query->execute();
                return $conexion->lastInsertId();
            } catch (PDOException $e) {
                echo($e->getMessage());
            }
        }

        public static function Listar($conexion){
            try {
                $query = $conexion->prepare("SELECT * FROM usuario 
                                             INNER JOIN tbltipo_usuario ON tbltipo_usuario.id = usuario.id_tipo_usuario
                                             INNER JOIN tbldepartamento ON tbldepartamento.id = usuario.id_departamento
                                             INNER JOIN tblprovincia ON tblprovincia.id = usuario.id_provincia
                                             INNER JOIN tbldistrito ON tbldistrito.id = usuario.id_distrito
                                             ORDER BY usuario.nombres ASC");
                $query->execute();
                if($query->rowCount() > 0){
                    return $query->fetchAll();
                }
                
            } catch (PDOException $e) {
                exit($e->getMessage());
            }
        }

        public static function Eliminar($conexion, $id){
            try {
                $query = $conexion->prepare("DELETE FROM usuario WHERE id = :id");
                $query->bindParam("id", $id, PDO::PARAM_STR);
                $query-execute();
            } catch (PDOException $e) {
                exit($e->getMessage());
            }
        }

        public static function Registro2($conexion, $nombres, $apellidos, $email, $clave){
            try {
                    $query = $conexion->prepare('INSERT INTO usuario(nombres, apellidos, correo, clave) VALUES(:nombres, :apellidos, :correo, :clave)');
                    $query->bindParam('nombres',$nombres, PDO::PARAM_STR);
                    $query->bindParam('apellidos',$apellidos, PDO::PARAM_STR);
                    $query->bindParam('correo',$email, PDO::PARAM_STR);
                    $clave_encriptada = hash('sha256',$clave);
                    $query->bindParam('clave',$clave_encriptada, PDO::PARAM_STR);
                    $query->execute();
                    return $conexion->lastInsertId();
            }catch (PDOException $e){
                exit($e->getMessage());
            }
        }
        public static function ValidarCorreo($conexion, $email){
            try {
                $query = $conexion->prepare('SELECT correo FROM usuario WHERE correo = :correo');
                $query->bindParam('correo',$email, PDO::PARAM_STR);
                $query->execute();
                if($query->rowCount() > 0){
                    return true;
                }else{
                    return false;
                }
            }catch (PDOException $e){
                exit($e->getMessage());
            }
        }
        public static function ValidarClave($conexion, $clave, $email){
            try {
                $query = $conexion->prepare('SELECT correo FROM usuario WHERE correo = :correo AND clave = :clave');
                $query->bindParam('correo',$email, PDO::PARAM_STR);
                $clave_encriptada = hash('sha256',$clave);
                $query->bindParam('clave',$clave_encriptada, PDO::PARAM_STR);
                $query->execute();
                if($query->rowCount() > 0){
                    return true;
                }else{
                    return false;
                }
            }catch (PDOException $e){
                exit($e->getMessage());
            }
        }

        public static function Obtener($conexion, $email){
            try {
                $query = $conexion->prepare('SELECT A.nombres, A.apellidos, A.correo,A.id_distrito, A.id_tipo_usuario, B.descripcion FROM usuario A  INNER JOIN tbltipo_usuario B  ON B.id = A.id_tipo_usuario WHERE A.correo = :correo');
                $query->bindParam('correo',$email, PDO::PARAM_STR);
                $query->execute();
                return $query->fetch(PDO::FETCH_OBJ);
            }catch (PDOException $e){
                exit($e->getMessage());
            }
        }

    }
?>