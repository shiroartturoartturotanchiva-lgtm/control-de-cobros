<?php
require_once BASE_PATH . '/models/Pagos.php';

class PagosController {
    private $pagosModel;

    public function __construct() {
        global $db;
        $this->pagosModel = new Pagos($db);
    }

    public function index() {
        $pagos = $this->pagosModel->obtenerTodos();
        require_once BASE_PATH . '/views/Pagos/Pagos.php';
    }
}