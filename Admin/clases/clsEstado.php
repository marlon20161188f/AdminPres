<?php
    class clsEstado {
        public static function ListarActivo($conexion){
            try {
                $query = $conexion->prepare("SELECT U.id,U.nombres,U.apellidos,U.id_tipo_usuario,U.id_estado,U.correo,T.descripcion FROM usuario U INNER JOIN tbltipo_usuario T ON U.id_tipo_usuario=T.id ");
                $query->execute();
                if($query->rowCount() > 0){
                    return $query->fetchAll();
                }
            } catch (PDOException $e) {
                exit($e->getMessage());
            }
        }

        public static function ListarPedido($conexion){
            try {
                $query = $conexion->prepare("SELECT id, provedor FROM provedor WHERE id NOT IN (1,2)");
                $query->execute();
                if($query->rowCount() > 0){
                    return $query->fetchAll();
                }
            } catch (PDOException $e) {
                exit($e->getMessage());
            }
        }
    
    }
?>