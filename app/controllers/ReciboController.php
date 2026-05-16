<?php
require_once '../app/models/Recibo.php';

class ReciboController {
    private $reciboModel;

    public function __construct($db) {
        $this->reciboModel = new Recibo($db);
    }

    public function index() {
        $recibos = $this->reciboModel->getAllRecibos();
        // Aquí cargaríamos la vista (HTML) y le pasaríamos los datos
        require_once '../app/views/recibos/index.php';
    }
}