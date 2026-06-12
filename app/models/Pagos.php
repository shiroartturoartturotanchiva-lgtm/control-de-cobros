<?php

class Pagos {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }
    public function obtenerTodos() {
        $query = "SELECT 
                    p.id_pago,
                    r.id_recibo, 
                    p.fecha_pago, 
                    r.monto_total AS monto, 
                    c.nombre AS cliente_nombre, 
                    c.dni AS cliente_dni
                  FROM pagos p
                  INNER JOIN recibos r ON p.id_recibo = r.id_recibo
                  INNER JOIN clientes c ON r.id_cliente = c.id_cliente
                  ORDER BY p.id_pago DESC";
                  
        if ($stmt = $this->db->prepare($query)) {
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            die("Error en la consulta: " . $this->db->error);
        }
    } 

    public function obtenerRecibosPendientes() {
        $query = "SELECT r.id_recibo, r.mes_periodo, r.monto_total, c.nombre AS cliente_nombre 
                  FROM recibos r
                  INNER JOIN clientes c ON r.id_cliente = c.id_cliente
                  WHERE r.estado = 'pendiente'
                  ORDER BY r.id_recibo ASC";
                  
        if ($stmt = $this->db->prepare($query)) {
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }
        return [];
    } 

    
    public function registrarPago($id_recibo, $id_usuario, $metodo_pago) {
        // Iniciamos una transacción para asegurar que se hagan ambos cambios o ninguno
        $this->db->begin_transaction();

        try {
       
            $queryPago = "INSERT INTO pagos (id_recibo, id_usuario, metodo_pago) VALUES (?, ?, ?)";
            $stmtPago = $this->db->prepare($queryPago);
            $stmtPago->bind_param("iis", $id_recibo, $id_usuario, $metodo_pago);
            $stmtPago->execute();

           
            $queryRecibo = "UPDATE recibos SET estado = 'pagado' WHERE id_recibo = ?";
            $stmtRecibo = $this->db->prepare($queryRecibo);
            $stmtRecibo->bind_param("i", $id_recibo);
            $stmtRecibo->execute();

        
            $this->db->commit();
            return true;

        } catch (Exception $e) {
            
            $this->db->rollback();
            return false;
        }
    } 

} 