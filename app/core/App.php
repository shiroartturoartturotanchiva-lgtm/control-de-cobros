<?php
require_once __DIR__ . '/Router.php';

class App {
    public function run(): void {
        // Iniciamos la sesión de forma segura
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Llamamos al Router que acabamos de crear
        $router = new Router();
        $router->run();
    }
}