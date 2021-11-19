<?php
class clsUtilidad
{
    public static function Registro($conexion, $nombres,$apellidos,$descripcion ){
        try {
            $query = $conexion->prepare("INSERT INTO usuario( nombres, apellidos, descripcion) VALUES( :nombres, :apellidos, :descripcion)");
            $query->bindParam("nombres", $nombres, PDO::PARAM_STR);
            $query->bindParam("apellidos", $apellidos, PDO::PARAM_STR);
            $query->bindParam("descripcion", $descripcion, PDO::PARAM_STR);
            $query->execute();
            return $conexion->lastInsertId();
        } catch (PDOException $e) {
            echo($e->getMessage());
        }
    }

    public static function Listar($conexion){
        try {
            $query = $conexion->prepare("SELECT R.codigo, C.nombre, C.apellido, C.dni,
            C.ruc, R.utilidad, R.id_utilidad, P.id_prestamo, P.monto, P.tasa, R.monto_cobrado
            FROM utilidades R
            INNER JOIN prestamos P ON P.id_prestamo = R.codigo
            INNER JOIN clientes C ON C.id_cliente = P.cliente");
            $query->execute();
            
                return $query->fetchAll();
            
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public static function Eliminar($conexion, $id){
        try {
            $query = $conexion->prepare("DELETE FROM usuario WHERE id = :id");
            $query->bindParam("id", $id, PDO::PARAM_STR);
        
            $query->execute();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public static function Actualizar($conexion, $id, $nombres,$apellidos,$id_tipo_usuario){
        try {
           
            $query = $conexion->prepare("UPDATE usuario INNER JOIN 
            tbltipo_usuario ON usuario.id_tipo_usuario = tbltipo_usuario.id
             SET usuario.nombres = :nombres,usuario.apellidos = :apellidos, usuario.id_tipo_usuario = :id_tipo_usuario
            WHERE usuario.id = :id");
            $query->bindParam("id", $id, PDO::PARAM_STR);
            $query->bindParam("nombres", $nombres, PDO::PARAM_STR);
            $query->bindParam("apellidos", $apellidos, PDO::PARAM_STR);
            $query->bindParam("id_tipo_usuario", $id_tipo_usuario, PDO::PARAM_STR);
            $query->execute();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public static function Cambiar($conexion, $id, $id_estado){
        try {
           if($id_estado=="1"){$id_estado="0";}
           else{$id_estado="1";}
            $query = $conexion->prepare("UPDATE usuario 
             SET usuario.id_estado = :id_estado
            WHERE usuario.id = :id");
            $query->bindParam("id", $id, PDO::PARAM_STR);
            $query->bindParam("id_estado", $id_estado, PDO::PARAM_STR);
            $query->execute();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public static function Validar($conexion,$nombres,$apellidos,$id_tipo_usuario){
        try { 
            $query = $conexion->prepare("SELECT usuario.nombres FROM usuario INNER JOIN tbltipo_usuario ON usuario.id_tipo_usuario=tbltipo_usuario.id WHERE usuario.nombres = :nombres AND usuario.apellidos =:apellidos AND usuario.id_tipo_usuario = :id_tipo_usuario");
            $query->bindParam("nombres", $nombres, PDO::PARAM_STR);
            $query->bindParam("apellidos", $apellidos, PDO::PARAM_STR);
            $query->bindParam("id_tipo_usuario", $id_tipo_usuario, PDO::PARAM_STR);
            
            $query->execute();
            if($query->rowCount() > 0){
                return true;
            }
            return false;
        } catch (PDOException $e) {
            echo($e->getMessage());
        }
    }
    public static function Validarr($conexion,  $nombres,$correo,$descripcion){
        try {
            $query = $conexion->prepare("SELECT nombres FROM registro_vehicular WHERE nombres = :nombres");
            $query->bindParam("nombres", $nombres, PDO::PARAM_STR);
            
            $query->bindParam("correo", $correo, PDO::PARAM_STR);
            $query->bindParam("descripcion", $descripcion, PDO::PARAM_STR);
           
            $query->execute();
            if($query->rowCount() > 0){
                return true;
            }
            return false;
        } catch (PDOException $e) {
            echo($e->getMessage());
        }
    }


}


?>
