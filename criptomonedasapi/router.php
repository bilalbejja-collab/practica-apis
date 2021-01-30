<?php

include_once("Controllers/Controller.php");

$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

//Quitamos todos los paths hasta quedarnos con criptomonedasapi
$uri = strstr($uri, "criptomonedasapi");

//Pasamos lo que queda de ruta a un array
$paths = explode("/", $uri);

$apiname = array_shift($paths); 
$resource = array_shift($paths); 

if ($resource == 'criptoc') {
    //Creamos objeto controlador
    $controller = new Controller();

    //Sacamos el siguiente parámetro de la url
    $action = array_shift($paths);

    //Sacamos todas las criptomonedas
    if (empty($action)) {
        $controller->handle_base($method);
    }

    switch ($action) {
        case "up":
            //Sube en 0.1 el valor de una criptomoneda
            array_shift($paths);
            $id = array_shift($paths); //obtengo el id

            if (!empty($id))
                $controller->up_criptomoneda($method, $id);
            else
                header('HTTP/1.1 404 Not Found');
            break;
        case "down":
            //Baja en 0.1 el valor de una criptomoneda
            array_shift($paths);
            $id = array_shift($paths); //obtengo el id

            if (!empty($id))
                $controller->down_criptomoneda($method, $id);
            else
                header('HTTP/1.1 404 Not Found');
            break;
        case "topvalue":
            $controller->show_topvalue($method);
            break;
        case "id":
            $id = explode("/", array_shift($paths))[0];

            if (!empty($id))
                $controller->handle_id($method, $id);
            else
                header('HTTP/1.1 404 Not Found');
    }
} else {
    // Sólo se aceptan resources desde 'criptoc'
    header('HTTP/1.1 404 Not Found');
}
