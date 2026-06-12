<?php
class HomeController {
    private $db;

    // 1. Recibimos la conexión inyectada por el Router
    public function __construct($db) {
        $this->db = $db;
    }

    public function index() {
        // 2. Usamos $this->db, NO global $db
        if ($this->db === null) {
            die("Error: La conexión a la base de datos no está disponible en HomeController.");
        }

        $sql = "SELECT 
                    (SELECT COUNT(*) FROM recibos WHERE estado = 'pendiente') as total_pendientes, 
                    (SELECT SUM(monto_total) FROM recibos WHERE estado = 'pendiente') as monto_total";
        
        $result = $this->db->query($sql);
        $resumen = ($result && !is_bool($result)) ? $result->fetch_assoc() : ['total_pendientes' => 0, 'monto_total' => 0];

        require_once BASE_PATH . '/views/Home.php';
    }
}