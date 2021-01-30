<?php
include_once("autoload.php");

use Comentarios\CommentDB;

class Controller
{

    private $method;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->method = "";
    }

    /**
     * Handle_id: la url lleva "id" de pelicula solo, se realizan acciones GET,POST por id
     * /api/movies/{id}/vercomentarios
     * /api/movies/{id}/addcomentario
     */
    public function handle_id($method, $id_movie)
    {
        $this->method = $method;
        switch ($method) {
                // GET para ver comentarios 
            case 'GET':
                $this->display_comments($id_movie);
                break;
                // POST para añadir comentario
            case 'POST';
            case 'PUT':
                $this->add_comment($id_movie);
            default:
                header('HTTP/1.1 405 Method not allowed');
                header('Allow: GET, POST');
                break;
        }
    }

    /**
     * Handle_comment: la url lleva "id" pelicula y "id" comentario, se realiza accion GET,POST por id
     * /api/movies/{id}/comentario/{id}
     */
    public function handle_comment($method, $id_movie, $id_comment)
    {
        $this->method = $method;

        if ($method == "GET" || $method == "POST") {
            $this->get_comment($id_movie, $id_comment);
        } else {
            header('HTTP/1.1 405 Method not allowed');
            header('Allow: GET, POST');
        }
    }

    /**
     * Display_comments: muestra los comentarios de una película(id)
     */
    public function display_comments($id)
    {
        header("Content-Type: application/json; charset=UTF-8");
        echo CommentDB::getComments($id);
    }

    /**
     * Get_comment: muestra un comentario por id
     */
    public function get_comment($id_movie, $id_comment)
    {
        header("Content-Type: application/json; charset=UTF-8");
        echo CommentDB::getComment($id_comment, $id_movie);
    }

    /**
     * Create_comment: crea unnuevo comentario por POST
     */
    public function add_comment($id)
    {
        header("Content-Type: application/json; charset=UTF-8");
        echo CommentDB::newComment($id);
    }
}
