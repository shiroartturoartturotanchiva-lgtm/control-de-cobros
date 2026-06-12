<?php

class App {
    protected $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function run() {
        // Aquí pasamos $this->db al nuevo Router
        $router = new Router($this->db); 
        $router->run();
    }
}