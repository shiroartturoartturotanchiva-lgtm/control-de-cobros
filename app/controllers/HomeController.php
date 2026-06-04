<?php
class HomeController {
    public function index() {
        global $db; 

        $sql = "SELECT 
                    (SELECT COUNT(*) FROM recibos WHERE estado = 'pendiente') as total_pendientes, 
                    (SELECT SUM(monto_total) FROM recibos WHERE estado = 'pendiente') as monto_total";
        
        $result = $db->query($sql);
        $resumen = ($result && !is_bool($result)) ? $result->fetch_assoc() : ['total_pendientes' => 0, 'monto_total' => 0];

        require_once BASE_PATH . '/views/Home.php';
    }
}