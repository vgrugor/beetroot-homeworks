<?php
declare(strict_types=1);

use Shop\Controllers\UserController;
use Shop\Controllers\ShoppingCartController;
use Shop\controllers\IndexController;
use Shop\Router;

session_start();

require '../vendor/autoload.php';
$params = include '../config/config.php';

if (!isset($_SESSION['user']) && $_SERVER['REQUEST_URI'] !== '/registration') {
    $controller = new UserController();
    $controller->login();
    die();
}

$routes = include '../routes.php';

$router = new Router($routes);

$controllerName = 'Shop\Controllers\\' . $router->getController();
$methodName = $router->getMethod();

$controller = new $controllerName();
$controller->$methodName();
