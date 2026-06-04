<?php
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/core/Database.php';
require_once __DIR__ . '/core/App.php';

define('BASE_PATH', __DIR__);

$database = new Database();
$db = $database->getConnection();

$app = new App();
$app->run();
