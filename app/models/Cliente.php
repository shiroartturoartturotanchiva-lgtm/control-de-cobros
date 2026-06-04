<?php
class Cliente {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }
    
    public function listarTodos() {
        $sql = "SELECT * FROM clientes";
        $result = $this->db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}