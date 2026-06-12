<?php

class Recibo {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function obtenerTodos() {
        $query = "SELECT r.id_recibo, r.mes_periodo, r.monto_total, r.estado, c.nombre 
                  FROM recibos r
                  INNER JOIN clientes c ON r.id_cliente = c.id_cliente
                  ORDER BY c.nombre ASC, r.id_recibo DESC";
                  
        if ($stmt = $this->db->prepare($query)) {
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }
        return [];
    }

    public function crearRecibo($id_cliente, $mes_periodo, $monto_total) {
        $query = "INSERT INTO recibos (id_cliente, mes_periodo, monto_total, estado) VALUES (?, ?, ?, 'pendiente')";
        
        if ($stmt = $this->db->prepare($query)) {
            $stmt->bind_param("isd", $id_cliente, $mes_periodo, $monto_total);
            return $stmt->execute();
        }
        return false;
    }
}