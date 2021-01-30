<?php
include_once("autoload.php");

use CriptoMonedas\CriptoMonedasDB;

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
     * Handle_base: la url solo lleva "criptoc", se muestran todas las criptomonedas
     */
    public function handle_base($method)
    {
        $this->method = $method;

        switch ($method) {
            case 'POST':
                $this->create_criptomoneda();
                break;
            case 'GET':
                $this->display_criptomonedas();
                break;
            default:
                header('HTTP/1.1 405 Method not allowed');
                header('Allow: GET, POST');
                break;
        }
    }

    /**
     * la url lleva "criptoc/up/id/<id>", sube en 0.1 el val de la criptomoneda
     */
    public function up_criptomoneda($method, $id)
    {
        if ($method == "PUT") {
            header("Content-Type: application/json; charset=UTF-8");
            echo CriptoMonedasDB::upCripto($id);
        } else {
            header('HTTP/1.1 404 Not Found');
        }
    }

    /**
     * la url lleva "criptoc/down/id/<id>", baja en 0.1 el val de la criptomoneda
     */
    public function down_criptomoneda($method, $id)
    {
        if ($method == "PUT") {
            header("Content-Type: application/json; charset=UTF-8");
            echo CriptoMonedasDB::downCripto($id);
        } else {
            header('HTTP/1.1 404 Not Found');
        }
    }

    /**
     * Handle_id: la url lleva "id", se realizan acciones GET,PUT,DELETE por id de criptomoneda
     */
    public function handle_id($method, $id)
    {
        $this->method = $method;
        switch ($method) {
            case 'DELETE':
                $this->delete_criptomoneda($id);
                break;
            case 'GET':
                $this->display_criptomoneda($id);
                break;
            case 'PUT':
                $this->update_criptomoneda($id);
                break;
            default:
                header('HTTP/1.1 405 Method not allowed');
                header('Allow: GET, PUT, DELETE');
                break;
        }
    }

    /**
     * Display_criptomonedas: muestra 50 criptomonedas
     */
    public function display_criptomonedas()
    {
        header("Content-Type: application/json; charset=UTF-8");
        echo CriptoMonedasDB::get50Criptoc();
    }

    /**
     * Update_criptomoneda: modifica una criptomoneda por PUT
     */
    public function update_criptomoneda($id)
    {
        header("Content-Type: application/json; charset=UTF-8");
        echo CriptoMonedasDB::updateCriptomoneda($id);
    }

    /**
     * Create_criptomoneda: crea una nueva criptomoneda por POST
     */
    public function create_criptomoneda()
    {
        header("Content-Type: application/json; charset=UTF-8");
        echo CriptoMonedasDB::newCriptomoneda();
    }

    /**
     * Delete_criptomoneda: borra una criptomoneda por id
     */
    public function delete_criptomoneda($id)
    {
        header("Content-Type: application/json; charset=UTF-8");
        echo CriptoMonedasDB::deleteOne($id);
    }

    /**
     * Display_criptomoneda: muestra la criptomoneda de ese id
     */
    public function display_criptomoneda($id)
    {
        echo "ID: " . $id . "\n";
        header("Content-Type: application/json; charset=UTF-8");
        echo CriptoMonedasDB::getOne($id);
    }

    /**
     * Show_topvalue: muestra las criptomonedas con top value ordenadas por precio
     */
    public function show_topvalue($method)
    {
        if ($method == "GET") {
            header("Content-Type: application/json; charset=UTF-8");
            echo CriptoMonedasDB::getTopValue();
        } else {
            header('HTTP/1.1 404 Not Found');
        }
    }
}
