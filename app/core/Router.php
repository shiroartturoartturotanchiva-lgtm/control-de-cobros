<?php

class Router {
    public function run() {
        $url = $this->parseUrl();
        
        // 1. Definimos los valores por defecto
        $controladorNombre = 'HomeController';
        $archivoControlador = BASE_PATH . '/controllers/HomeController.php';

        // 2. Si hay una ruta en la URL, buscamos el controlador correspondiente
        if (!empty($url[0])) {
            $nombreCandidato = ucfirst(strtolower($url[0])) . 'Controller';
            $rutaCandidata = BASE_PATH . '/controllers/' . $nombreCandidato . '.php';
            
            if (file_exists($rutaCandidata)) {
                $controladorNombre = $nombreCandidato;
                $archivoControlador = $rutaCandidata;
                unset($url[0]);
            }
        }

        // 3. ¡IMPORTANTE! Cargamos el archivo antes de instanciar la clase
        if (file_exists($archivoControlador)) {
            require_once $archivoControlador;
        } else {
            die("Error: No se pudo cargar el archivo del controlador: " . $archivoControlador);
        }

        // 4. Instanciamos el controlador pasando la conexión a BD
        global $db;
        $instancia = new $controladorNombre($db);

        // 5. Definimos el método a ejecutar
        $metodo = 'index';
        if (isset($url[1]) && method_exists($instancia, $url[1])) {
            $metodo = $url[1];
            unset($url[1]);
        }
        
        // 6. Ejecutamos el método con los parámetros restantes
        call_user_func_array([$instancia, $metodo], array_values($url));
    }

    private function parseUrl() {
        return isset($_GET['url']) ? explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL)) : [];
    }
}