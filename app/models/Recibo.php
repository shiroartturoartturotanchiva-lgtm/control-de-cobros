<?php
class Recibo {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function obtenerTodos() {
        $query = "SELECT r.*, c.nombre, c.dni 
                  FROM recibos r 
                  INNER JOIN clientes c ON r.id_cliente = c.id_cliente 
                  ORDER BY r.id_recibo ASC";        
        
        $result = $this->conn->query($query);
        
        if ($result) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }
        return [];
    }
}