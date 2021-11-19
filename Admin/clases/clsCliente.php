<?php
class clsCliente
{
    public static function Registro($conexion, $nombre, $apellido,$dniruc,$direccion,$distrito,$provincia,$departamento,
    $celular,$telefono ){
        try {
            date_default_timezone_set('America/Los_Angeles');
            $fecha = date("Y-m-d");
            $dniuruc=strlen($dniruc);
            if( $dniuruc == 8 ){
                $dni = $dniruc;
                $ruc = 0; }
            if( $dniuruc == 11 ){
                $dni = 0;
                $ruc = $dniruc; }
                        
            $query = $conexion->prepare("INSERT INTO clientes( nombre, apellido, dni, ruc, direccion, distrito, provincia, departamento
            , celular, telefono) VALUES( :nombre, :apellido, :dni, :ruc, :direccion, :distrito, :provincia, :departamento, :celular,
             :telefono)");
            $query->bindParam("nombre", $nombre, PDO::PARAM_STR);
            $query->bindParam("apellido", $apellido, PDO::PARAM_STR);
            $query->bindParam("dni", $dni, PDO::PARAM_STR);
            $query->bindParam("ruc", $ruc, PDO::PARAM_STR);
            $query->bindParam("direccion", $direccion, PDO::PARAM_STR);
            $query->bindParam("distrito", $distrito, PDO::PARAM_STR);
            $query->bindParam("provincia", $provincia, PDO::PARAM_STR);
            $query->bindParam("departamento", $departamento, PDO::PARAM_STR);
            $query->bindParam("celular", $celular, PDO::PARAM_STR);
            $query->bindParam("telefono", $telefono, PDO::PARAM_STR);
            $query->execute();
            return $conexion->lastInsertId();
        } catch (PDOException $e) {
            echo($e->getMessage());
        }
    }

    public static function Listar($conexion){
        try {
            $query = $conexion->prepare("SELECT clientes.id_cliente, clientes.nombre, clientes.apellido, clientes.dni, clientes.ruc, clientes.direccion, clientes.distrito, clientes.provincia,
             clientes.departamento, clientes.celular, clientes.telefono FROM clientes");
            $query->execute();
            
                return $query->fetchAll();
            
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public static function Eliminar($conexion, $id){
        try {
            $query = $conexion->prepare("DELETE FROM cliente WHERE id = :id");
            $query->bindParam("id", $id, PDO::PARAM_STR);
        
            $query->execute();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public static function Actualizar($conexion,$id_cliente, $direccion, $distrito, $provincia,$departamento
    ,$celular,$telefono){
        try {
            date_default_timezone_set('America/Lima');
            $fecha = date("Y-m-d");
            $query = $conexion->prepare("UPDATE clientes SET direccion = :direccion,
             distrito = :distrito, provincia = :provincia, departamento = :departamento,
              telefono = :telefono, celular = :celular WHERE id_cliente = :id_cliente");
            $query->bindParam("id_cliente", $id_cliente, PDO::PARAM_STR);
            $query->bindParam("direccion", $direccion, PDO::PARAM_STR);
            $query->bindParam("distrito", $distrito, PDO::PARAM_STR);
            $query->bindParam("provincia", $provincia, PDO::PARAM_STR);
            $query->bindParam("departamento", $departamento, PDO::PARAM_STR);
            $query->bindParam("celular", $celular, PDO::PARAM_STR);
            $query->bindParam("telefono", $telefono, PDO::PARAM_STR);
            $query->execute();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    
    public static function Validar($conexion, $nombre, $apellido,$dniruc,$direccion,$distrito,$provincia,$departamento,
    $celular,$telefono ){
        try {
            date_default_timezone_set('America/Lima');
            $fecha = date("Y-m-d");
            $dniuruc=strlen($dniruc);
            if( $dniuruc == 8 ){
                $dni = $dniruc;
                $ruc = 0; }
            if( $dniuruc == 11 ){
                    $dni=0;
                    $ruc=$dniruc; }
            $query = $conexion->prepare("SELECT nombre FROM clientes WHERE nombre = :nombre AND apellido = :apellido AND 
            dni = :dni AND ruc = :ruc AND direccion = :direccion AND distrito = :distrito AND provincia = :provincia
            AND departamento = :departamento AND celular = :celular AND telefono = :telefono");
             $query->bindParam("nombre", $nombre, PDO::PARAM_STR);
             $query->bindParam("apellido", $apellido, PDO::PARAM_STR);
             $query->bindParam("dni", $dni, PDO::PARAM_STR);
             $query->bindParam("ruc", $ruc, PDO::PARAM_STR);
             $query->bindParam("direccion", $direccion, PDO::PARAM_STR);
             $query->bindParam("distrito", $distrito, PDO::PARAM_STR);
             $query->bindParam("provincia", $provincia, PDO::PARAM_STR);
             $query->bindParam("departamento", $departamento, PDO::PARAM_STR);
             $query->bindParam("celular", $celular, PDO::PARAM_STR);
             $query->bindParam("telefono", $telefono, PDO::PARAM_STR);
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
            $query = $conexion->prepare("SELECT placa FROM cliente WHERE placa = :placa");
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
