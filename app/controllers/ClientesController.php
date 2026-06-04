<?php
require_once BASE_PATH . '/models/Cliente.php';

class ClientesController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function index() {
       
        $modelo = new Cliente($this->db);
        
        $clientes = $modelo->listarTodos();
        
        require_once BASE_PATH . '/views/clientes/cliente.php';
    }
}