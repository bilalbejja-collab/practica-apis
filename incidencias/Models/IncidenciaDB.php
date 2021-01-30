<?php

namespace Incidencias;

use Incidencias\Incidencia;
use Incidencias\ConexionDB;
use \PDO;
use \PDOException;

class IncidenciaDB
{

    public static function insertInc($latitud, $longitud, $ciudad, $direccion, $etiqueta, $descripcion, $id_cliente)
    {
        try {
            $conexion = ConexionDB::conectar("Incidencias");

            //Primero sacamos el máximo id
            $incidencia = $conexion->incidencias->findOne(
                [],
                [
                    'sort' => ['id' => -1],
                ]
            );
            if (isset($incidencia['id']))
                $max = $incidencia['id'] + 1;
            else
                $max = 1;

            $result = $conexion->incidencias->insertOne([
                'id' => $max,
                'latitud' => $latitud,
                'longitud' => $longitud,
                'ciudad' => $ciudad,
                'direccion' => $direccion,
                'etiqueta' => $etiqueta,
                'descripcion' => $descripcion,
                'estado' => "abierta",
                'id_cliente' => $id_cliente
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

    public static function getIncidencias()
    {
        try {
            $conexion = ConexionDB::conectar("Incidencias");
            $cursor = $conexion->incidencias->find();

            foreach ($cursor as $id => $incid) {
                $incidencias[] = new Incidencia($incid["id"], $incid["latitud"], $incid["longitud"], $incid["ciudad"], $incid["direccion"], $incid["etiqueta"], $incid["descripcion"], $incid["estado"], $incid["id_cliente"]);
            }
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
        $conexion = null;
        return $incidencias;
    }

    //Insertar incidencia
    public static function newIncidencia($post)
    {

        //Quitamos action de $post si se manda con Ajax una acción
        array_pop($post);

        try {
            $conexion = ConexionDB::conectar("Incidencias");

            //Primero sacamos el máximo id
            $incidencia = $conexion->incidencias->findOne(
                [],
                [
                    'sort' => ['id' => -1],
                ]
            );
            if (isset($incidencia['id']))
                $max = $incidencia['id'] + 1;
            else
                $max = 1;

            $result = $conexion->incidencias->insertOne([
                'id' => $max,
                'latitud' => $post['latitud'],
                'longitud' => $post['longitud'],
                'ciudad' => $post['ciudad'],
                'direccion' => $post['direccion'],
                'etiqueta' => $post['etiqueta'],
                'descripcion' => $post['descripcion'],
                'estado' => "abierta",
                'id_cliente' => $post['id_cliente'],
            ]);

            //El mensaje de éxito
            error_reporting(0); 
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

    //Borrar incidencia
    public static function deleteIncidencia($id)
    {
        try {
            $conexion = ConexionDB::conectar("Incidencias");
            $result = $conexion->incidencias->deleteOne(array('id' => intval($id)));

            //El mensaje de éxito
            error_reporting(0);
            $result->status_message = "Deleted " . $result->getDeletedCount() . " document(s)\n";
            $result->success = true;
            $result->status_code = 1;
            $result = json_encode($result);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
        $conexion = null;
        return $result;
    }

    public static function updateIncidencia($estado, $id)
    {
        try {
            $conexion = ConexionDB::conectar("Incidencias");

            $cursor = $conexion->incidencias->updateOne(
                ['id' => intval($id)],
                ['$set' =>  [
                    'estado' => $estado
                ]]
            );

            //El mensaje de éxito
            error_reporting(0);
            $cursor->status_message = "Updated 1 document \n";
            $cursor->success = true;
            $cursor->status_code = 1;
            $result = json_encode($cursor);
        } catch (Exception $e) {
            $result = 'Error: ' . $e->getMessage();
        }
        $conexion = null;
        return $result;
    }
}
