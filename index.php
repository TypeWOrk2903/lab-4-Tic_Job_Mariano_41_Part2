<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require __DIR__ . '/vendor/autoload.php';

$router = new \Bramus\Router\Router();

// ----------------------------------------------------
// 1. ROTAS PÚBLICAS E DE AUTENTICAÇÃO (Sem o mount '/')
// ----------------------------------------------------
$router->setNamespace('Backend\App\Controller'); // Barra inicial adicionada

// Rota inicial
$router->get('/', 'WebController@index');

/** ROTAS do Auth */
$router->get('/register', 'User@index');
$router->post('/register', 'User@index');
$router->get('/login', 'User@login');
$router->post('/login', 'User@login');
$router->get('/logout', 'User@logout');

$router->run(false);
// ----------------------------------------------------
// 2. ROTAS DO PAINEL DE CONTROLE (Admin)
// ----------------------------------------------------
$router->mount('/admin', function() use ($router) {
    // Define o namespace absoluto para este grupo
    $router->setNamespace('\Backend\App\Admaster'); // Barra inicial adicionada

    // A URL real no navegador será: /admin
    $router->get('/', 'Admin@index');
});
$router->run(false);

// ----------------------------------------------------
// 3. ROTAS DO MOTORISTA
// ----------------------------------------------------
$router->mount('/motorista', function() use ($router) {
    // Define o namespace absoluto para este grupo
    $router->setNamespace('\Backend\App\Drivers'); // Barra inicial adicionada
    
    // A URL real no navegador será: /motorista/dashboard-motorista
    $router->get('/', 'Driver@index'); 
});

// Executar o roteador
$router->run();
