<?php
// 1. Mostrar errores para desarrollo (quitar en producción)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// 2. Obtener la ruta que el usuario escribió
$url = $_SERVER['REQUEST_URI'] ?? '/';

// 3. Limpiar la URL (quitar la carpeta del proyecto si es necesario)
// En XAMPP, la URL suele ser /sistema-usuarios-php/public/login
$base_path = '/sistema-usuarios-php/public';
$route = str_replace($base_path, '', $url);
$route = parse_url($route, PHP_URL_PATH);

// 4. Enrutador simple (Router)
switch ($route) {
    case '/':
    case '/home':
        echo "Bienvenido a la página principal";
        break;

    case '/login':
        // Aquí podrías requerir un archivo de tu carpeta app/
        require __DIR__ . '/../app/views/login.php';
        break;

    case '/usuarios':
        echo "Lista de usuarios";
        break;

    default:
        http_response_code(404);
        echo "Página no encontrada (404)";
        break;
}