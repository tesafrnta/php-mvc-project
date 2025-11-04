<?php
// Fallback untuk file statis
$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$file = __DIR__ . $path;
if (file_exists($file) && is_file($file)) {
    return false;
}

// Tampilkan error saat debug
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Autoloader
spl_autoload_register(function($class) {
    $classPath = str_replace(['App\\', '\\'], ['', '/'], $class);
    $baseDir = dirname(__DIR__) . '/App/';
    $file = $baseDir . $classPath . '.php';
    if (file_exists($file)) {
        require_once $file;
    } else {
        error_log("File not found class: $class ($file)");
    }
});

// Load core
require_once __DIR__ . '/../App/Core/Database.php';
require_once __DIR__ . '/../App/Core/Router.php';

// Routing
$router = new Router();
$router->get('/', 'HomeController@index');
$router->get('/users', 'UserController@index');
$router->get('/users/{id}', 'UserController@show');
$router->post('/users', 'UserController@store');
$router->resolve();
