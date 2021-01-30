<?php

namespace Comentarios;

use Comentarios\ConexionDB;
use \Exception; 

class CommentDB
{
    /**
     * Insertar comentario
     */
    public static function newComment($id)
    {
        try {
            $conexion = ConexionDB::conectar("apimovie");

            //leer PUT
            $put = file_get_contents('php://input', 'r');
            //Enviamos en POSTMAN en body la canción en formato JSON como raw (marcar también JSON al final)
            $put_json = json_decode($put, true);

            //Primero sacamos el máximo id
            $max_id = $conexion->comentarios->findOne(
                [],
                [
                    'sort' => ['id' => -1],
                ]
            );
            if (isset($max_id['id']))
                $max = $max_id['id'] + 1;
            else
                $max = $max_id;

            $result = $conexion->comentarios->insertOne([
                'id' => $max,
                'nombre' => $put_json["nombre"],
                'nota' => $put_json["nota"],
                'texto' => $put_json["texto"],
                'id_peli' => intval($id)
            ]);

            //El mensaje de éxito
            //error_reporting(0);
            $result->status_message = "Created 1 document \n";
            $result->success = true;
            $result->status_code = 1;
            $result = json_encode($result);
        } catch (Exception $e) {
            $result = 'Error: ' . $e->getMessage();
        }
        $conexion = null;
        return $result;
    }

    /**
     * Devuelve todos los comentarios
     */
    public static function getComments($id)
    {
        try {
            $conexion = ConexionDB::conectar("apimovie");
            $cursor = $conexion->comentarios->find(['id_peli' => intval($id)]);

            $comments = json_encode($cursor->toArray());
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
        $conexion = null;
        return $comments;
    }

    /**
     * Devuelve un unico comentario por su id y el id de la pelicula al que corresponde
     */
    public static function getComment($id_comment, $id_movie)
    {
        try {
            $conexion = ConexionDB::conectar("apimovie");
            $comentario = $conexion->comentarios->findOne([
                'id' => intval($id_comment),
                'id_peli' => intval($id_movie)
            ]);

            if ($comentario == null) {
                $result = self::json_message("Resource error", false, 3);
            } else {
                $result = json_encode($comentario);
            }
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
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
