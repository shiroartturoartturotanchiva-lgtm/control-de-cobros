<?php
// Título de la app
define("TITLE_BUSINESS", "AGUA SAC - CONTROL DE COBROS");

// SUBIR DOS NIVELES: de 'config' a 'app', y de 'app' a la raíz
$envFile = dirname(__DIR__, 2) . '/.env';

if(file_exists($envFile)){
    foreach(file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line){
        if(str_starts_with(trim($line), '#')) continue;

        if(strpos($line, '=') !== false) {
            [$key, $value] = explode("=", $line, 2);
            $_ENV[trim($key)] = trim($value);
        }
    }
}

// Constantes para la base de datos
define("DB_HOST", $_ENV['DB_HOST'] ?? 'localhost');
define("DB_NAME", $_ENV['DB_NAME'] ?? '');
define("DB_USER", $_ENV['DB_USER'] ?? 'root');
define("DB_PASS", $_ENV['DB_PASS'] ?? '');
define('BASE_URL', 'http://localhost/control-de-cobros');