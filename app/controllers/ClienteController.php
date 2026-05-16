<?php
require_once '../app/models/Cliente.php';

class ClienteController {
    private $clienteModel;

    public function __construct($db) {
        $this->clienteModel = new Cliente($db);
    }

    public function index() {
        //   clientes de la base de datos
        $result = $this->clienteModel->listarTodos();
        
        require_once '../app/views/clientes/cliente.php';
    }
}