<?php
namespace Comentarios;

use Exception;
use MongoDB\Client;

require 'vendor/autoload.php';

class ConexionDB {

    private static $conexion;

    public static function conectar($database,$host="mongodb://localhost:27017") {
        try {
            //CONEXIÓN A MONGODB CLOUD ATLAS. Comentar esta línea para conectar en local.
            $host = "mongodb+srv://admin:fPA2MIhKZRKsCl3w@clusterbilal.dwnnz.mongodb.net/" . $database . "?retryWrites=true&w=majority";
            
            self::$conexion = (new Client($host))->{$database};
        } catch (Exception $e){
            echo $e->getMessage();
        }

        return self::$conexion;
    }

    public static function desconectar() {
        self::$conexion = null;
    }
} 
?>