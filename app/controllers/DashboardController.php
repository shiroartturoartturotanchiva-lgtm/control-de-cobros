<?php
class DashboardController {
    public function index() {
        // Redirige usando el formato Controlador/Metodo que usa tu Router
        header("Location: index.php?url=Clientes/cliente.php"); 
        exit();
    }
}