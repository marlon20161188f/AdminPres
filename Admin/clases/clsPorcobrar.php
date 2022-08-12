<?php
    class clsPorcobrar {
        public static function Registro($conexion, $estado_pago, $estado_mora, $fecha_cobro,
         $valor_cuota, $codigo,$mora){
            try {
                $query = $conexion->prepare("INSERT INTO por_cobrar(estado_pago, estado_mora, fecha_cobro,
                 valor_cuota, codigo, mora) VALUES(:estado_pago, :estado_mora,
                  :fecha_cobro, :valor_cuota, :codigo,:mora)");
                $query->bindParam("estado_pago", $estado_pago, PDO::PARAM_STR);
                $query->bindParam("estado_mora", $estado_mora, PDO::PARAM_STR);
                $query->bindParam("fecha_cobro", $fecha_cobro, PDO::PARAM_STR);
                $query->bindParam("valor_cuota", $valor_cuota, PDO::PARAM_STR);
                $query->bindParam("codigo", $codigo, PDO::PARAM_STR);
                $query->bindParam("mora", $mora, PDO::PARAM_STR);
                $query->execute();
                return $conexion->lastInsertId();
            } catch (PDOException $e) {
                echo($e->getMessage());
            }
        }
        public static function Registro_cobro($conexion, $id,$codigo, $fecha_pago, $total){
            try {
                $query = $conexion->prepare("INSERT INTO cobrados(id_cobro, codigo, fecha_de_pago,
                 monto_cobrado) VALUES(:id, :codigo,
                  :fecha_pago, :total)");
                $query->bindParam("id", $id, PDO::PARAM_STR);
                $query->bindParam("codigo", $codigo, PDO::PARAM_STR);
                $query->bindParam("fecha_pago", $fecha_pago, PDO::PARAM_STR);
                $query->bindParam("total", $total, PDO::PARAM_STR);
                $query->execute();
                return $conexion->lastInsertId();
            } catch (PDOException $e) {
                echo($e->getMessage());
            }
        }

        public static function Listar($conexion){
            try {
                $actualiza=$conexion->prepare('UPDATE por_cobrar SET estado_mora = if(fecha_cobro<now(),1,2) WHERE estado_pago=1');
                $actualiza->execute();
                $query = $conexion->prepare('SELECT R.moratotal, R.diaMod, R.codigo, R.fecha_cobro, C.nombre, C.apellido, C.dni,
                C.ruc, R.valor_cuota, R.mora, E.estado, M.estado_del_cobro, R.id_cobro, P.id_prestamo , sum(Y.monto_cobrado) as monto_cobrado
                FROM por_cobrar R
                INNER JOIN estado_cobro E ON E.id_estado = R.estado_pago
                INNER JOIN estado_mora M ON M.id_mora = R.estado_mora
                INNER JOIN prestamos P ON P.id_prestamo = R.codigo
                INNER JOIN clientes C ON C.id_cliente = P.cliente
                LEFT JOIN cobrados Y ON Y.id_cobro = R.id_cobro
                WHERE E.estado = "pendiente" group by id_cobro ORDER BY R.fecha_cobro ASC');
                $query->execute();
                if($query->rowCount() > 0){
                    return $query->fetchAll();
                }
            } catch (PDOException $e) {
                echo($e->getMessage());
            }
        }
        public static function Listar_ver($conexion,$ver){
            try {
                $actualiza=$conexion->prepare('UPDATE por_cobrar SET estado_mora = if(fecha_cobro<now(),1,2) WHERE estado_pago=1');
                $actualiza->execute();
                date_default_timezone_set('America/Los_Angeles');
                $fecha = date("Y-m-d");
                if($ver==1){
                $query = $conexion->prepare('SELECT R.moratotal, R.diaMod, R.codigo, R.fecha_cobro, C.nombre, C.apellido, C.dni,
                C.ruc, R.valor_cuota, R.mora, E.estado, M.estado_del_cobro, R.id_cobro, P.id_prestamo , sum(Y.monto_cobrado) as monto_cobrado
                FROM por_cobrar R
                INNER JOIN estado_cobro E ON E.id_estado = R.estado_pago
                INNER JOIN estado_mora M ON M.id_mora = R.estado_mora
                INNER JOIN prestamos P ON P.id_prestamo = R.codigo
                INNER JOIN clientes C ON C.id_cliente = P.cliente
                LEFT JOIN cobrados Y ON Y.id_cobro = R.id_cobro
                WHERE E.estado = "pendiente" group by id_cobro ORDER BY R.fecha_cobro ASC');}
                if($ver==2){$query = $conexion->prepare('SELECT R.moratotal, R.diaMod, R.codigo, R.fecha_cobro, C.nombre, C.apellido, C.dni,
                    C.ruc, R.valor_cuota, R.mora, E.estado, M.estado_del_cobro, R.id_cobro, P.id_prestamo , sum(Y.monto_cobrado) as monto_cobrado
                    FROM por_cobrar R
                    INNER JOIN estado_cobro E ON E.id_estado = R.estado_pago
                    INNER JOIN estado_mora M ON M.id_mora = R.estado_mora
                    INNER JOIN prestamos P ON P.id_prestamo = R.codigo
                    INNER JOIN clientes C ON C.id_cliente = P.cliente
                    LEFT JOIN cobrados Y ON Y.id_cobro = R.id_cobro
                    WHERE E.estado = "pendiente" AND R.fecha_cobro < DATE_SUB(NOW(),INTERVAL 0 day) group by id_cobro ORDER BY R.fecha_cobro ASC');}
                if($ver==3){
                    $query = $conexion->prepare('SELECT R.moratotal, R.diaMod, R.codigo, R.fecha_cobro, C.nombre, C.apellido, C.dni,
                    C.ruc, R.valor_cuota, R.mora, E.estado, M.estado_del_cobro, R.id_cobro, P.id_prestamo , sum(Y.monto_cobrado) as monto_cobrado
                    FROM por_cobrar R
                    INNER JOIN estado_cobro E ON E.id_estado = R.estado_pago
                    INNER JOIN estado_mora M ON M.id_mora = R.estado_mora
                    INNER JOIN prestamos P ON P.id_prestamo = R.codigo
                    INNER JOIN clientes C ON C.id_cliente = P.cliente
                    LEFT JOIN cobrados Y ON Y.id_cobro = R.id_cobro
                    WHERE E.estado = "pendiente" AND  R.fecha_cobro > now() group by id_cobro  ORDER BY R.fecha_cobro ASC LIMIT 20 ');
                }
                $query->execute();
                if($query->rowCount() > 0){
                    return $query->fetchAll();
                }
            } catch (PDOException $e) {
                echo($e->getMessage());
            }
        }


        public static function Actualizar($conexion, $id, $fecha_cobro, $mora, $diaMod, $moratotal){
            try {
                $fecha = date("Y-m-d H:i:s");
                $query = $conexion->prepare("UPDATE por_cobrar SET fecha_cobro = :fecha_cobro, mora = :mora, diaMod = :diaMod, moratotal = :moratotal WHERE id_cobro = :id");
                $query->bindParam("id", $id, PDO::PARAM_STR);
                $query->bindParam("fecha_cobro", $fecha_cobro, PDO::PARAM_STR);
                $query->bindParam("mora", $mora, PDO::PARAM_STR);
                $query->bindParam("diaMod", $diaMod, PDO::PARAM_STR);
                $query->bindParam("moratotal", $moratotal, PDO::PARAM_STR);
                $query->execute();
            } catch (PDOException $e) {
                exit($e->getMessage());
            }
        }

        public static function Actualizar_estado_pago($conexion, $id, $estado_pago){
            try {
                $fecha = date("Y-m-d H:i:s");
                $query = $conexion->prepare("UPDATE por_cobrar SET estado_pago = :estado_pago WHERE id_cobro = :id");
                $query->bindParam("id", $id, PDO::PARAM_STR);
                $query->bindParam("estado_pago", $estado_pago, PDO::PARAM_STR);
                $query->execute();
            } catch (PDOException $e) {
                exit($e->getMessage());
            }
        }

        public static function Eliminar($conexion, $id){
            try {
                $fecha = date("Y-m-d H:i:s");
                $query = $conexion->prepare("UPDATE productos SET id_provedor = 2, fecha_modificacion = :fecha WHERE id = :id");
                $query->bindParam("id", $id, PDO::PARAM_STR);
                $query->bindParam("fecha", $fecha, PDO::PARAM_STR);
                $query->execute();
            } catch (PDOException $e) {
                exit($e->getMessage());
            }
        }


        public static function Validar($conexion, $id, $fecha_cobro, $mora, $diaMod, $moratotal){
            try {
                $query = $conexion->prepare("SELECT * FROM por_cobrar WHERE fecha_cobro = :fecha_cobro AND mora = :mora AND id_cobro = :id AND moratotal = :moratotal");
                $query->bindParam("id", $id, PDO::PARAM_STR);
                $query->bindParam("fecha_cobro", $fecha_cobro, PDO::PARAM_STR);
                $query->bindParam("mora", $mora, PDO::PARAM_STR);
                $query->bindParam("moratotal", $moratotal, PDO::PARAM_STR);
                $query->execute();
                if($query->rowCount() > 0){
                    return true;
                }
                return false;
            } catch (PDOException $e) {
                echo($e->getMessage());
            }
        }

        public static function ObtenerUltimoID($conexion){
            try {
                $query = $conexion->prepare("SELECT id FROM productos ORDER BY id DESC LIMIT 1");
                $query->execute();
                if($query->rowCount() > 0){
                    return $query->fetch(PDO::FETCH_OBJ);
                }
            } catch (PDOException $e) {
                exit($e->getMessage());
            }
        }

        





    }
?>