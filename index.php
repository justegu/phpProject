<?php

declare(strict_types=1);

use Juste\TodoApp\Framework\DIContainer;
use Juste\TodoApp\Framework\Router;

require_once 'vendor/autoload.php';

$container = new DIContainer();
$container->loadDependencies();

$requestUri = str_replace('/Paskaitos/todo_app', '', $_SERVER['REQUEST_URI']);
$requestMethod = $_SERVER['REQUEST_METHOD'];

$router = $container->get(Router::class);
$router->process($requestUri, $requestMethod, $_POST);
