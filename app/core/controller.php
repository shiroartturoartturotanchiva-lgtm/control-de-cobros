<?php


class Controller {

    // Esta función permite cargar vistas fácilmente desde cualquier controlador
    public function view($vista, $datos = []) {
        // Convierte las claves del array en variables (ej: $datos['empleados'] se vuelve $empleados)
        extract($datos);
        
        // La ruta asume que tus vistas están en app/views/
        $rutaVista = __DIR__ . '/../views/' . $vista . '.php';
        
        if (file_exists($rutaVista)) {
            require_once $rutaVista;
        } else {
            die("Error: No se encontró la vista en " . $rutaVista);
        }
    }

    // Esta función sirve para verificar si el usuario tiene sesión activa
    public function verificarSesion() {
        if (!isset($_SESSION['usuario'])) {
            header("Location: " . BASE_URL . "/login");
            exit();
        }
    }
}