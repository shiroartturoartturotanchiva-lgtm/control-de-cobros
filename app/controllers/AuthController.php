<?php
// app/controllers/AuthController.php

class AuthController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = $_POST['nombre_usuario'] ?? '';
            $pass = $_POST['clave'] ?? '';

            $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE nombre_usuario = ?");
            $stmt->bind_param("s", $user);
            $stmt->execute();
            $result = $stmt->get_result();
            $usuario = $result->fetch_assoc();

            if ($usuario && password_verify($pass, $usuario['clave'])) {
                // La sesión ya se inició en index.php, así que solo asignamos
                $_SESSION['id_usuario'] = $usuario['id_usuario'];
                $_SESSION['nombre_usuario'] = $usuario['nombre_usuario'];
                $_SESSION['rol'] = $usuario['rol'];
                
                // REDIRECCIÓN CORREGIDA: Usamos solo 'index'
                header("Location: index");
                exit();
            } else {
                $error = "Usuario o contraseña incorrectos";
                require_once BASE_PATH . '/app/views/login.php';
            }
        } else {
            require_once BASE_PATH . '/app/views/login.php';
        }
    }

    public function logout() {
        session_unset();
        session_destroy();
        // REDIRECCIÓN CORREGIDA: Usamos solo 'login'
        header("Location: login");
        exit();
    }
}