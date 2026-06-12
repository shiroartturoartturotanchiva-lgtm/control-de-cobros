<?php
session_start();
// Asegúrate de que estas rutas sean correctas para llegar a tus archivos
require_once '../../config/config.php';
require_once '../../core/Database.php';

$db = new Database();
$conn = $db->getConnection();

// Recibimos los datos del formulario
$usuario_input = $_POST['usuario'] ?? '';
$pass_input = $_POST['clave'] ?? ''; // El 'name' en tu HTML es 'clave'

$sql = "SELECT id_usuario, nombre_usuario, clave, rol FROM usuarios WHERE nombre_usuario = ? LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $usuario_input);
$stmt->execute();
$resultado = $stmt->get_result();
$usuario = $resultado->fetch_assoc();

if ($usuario && $pass_input === $usuario['clave']) {
    // Sesión iniciada correctamente
    $_SESSION['usuario_id'] = $usuario['id_usuario'];
    $_SESSION['usuario_nombre'] = $usuario['nombre_usuario'];
    $_SESSION['rol'] = $usuario['rol'];
    
    // Redirige al dashboard
    header('Location: ../../index.php?url=dashboard/index');
    exit();
} else {
    // Error: Volvemos al login
    header('Location: ../../index.php?url=auth/login&error=1');
    exit();
}
?>