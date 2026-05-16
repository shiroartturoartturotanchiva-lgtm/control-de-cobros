<?php
// 1. Mostrar errores para saber qué falla (puedes quitarlo después)
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
define('BASE_PATH', dirname(__DIR__));

require_once BASE_PATH . '/app/config/config.php';
require_once BASE_PATH . '/app/core/Database.php';

$database = new Database();
$db = $database->getConnection();

// 2. Usamos 'dashboard' como valor por defecto
$url = isset($_GET['url']) ? $_GET['url'] : 'dashboard';

switch ($url) {
   

    case 'clientes': 
        require_once BASE_PATH . '/app/models/Cliente.php';
        $clienteModel = new Cliente($db);
        $clientes = $clienteModel->obtenerTodos();
        require_once BASE_PATH . '/app/views/Clientes/cliente.php'; 
        break;
case 'dashboard':
        $sql = "SELECT 
                    (SELECT COUNT(*) FROM recibos WHERE estado = 'pendiente') as total_pendientes, 
                    (SELECT SUM(monto_total) FROM recibos WHERE estado = 'pendiente') as monto_total";
        
        $result = $db->query($sql);

        // Si la consulta falla, creamos el array con ceros para que la vista no explote
        if ($result && !is_bool($result)) {
            $resumen = $result->fetch_assoc();
        } else {
            $resumen = ['total_pendientes' => 0, 'monto_total' => 0];
            // Guarda el error en una variable por si quieres inspeccionarlo
            $error_bd = $db->error; 
        }

        require_once BASE_PATH . '/app/views/Home.php';
        break;
    case 'recibos':
        require_once BASE_PATH . '/app/models/Recibo.php';
        $reciboModel = new Recibo($db);
        $recibos = $reciboModel->obtenerTodos();
        require_once BASE_PATH . '/app/views/recibos/index.php';
        break;

    default:
        header('Location: dashboard');
        break;
}