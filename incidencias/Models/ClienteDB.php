<?php

namespace Incidencias;
 
use Incidencias\ConexionDB;
//use \PDO;
use \Exception;

class ClienteDB
{

    //Insertar cliente
    public static function newCliente($post)
    {

        //Quitamos action de $post si se manda con Ajax una acción
        array_pop($post);

        try {
            $conexion = ConexionDB::conectar("Incidencias");

            //Primero sacamos el máximo id
            $cliente = $conexion->clientes->findOne(
                [],
                [
                    'sort' => ['id' => -1],
                ]
            );
            if (isset($cliente['id']))
                $max = $cliente['id'] + 1;
            else
                $max = 1;

            $result = $conexion->clientes->insertOne([
                'id' => $max,
                'nombre' => $post['nombre'],
                'direccion' => $post['direccion'],
                'localidad' => $post['localidad'],
                'movil' => $post['movil'],
                'dni' => $post['dni']
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

    public static function getId($movil)
    {
        try {
            $conexion = ConexionDB::conectar("Incidencias");
            $cliente = $conexion->clientes->findOne(['movil' => $movil]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
        $conexion = null;
        return $cliente;
    }
     
    public static function getClientes()
    { 
        try {
            $conexion = ConexionDB::conectar("Incidencias");
            $cursor = $conexion->clientes->find();
            
            foreach ( $cursor as $id => $cliente )
            {
                $clients[] = new Cliente($cliente["id"],$cliente["nombre"], $cliente["direccion"], $cliente["localidad"], $cliente["movil"], $cliente["dni"]);
            }
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
        $conexion = null;
        return $clients;
    }

    //Borrar cliente
    public static function deleteCliente($id)
    {
        try {
            $conexion = ConexionDB::conectar("Incidencias");
            $result = $conexion->clientes->deleteOne(array('id' => intval($id)));

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
}
