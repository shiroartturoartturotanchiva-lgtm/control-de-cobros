<?php
require_once __DIR__ . '/../models/Cliente.php';

class ClientesController extends Controller {

    public function index(): void {
        $action = $_GET['action'] ?? '';

        if ($action === 'guardar' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->guardar();
            return;
        }

        $cliente = new Cliente();
        $clientes = $cliente->obtenerTodos();
        $this->view('Clientes/cliente', ['clientes' => $clientes]);
    }

    public function editar_cliente() {
        if (ob_get_length()) ob_end_clean();
        header('Content-Type: application/json');

        try {
            $modelo = new Cliente();
            $resultado = $modelo->actualizar($_POST); 
            echo json_encode(['success' => $resultado]);
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'error' => $e->getMessage()]);
        }
        exit; 
    }

    public function eliminar() {
        $id = $_GET['id'] ?? null;
        
        if ($id) {
            $cliente = new Cliente();
            $resultado = $cliente->eliminar($id);
            echo json_encode(['success' => $resultado]);
        } else {
            echo json_encode(['success' => false, 'message' => 'ID no recibido']);
        }
        exit;
    }

    private function guardar() {
        $dni = $_POST['dni'] ?? '';
        $nombre = $_POST['nombre'] ?? '';
        $direccion = $_POST['direccion'] ?? '';

        if (!empty($dni) && !empty($nombre) && !empty($direccion)) {
            $cliente = new Cliente();
            $exito = $cliente->crearCliente($dni, $nombre, $direccion);
            if ($exito) {
                header("Location: index.php?url=clientes&status=created");
                exit();
            }
        }
        die("Error al guardar el cliente. Verifica los campos.");
    }
}