<?php
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

            // Verificamos si el usuario existe y la contraseña es correcta
            if ($usuario && password_verify($pass, $usuario['clave'])) {
                // Iniciamos la sesión
                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }
                
                $_SESSION['id_usuario'] = $usuario['id_usuario'];
                $_SESSION['nombre_usuario'] = $usuario['nombre_usuario'];
                $_SESSION['rol'] = $usuario['rol'];
                
                // --- AQUÍ ESTABA EL PROBLEMA ---
                // Debemos redirigir a una página válida que tu Router reconozca
                // Usamos la ruta que configuramos en el Router (index.php?url=clientes)
                header("Location: /control-de-cobros/index.php?url=clientes");
                exit(); 
            } else {
                $error = "Usuario o contraseña incorrectos";
                require_once BASE_PATH . '/views/login.php';
            }
        } else {
            // Si no es POST, mostramos el login
            require_once BASE_PATH . '/views/auth/login.php';
        }
    }
}