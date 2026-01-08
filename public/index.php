<?php
declare(strict_types=1);

require_once __DIR__ . '/../app/controllers/HomeController.php';

$url=$_GET['url']?? 'home/index';

list($controllerName, $method) = explode('/', $url);

$controllerName= ucfirst($controllerName) . 'Controller';

require_once __DIR__ . './../app/controllers/' . $controllerName . '.php';

$controller = new HomeController();
$controller->$method();