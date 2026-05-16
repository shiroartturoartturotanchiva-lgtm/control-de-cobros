<?php
// app/core/Database.php

class Database {
    private $host;
    private $db_name;
    private $username;
    private $password;
    public $conn;

    public function __construct() {
        // Asignamos los valores desde las constantes de config.php
        $this->host = DB_HOST;
        $this->db_name = DB_NAME;
        $this->username = DB_USER;
        $this->password = DB_PASS;
    }

    public function getConnection() {
        $this->conn = null;

        try {
            // Usamos mysqli para conectar a la base de datos 'control_de_cobros'
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
            
            if ($this->conn->connect_error) {
                die("Error de conexión: " . $this->conn->connect_error);
            }

            // Establecemos el juego de caracteres a utf8 para evitar errores con tildes
            $this->conn->set_charset("utf8");

        } catch (Exception $e) {
            echo "Error en el servidor: " . $e->getMessage();
        }

        return $this->conn;
    }
}