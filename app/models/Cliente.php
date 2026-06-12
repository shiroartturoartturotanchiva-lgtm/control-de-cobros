<?php
require_once __DIR__ . '/../core/Database.php';

class Cliente {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    // 1. Obtener todos los clientes
    public function obtenerTodos() {
        $sql = "SELECT * FROM clientes ORDER BY id_cliente DESC";
        $resultado = $this->db->query($sql);
        
        if (!$resultado) {
            die("Error en SQL: " . $this->db->error);
        }
        
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    // 2. Insertar nuevo cliente (usando Prepared Statements de mysqli)
    public function insertar($datos) {
        $sql = "INSERT INTO clientes (dni, nombre, direccion) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        // 'sss' indica que los tres parámetros son strings
        $stmt->bind_param("sss", $datos['dni'], $datos['nombre'], $datos['direccion']);
        return $stmt->execute();
    }

    // 3. Obtener por ID (usando Prepared Statements de mysqli)
    public function obtenerPorId($id) {
        $sql = "SELECT * FROM clientes WHERE id_cliente = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $id); // 'i' indica que es entero
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_assoc();
    }

    // 4. Eliminar cliente
    public function eliminar($id) {
        $sql = "DELETE FROM clientes WHERE id_cliente = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
    // 5. Actualizar cliente existente
    public function actualizar($datos) {
        $sql = "UPDATE clientes SET dni = ?, nombre = ?, direccion = ? WHERE id_cliente = ?";
        $stmt = $this->db->prepare($sql);
        
        // 'sssi' significa: string, string, string, integer
        $stmt->bind_param("sssi", 
            $datos['dni'], 
            $datos['nombre'], 
            $datos['direccion'], 
            $datos['id_cliente']
        );
        
        return $stmt->execute();
    }
    public function crearCliente($dni, $nombre, $direccion) {
    $query = "INSERT INTO clientes (dni, nombre, direccion, fecha_registro) VALUES (?, ?, ?, NOW())";
    
    if ($stmt = $this->db->prepare($query)) {
        $stmt->bind_param("sss", $dni, $nombre, $direccion);
        return $stmt->execute();
    }
    return false;
}
}