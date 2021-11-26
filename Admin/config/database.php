<?php
    if(!defined('CONTROLADOR'))
    exit;

    class Conexion {
         private $tipo_de_base = 'mysql';
         private $host = 'localhost';
         private $nombre_de_base = 'adminpress';
         private $usuario = 'roots';
         private $contrasena = '';
         private static $instancia = null;
        //  private $tipo_de_base = 'mysql';
        //  private $host = 'bigputucjf2kra8nu8kp-mysql.services.clever-cloud.com';
        //  private $nombre_de_base = 'bigputucjf2kra8nu8kp';
        //  private $usuario = 'uszd9o98c5dnkk9e';
        //  private $contrasena = 'VSjhvIO58NTNWmCMl82h';
        //  private static $instancia = null;
        private function __construct(){
            try {
                self::$instancia = new PDO($this->tipo_de_base . ':host=' . $this->host . ';dbname=' . $this->nombre_de_base, $this->usuario, $this->contrasena);
            } catch (PDOException $e) {
                echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage();
                exit;
            }
        }

        public static function getInstancia(){
            if(!self::$instancia){
                new self();
            }
            return self::$instancia;
        }

        public static function cerrar(){
            self::$instancia = null;
        }
    }
?>