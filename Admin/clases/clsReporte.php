<?php
class clsReporte
{
    public static function Registro($conexion, $placa, $usuario ){
        try {
            date_default_timezone_set("America/Lima");
            $fecha = date("Y-m-d H:i:s");
            $query = $conexion->prepare("INSERT INTO registro_ingreso( placa, fecha, usuario) VALUES( :placa, :fecha, :usuario)");
            $query->bindParam("placa", $placa, PDO::PARAM_STR);
            $query->bindParam("estacionamiento", $estacionamiento, PDO::PARAM_STR);
            $query->bindParam("fecha", $fecha, PDO::PARAM_STR);
            $query->bindParam("usuario", $usuario, PDO::PARAM_STR);
            $query->execute();
            return $conexion->lastInsertId();
        } catch (PDOException $e) {
            echo($e->getMessage());
        }
    }

    public static function Listar($conexion){
        try {
            $query = $conexion->prepare("SELECT R.codigo, R.fecha_de_pago, C.nombre, C.apellido, C.dni,
            C.ruc, R.monto_cobrado, R.id_cobro, R.id_cobrado, P.id_prestamo 
            FROM cobrados R
            INNER JOIN prestamos P ON P.id_prestamo = R.codigo
            INNER JOIN clientes C ON C.id_cliente = P.cliente ");
            $query->execute();
            
                return $query->fetchAll();
            
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public static function Eliminar($conexion, $id){
        try {
            $query = $conexion->prepare("DELETE FROM cobrados WHERE id_cobrado = :id");
            $query->bindParam("id", $id, PDO::PARAM_STR);
        
            $query->execute();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

}


?>
