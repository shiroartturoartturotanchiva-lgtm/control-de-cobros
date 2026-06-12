<?php

require_once dirname(__DIR__) . '/models/Recibo.php';
require_once dirname(__DIR__) . '/models/Cliente.php';
 
class RecibosController {
    private $recibosModel;
    private $clientesModel;

    public function __construct() {
        global $db;
        $this->recibosModel = new Recibo($db);
        $this->clientesModel = new Cliente($db);
    }

    public function index() {
        $action = isset($_GET['action']) ? $_GET['action'] : '';

        if ($action === 'guardar' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->guardar();
            return;
        }

        $recibos = $this->recibosModel->obtenerTodos(); 
        $clientes = $this->clientesModel->obtenerTodos();
        
        require_once BASE_PATH . '/views/Recibos/index.php';
    }

    private function guardar() {
        $id_cliente = intval($_POST['id_cliente']);
        $mes_periodo = $_POST['mes_periodo'];
        $monto_total = floatval($_POST['monto_total']);

        if ($id_cliente > 0 && !empty($mes_periodo) && $monto_total > 0) {
            $exito = $this->recibosModel->crearRecibo($id_cliente, $mes_periodo, $monto_total);
            if ($exito) {
                header("Location: index.php?url=recibos&status=created");
                exit();
            }
        }
        die("Error al guardar el recibo. Verifica los campos.");
    }
}