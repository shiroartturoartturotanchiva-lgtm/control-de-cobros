<?php
class Pagos {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function obtenerTodos() {
        // Ejecutamos la consulta
        $result = $this->db->query("SELECT * FROM pagos");
        
        // Si el resultado es válido, usamos fetch_all de mysqli
        if ($result) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }
        
        // Si no hay resultados o falla, retornamos un array vacío
        return [];
    }
}