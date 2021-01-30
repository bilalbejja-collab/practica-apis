<?php

include_once("Controllers/Controller.php");

$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

//Quito todos los paths hasta quedarme con comentariosapi
$uri = strstr($uri, "comentariosapi");

//Paso lo que queda de ruta a un array
$paths = explode("/", $uri);

$apiname = array_shift($paths);
$resource = array_shift($paths);

if ($resource == 'movies') {
    //Creo objeto controlador
    $controller = new Controller();

    //Saco el id de la peli de la url
    $id_movie = array_shift($paths);

    //Saco la acción de la url
    $action = array_shift($paths);

    //Verifico que el id_movie no está vacío 
    if (!empty($id_movie)) {
        switch ($action) {
            case "vercomentarios":
                $controller->handle_id($method, $id_movie);
                break;
            case "addcomentario":
                $controller->handle_id($method, $id_movie);
                break;
            case "comentario":
                $id_comment = explode("/", array_shift($paths))[0];

                //Verifico que el id_comment no está vacío 
                if (!empty($id_comment))
                    $controller->handle_comment($method, $id_movie, $id_comment);
                else
                    header('HTTP/1.1 404 Not Found');
            default:
                break;
        }
    } else header('HTTP/1.1 404 Not Found');
} else {
    // Sólo se aceptan resources desde 'movies'
    header('HTTP/1.1 404 Not Found');
}
