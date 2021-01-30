<?php

namespace CriptoMonedas;

use CriptoMonedas\ConexionDB;
use Exception;

class CriptoMonedasDB
{
    /**
     * Devuelve todas las criptomonedas
     */
    public static function getAll()
    {
        try {
            $conexion = ConexionDB::conectar("criptomonedas");
            $cursor = $conexion->criptomonedas->find();
            $result = json_encode($cursor->toArray());
        } catch (Exception $e) {
            $result = self::json_message("Database error", false, 2);
        }
        $conexion = null;
        return $result;
    }

    /**
     * devuelve las 50 primeras criptomonedas de la BD en formato Json.
     */
    public static function get50Criptoc()
    {
        try {
            $conexion = ConexionDB::conectar("criptomonedas");
            $cursor = $conexion->criptomonedas->find(
                [],
                [
                    'limit' => 50
                ]
            );
            $result = json_encode($cursor->toArray());
        } catch (Exception $e) {
            $result = self::json_message("Database error", false, 2);
        }
        $conexion = null;
        return $result;
    }

    /**
     * Devuelve una criptomoneda por id
     */
    public static function getOne($id)
    {
        try {
            $conexion = ConexionDB::conectar("criptomonedas");
            $song = $conexion->criptomonedas->findOne(['id' => intval($id)]);
            if ($song == null) {
                $result = self::json_message("Resource error", false, 3);
            } else {
                $result = json_encode($song);
            }
        } catch (Exception $e) {
            $result = self::json_message("Database error", false, 2);
        }
        $conexion = null;
        return $result;
    }

    /**
     * Muestra las primeras 10 criptomonedas ordenadas por mayor precio en euros
     */
    public static function getTopValue()
    {
        try {
            $conexion = ConexionDB::conectar("criptomonedas");
            $cursor = $conexion->criptomonedas->find(
                [],
                [
                    'limit' => 10,
                    'sort' => ['precio' => -1],
                ]
            );
            $result = json_encode($cursor->toArray());
        } catch (Exception $e) {
            $result = self::json_message("Database error", false, 2);
        }
        $conexion = null;
        return $result;
    }

    /**
     * Sube en 0.1 el valor de una criptomoneda 
     */
    public static function upCripto($id)
    {
        try {
            $conexion = ConexionDB::conectar("criptomonedas");

            //Primero sacamos el valor de la criptomoneda
            $criptom = $conexion->criptomonedas->findOne(array('id' => intval($id)));
            $precio = $criptom['precio'];

            //Actualizamos el precio
            $new_precio = $precio + 0.1;

            //Actaulizamos la bd
            $conexion->criptomonedas->updateOne(
                ['id' => intval($id)],
                [
                    '$set' =>  [
                        'precio' => $new_precio
                    ]
                ]
            );

            $result = self::json_message("Updated 1 document\n", true, 1);
        } catch (Exception $e) {
            $result = self::json_message("Database error", false, 2);
        }
        $conexion = null;
        return $result;
    }

    /**
     * Baja en 0.1 el valor de una criptomoneda
     */
    public static function downCripto($id)
    {
        try {
            $conexion = ConexionDB::conectar("criptomonedas");

            //Primero sacamos el valor de la criptomoneda
            $criptom = $conexion->criptomonedas->findOne(array('id' => intval($id)));
            $precio = $criptom['precio'];

            //Actualizamos el precio
            $new_precio = $precio - 0.1;

            //Actaulizamos la bd
            $conexion->criptomonedas->updateOne(
                ['id' => intval($id)],
                [
                    '$set' =>  [
                        'precio' => $new_precio
                    ]
                ]
            );

            $result = self::json_message("Updated 1 document\n", true, 1);
        } catch (Exception $e) {
            $result = self::json_message("Database error", false, 2);
        }
        $conexion = null;
        return $result;
    }

    /**
     * Borra una criptomoneda por id 
     */
    public static function deleteOne($id)
    {
        try {
            $conexion = ConexionDB::conectar("criptomonedas");
            $cursor = $conexion->criptomonedas->deleteOne(array('id' => intval($id)));

            $result = self::json_message("Deleted " . $cursor->getDeletedCount() . " document(s)\n", true, 1);
        } catch (Exception $e) {
            $result = self::json_message("Database error", false, 2);
        }
        $conexion = null;
        return $result;
    }

    /**
     * Modifica un criptomoneda por id
     */
    public static function updateCriptomoneda($id)
    {
        try {
            $conexion = ConexionDB::conectar("criptomonedas");

            $put = file_get_contents('php://input', 'r');
            $put_json = json_decode($put, true);

            $conexion->criptomonedas->updateOne(
                ['id' => intval($id)],
                [
                    '$set' =>  [
                        'nombre' => $put_json["nombre"],
                        'simbolo' => $put_json["simbolo"],
                        'descripcion' => $put_json["descripcion"],
                        'precio' => $put_json["precio"],
                        'porcentaje' => $put_json["porcentaje"],
                        'capitalizacion' => $put_json["capitalizacion"]
                    ]
                ]
            );

            $result = self::json_message("Updated 1 document\n", true, 1);
        } catch (Exception $e) {
            $result = self::json_message("Database error", false, 2);
        }
        $conexion = null;
        return $result;
    }

    /**
     * Crea nueva criptomoneda
     */
    public static function newCriptomoneda()
    {
        try {
            $conexion = ConexionDB::conectar("criptomonedas");

            //leer PUT
            $put = file_get_contents('php://input', 'r');
            //Enviamos en POSTMAN en body la canción en formato JSON como raw (marcar también JSON al final)
            $put_json = json_decode($put, true);

            //Primero sacamos el máximo id
            $criptom = $conexion->criptomonedas->findOne(
                [],
                [
                    'sort' => ['id' => -1],
                ]
            );
            if (isset($criptom['id']))
                $max = $criptom['id'] + 1;
            else
                $max = 1;

            $result = $conexion->criptomonedas->insertOne([
                'id' => $max,
                'nombre' => $put_json["nombre"],
                'simbolo' => $put_json["simbolo"],
                'descripcion' => $put_json["descripcion"],
                'precio' => $put_json["precio"],
                'porcentaje' => $put_json["porcentaje"],
                'capitalizacion' => $put_json["capitalizacion"]
            ]);

            $result = self::json_message("Created 1 document\n", true, 1);
        } catch (Exception $e) {
            $result = self::json_message("Database error", false, 2);
        }
        $conexion = null;
        return $result;
    }

    private static function json_message($message, $success, $code)
    {
        error_reporting(0);
        $result->status_message = $message;
        $result->success = $success;
        $result->status_code = $code;
        $result = json_encode($result);
        return $result;
    }
}
