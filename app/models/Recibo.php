<?php
class Recibo {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function obtenerTodos() {
        // Unimos por id_cliente que es lo que dice tu tabla de recibos
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

    public function obtenerPorCliente($dni) {
        // Buscamos el DNI en la tabla clientes y traemos sus recibos
        $query = "SELECT r.*, c.nombre, c.dni 
                  FROM recibos r 
                  INNER JOIN clientes c ON r.id_cliente = c.id_cliente 
                  WHERE c.dni = ? 
                  ORDER BY r.id_recibo ASC";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $dni);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}