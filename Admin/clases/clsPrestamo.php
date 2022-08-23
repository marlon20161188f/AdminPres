<?php
class clsPrestamo
{
    public static function Registro($conexion, $tipo, $idclient,$cuotas,$moras,$monto,$tasa,$fecha_des){
        try {
            date_default_timezone_set('America/Los_Angeles');
            $fecha_des = date('Y-m-d', strtotime($fecha_des));
            $query = $conexion->prepare("INSERT INTO prestamos( cliente, tipo, monto, cuotas, tasa, fecha, mora ) 
            VALUES( :idclient, :tipo, :monto, :cuotas, :tasa, :fecha_des, :moras )");
            $query->bindParam("tipo", $tipo, PDO::PARAM_STR);
            $query->bindParam("idclient", $idclient, PDO::PARAM_STR);
            $query->bindParam("cuotas", $cuotas, PDO::PARAM_STR);
            $query->bindParam("moras", $moras, PDO::PARAM_STR);
            $query->bindParam("monto", $monto, PDO::PARAM_STR);
            $query->bindParam("tasa", $tasa, PDO::PARAM_STR);
            $query->bindParam("fecha_des", $fecha_des, PDO::PARAM_STR);
            $query->execute();
            return $conexion->lastInsertId();
        } catch (PDOException $e) {
            echo($e->getMessage());
        }
    }

    public static function Listar($conexion){
        try {
            $query = $conexion->prepare("SELECT registro_vehicular.id, registro_vehicular.placa, registro_vehicular.marca, registro_vehicular.color, registro_vehicular.estacionamiento, registro_vehicular.fecha FROM registro_vehicular
                                         ");
            $query->execute();
            
                return $query->fetchAll();
            
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public static function Eliminar($conexion, $id){
        try {
            $query = $conexion->prepare("DELETE FROM registro_vehicular WHERE id = :id");
            $query->bindParam("id", $id, PDO::PARAM_STR);
        
            $query->execute();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public static function Actualizar($conexion, $id, $placa, $marca,$color,$estacionamiento){
        try {
            date_default_timezone_set('America/Lima');
            $fecha = date("Y-m-d");
            $query = $conexion->prepare("UPDATE registro_vehicular SET placa = :placa, marca = :marca, color = :color, estacionamiento = :estacionamiento, fecha = :fecha WHERE id = :id");
            $query->bindParam("id", $id, PDO::PARAM_STR);
            $query->bindParam("placa", $placa, PDO::PARAM_STR);
            $query->bindParam("marca", $marca, PDO::PARAM_STR);
            $query->bindParam("color", $color, PDO::PARAM_STR);
            $query->bindParam("estacionamiento", $estacionamiento, PDO::PARAM_STR);
            $query->bindParam("fecha", $fecha, PDO::PARAM_STR);
            $query->execute();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    
    public static function Validar($conexion, $tipo, $idclient,$cuotas,$moras,$monto,$tasa,$fecha_des){
        try {
            date_default_timezone_set('America/Lima');
            $fecha_des = date('Y-m-d', strtotime($fecha_des));
            $query = $conexion->prepare("SELECT * FROM prestamos WHERE tipo = :tipo AND cliente = :idclient AND monto = :monto AND cuotas = :cuotas
            AND tasa = :tasa AND fecha = :fecha_des AND mora = :moras");
            $query->bindParam("tipo", $tipo, PDO::PARAM_STR);
            $query->bindParam("idclient", $idclient, PDO::PARAM_STR);
            $query->bindParam("cuotas", $cuotas, PDO::PARAM_STR);
            $query->bindParam("moras", $moras, PDO::PARAM_STR);
            $query->bindParam("monto", $monto, PDO::PARAM_STR);
            $query->bindParam("tasa", $tasa, PDO::PARAM_STR);
            $query->bindParam("fecha_des", $fecha_des, PDO::PARAM_STR);
            $query->execute();
            if($query->rowCount() > 0){
                return true;
            }
            return false;
        } catch (PDOException $e) {
            echo($e->getMessage());
        }
    }
    public static function Validarr($conexion,  $placa, $marca,$color,$estacionamiento,$fecha){
        try {
            $query = $conexion->prepare("SELECT placa FROM registro_vehicular WHERE placa = :placa");
            $query->bindParam("placa", $placa, PDO::PARAM_STR);
            $query->bindParam("marca", $marca, PDO::PARAM_STR);
            $query->bindParam("color", $color, PDO::PARAM_STR);
            $query->bindParam("estacionamiento", $estacionamiento, PDO::PARAM_STR);
            $query->bindParam("fecha", $fecha, PDO::PARAM_STR);
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
