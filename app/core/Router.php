<?php
class Router {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function run() {
        // 1. Obtener URL
        $url = isset($_GET['url']) ? $_GET['url'] : 'inicio/index';
        $parts = explode('/', rtrim($url, '/'));

        // 2. Definir Controlador
        $nombre = $parts[0];
        if (empty($nombre) || $nombre === 'inicio') {
            $controladorNombre = 'HomeController';
        } else {
            $controladorNombre = ucfirst($nombre) . 'Controller';
        }

        // 3. Definir Método
        $metodo = isset($parts[1]) ? $parts[1] : 'index';

        // 4. Instanciar y ejecutar
        if (class_exists($controladorNombre)) {
            $controller = new $controladorNombre($this->db);
            if (method_exists($controller, $metodo)) {
                $controller->$metodo();
            } else {
                die("Método '$metodo' no encontrado.");
            }
        } else {
            die("Controlador '$controladorNombre' no encontrado. Verifica el nombre del archivo.");
        }
    } // Cierre de la función run
} // Cierre de la clase Router