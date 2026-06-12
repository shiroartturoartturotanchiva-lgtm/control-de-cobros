<?php
class AuthController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }
public function logout() {
    session_start(); // Asegura que la sesión esté iniciada
    session_unset();  // Borra todas las variables de sesión
    session_destroy(); // Destruye la sesión en el servidor
    
    // Redirige al login o al inicio
    header("Location: index.php?url=auth/login");
    exit();
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

            // Comparación simple (texto plano como en tu BD)
            if ($usuario && $pass === $usuario['clave']) {
                $_SESSION['id_usuario'] = $usuario['id_usuario'];
                $_SESSION['nombre_usuario'] = $usuario['nombre_usuario'];
                $_SESSION['rol'] = $usuario['rol'];
                
                header("Location: index.php?url=clientes/index");
                exit();
            } else {
                header("Location: index.php?url=auth/login&error=1");
                exit();
            }
        } else {
            require_once BASE_PATH . '/views/auth/login.php';
        }
    }
}