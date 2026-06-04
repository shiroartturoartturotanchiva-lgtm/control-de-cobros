<?php
require_once BASE_PATH . '/models/Recibo.php';

class RecibosController {
    private $reciboModel;

    public function __construct($db) {
        // Inicializamos el modelo con la conexión inyectada
        $this->reciboModel = new Recibo($db);
    }

    public function index() {
        // Obtenemos los datos usando el método exacto del modelo
        $recibos = $this->reciboModel->obtenerTodos();
        
        // Cargamos la vista de forma segura
        require_once BASE_PATH . '/views/recibos/index.php';
    }
}