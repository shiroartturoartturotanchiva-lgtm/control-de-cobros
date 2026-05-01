<?php
define("TITLE_BUSINESS", "ASISTENCIA");

// Leemos el archivo .env que esta en el archivo.
$envFile = dirname(__DIR__,2).'/.env';
if(file_exists($envFile)){
    //Recorremos cada linea del archivo .env, omitiendo saltos (\n) al final de cada linea y vacios.
    foreach(file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line){
        // Condicional -> Ignoramos las lineas con comentarios ( # )
        if(str_starts_with(trim($line), '#')) continue;
        // separamos la clave del valor (ej: DB_HOST=localhost)
        [$key, $value] = explode("=", $line,2);
        $_ENV[trim($key)] = trim($value);
    }
}
         
// # PHP NO SE PUEDE LEER  archivos .ENV
define("DB_HOST", $_ENV['DB_HOST'] ?? 'localhost');
define("DB_PORT", $_ENV['DB_PORT'] ?? '3306');
define("DB_NAME", $_ENV['DB_DATABASE'] ?? '');
define("DB_USER", $_ENV['DB_USERNAME'] ?? 'root');
define("DB_PASS", $_ENV['DB_PASSWORD'] ?? '');