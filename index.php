<?php

declare(strict_types=1);

// 1. Carrega o Autoloader do Composer
require_once __DIR__ . '/vendor/autoload.php';
// 3. Inicializa o motor de rotas
$router = new \Bramus\Router\Router();

// Repara que o teu namespace real, segundo o erro, usa "Backend" com B maiúsculo
$router->setNamespace('\Backend\App\Controller');

// Rota Inicial
$router->get('/', 'WebController@index');

$router->run();