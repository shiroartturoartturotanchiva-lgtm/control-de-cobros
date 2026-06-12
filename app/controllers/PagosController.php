<?php
require_once BASE_PATH . '/models/Pagos.php';

class PagosController {
    private $pagosModel;

    public function __construct() {
        global $db;
        $this->pagosModel = new Pagos($db);
    }

    public function index() {
        // Detectar si viene una acción por la URL
        $action = isset($_GET['action']) ? $_GET['action'] : '';

        if ($action === 'guardar' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->guardar();
            return;
        }

        // Obtener historial de pagos y recibos pendientes para el formulario
        $pagos = $this->pagosModel->obtenerTodos();
        $recibosPendientes = $this->pagosModel->obtenerRecibosPendientes();
        
        require_once BASE_PATH . '/views/Pagos/Pagos.php';
    }

    private function guardar() {
        $id_recibo = intval($_POST['id_recibo']);
        $metodo_pago = $_POST['metodo_pago'];
        
        // ID temporal del usuario administrador/operador (puedes cambiarlo por $_SESSION['id_usuario'])
        $id_usuario = 1; 

        if ($id_recibo > 0 && !empty($metodo_pago)) {
            $registroExitoso = $this->pagosModel->registrarPago($id_recibo, $id_usuario, $metodo_pago);
            if ($registroExitoso) {
                header("Location: index.php?url=pagos&status=saved");
                exit();
            }
        }
        die("Error al procesar el pago.");
    }
}