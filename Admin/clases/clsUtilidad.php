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
    public static function Listar_retorno_esperado($conexion){
        try {
            $actualiza=$conexion->prepare('UPDATE por_cobrar SET estado_mora = if(fecha_cobro<now(),1,2) WHERE estado_pago=1');
            $actualiza->execute();
            $query = $conexion->prepare('SELECT R.valor_cuota FROM por_cobrar R
            INNER JOIN prestamos A ON A.id_prestamo=R.codigo
            WHERE A.estado=1');
            $query->execute();
            if($query->rowCount() > 0){
                return $query->fetchAll();
            }
        } catch (PDOException $e) {
            echo($e->getMessage());
        }
    }
    public static function Listar_total_invertido($conexion){
        try {
            $actualiza=$conexion->prepare('UPDATE por_cobrar SET estado_mora = if(fecha_cobro<now(),1,2) WHERE estado_pago=1');
            $actualiza->execute();
            $query = $conexion->prepare('SELECT id_prestamo,monto FROM prestamos a where a.estado=1');
            $query->execute();
            if($query->rowCount() > 0){
                return $query->fetchAll();
            }
        } catch (PDOException $e) {
            echo($e->getMessage());
        }
    }
    public static function Listar_total_cobrar($conexion){
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

    public static function Listar($conexion){
        try {
            $query = $conexion->prepare("SELECT R.codigo, C.nombre, C.apellido, C.dni,
            C.ruc, R.fecha_de_pago, P.id_prestamo, P.monto, P.tasa, R.monto_cobrado, SUM(R.monto_cobrado) montotatalcobrado
            FROM cobrados R
            INNER JOIN prestamos P ON P.id_prestamo = R.codigo
            INNER JOIN clientes C ON C.id_cliente = P.cliente
            GROUP BY R.codigo");
            // SELECT R.codigo, C.nombre, C.apellido, C.dni,
            // C.ruc, R.utilidad, R.id_utilidad, P.id_prestamo, P.monto, P.tasa, R.monto_cobrado
            // FROM utilidades R
            // INNER JOIN prestamos P ON P.id_prestamo = R.codigo
            // INNER JOIN clientes C ON C.id_cliente = P.cliente
            
            $query->execute();
            
                return $query->fetchAll();
            
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public static function Listar_fecha($conexion){
        try {
            $query = $conexion->prepare("SELECT R.codigo, C.nombre, C.apellido, C.dni,
            C.ruc, R.fecha_de_pago,MONTH(R.fecha_de_pago) AS Mes, P.id_prestamo, P.monto, P.tasa, R.monto_cobrado,
             SUM(R.monto_cobrado) total_cobrado, SUM(P.monto)/P.cuotas as total_prestado,  SUM(R.monto_cobrado)-SUM(P.monto)/P.cuotas as utilidades                
            FROM cobrados R
            INNER JOIN prestamos P ON P.id_prestamo = R.codigo
            INNER JOIN clientes C ON C.id_cliente = P.cliente
            GROUP BY Mes");
            // SELECT R.codigo, C.nombre, C.apellido, C.dni,
            // C.ruc, R.utilidad, R.id_utilidad, P.id_prestamo, P.monto, P.tasa, R.monto_cobrado
            // FROM utilidades R
            // INNER JOIN prestamos P ON P.id_prestamo = R.codigo
            // INNER JOIN clientes C ON C.id_cliente = P.cliente
            
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
    public static function Listar_ver($conexion,$data,$ver){
        try {
            $actualiza=$conexion->prepare('UPDATE por_cobrar SET estado_mora = if(fecha_cobro<now(),1,2) WHERE estado_pago=1');
            $actualiza->execute();
            date_default_timezone_set('America/Los_Angeles');
            $fecha = date("Y-m-d");
            if($ver==1){
            $query = $conexion->prepare('SELECT SUM(d.monto) as monto, c.monto_cobrado, c.fecha_de_pago FROM (SELECT 1 as id, SUM(monto) as monto, a.fecha FROM prestamos a WHERE a.fecha = "'.$data.'" ) d
            INNER JOIN (SELECT 1 as id, SUM(b.monto_cobrado) as monto_cobrado, b.fecha_de_pago FROM cobrados b WHERE b.fecha_de_pago like "'.$data.'%") c
            on c.id=d.id');}
            if($ver==2){$query = $conexion->prepare('SELECT SUM(d.monto) as monto, c.monto_cobrado, c.fecha_de_pago FROM (SELECT 1 as id, SUM(monto) as monto, a.fecha FROM prestamos a WHERE a.fecha like "'.$data.'%" ) d
                INNER JOIN (SELECT 1 as id, SUM(b.monto_cobrado) as monto_cobrado, b.fecha_de_pago FROM cobrados b WHERE b.fecha_de_pago like "'.$data.'%") c
                on c.id=d.id');}
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

}


?>
