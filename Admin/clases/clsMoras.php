<?php
    class clsMoras{
        public static function Listar($conexion){
            try {
                $query = $conexion->prepare('SELECT R.codigo, R.fecha_de_pago, C.mora
                FROM cobrados R
                INNER JOIN por_cobrar C ON C.id_cobro = R.id_cobro
                INNER JOIN estado_mora E ON E.id_mora=C.estado_mora
                INNER JOIN estado_cobro M ON M.id_estado=C.estado_pago
                WHERE E.estado_del_cobro="con mora"
                AND M.estado="cancelado"');
                // SELECT R.codigo, S.fecha_de_pago, C.mora
                // FROM utilidades R
                // INNER JOIN cobrados S ON S.codigo=R.codigo
                // INNER JOIN prestamos P ON P.id_prestamo = R.codigo
                // INNER JOIN por_cobrar C ON C.codigo = P.id_prestamo
                // INNER JOIN estado_mora E ON E.id_mora=C.estado_mora
                // INNER JOIN estado_cobro M ON M.id_estado=C.estado_pago
                // WHERE E.estado_del_cobro="con mora"
                // AND M.estado="cancelado"
                $query->execute();
                
                    return $query->fetchAll();
                
            } catch (PDOException $e) {
                exit($e->getMessage());
            }
        }

    }

?>