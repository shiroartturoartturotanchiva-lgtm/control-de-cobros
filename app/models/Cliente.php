<?php
class Cliente {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function obtenerTodos() {
        // Añadimos ORDER BY para que ordene del 1 hacia abajo de forma ascendente
        $query = "SELECT * FROM clientes ORDER BY id_cliente ASC";
        
        $result = $this->conn->query($query);
        
        if ($result) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }
        return [];
    }
}