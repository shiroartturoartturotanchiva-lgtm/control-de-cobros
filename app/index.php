<?php
session_start();

// BASE_PATH ahora es la ruta correcta hacia la carpeta 'app'
define('BASE_PATH', __DIR__);

// Autocargador
spl_autoload_register(function ($class) {
    $folders = ['controllers', 'core', 'models'];
    foreach ($folders as $folder) {
        $file = BASE_PATH . '/' . $folder . '/' . $class . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

// Ahora los require buscarán en la ruta correcta: .../app/config/config.php
require_once BASE_PATH . '/config/config.php';
require_once BASE_PATH . '/core/Database.php';
require_once BASE_PATH . '/core/App.php';
require_once BASE_PATH . '/core/Router.php';

$database = new Database();
$db = $database->getConnection();

$app = new App($db);
$app->run();