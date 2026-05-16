<?php

// ==============================================================================
// 1. CONFIGURAÇÕES DO BANCO DE DADOS (MariaDB / MySQL)
// ==============================================================================
define('DB_HOST', 'localhost');
define('DB_NAME', 'carpool_db');
define('DB_USER', 'root');
define('DB_PASS', '');

// ==============================================================================
// 2. CONFIGURAÇÃO DE TIMEZONE (Fuso Horário)
// ==============================================================================
// Define o fuso horário padrão para garantir que datas e horas fiquem corretas
date_default_timezone_set('Africa/Luanda');

// ==============================================================================
// 3. CONFIGURAÇÃO DA URL BASE DO PROJETO
// ==============================================================================
// Altere para o caminho exato onde o projeto roda no seu ambiente local ou produção
define('BASE_URL', 'http://localhost/carpool');

// ==============================================================================
// 4. FUNÇÕES AUXILIARES (HELPERS)
// ==============================================================================

/**
 * Função para acessar rotas e páginas do sistema.
 * Garante que os links apontem sempre para a raiz correta.
 * 
 * @param string $path Caminho da rota (ex: '/login' ou 'carona/12')
 * @return string URL completa formatada
 */
function url(string $path = ''): string {
    // Remove barras duplicadas no início se o usuário digitá-las por engano
    $path = ltrim($path, '/');
    return BASE_URL . '/' . $path;
}

/**Configuração das Pastas na view */
define("CONF_VIEW_WEB","web");
define("CONF_VIEW_ADM","adm");
/**
 * Função para acessar ficheiros/assets estáticos (CSS, JS, Imagens).
 * Aponta diretamente para dentro da pasta 'public/'.
 * 
 * @param string $file Caminho do arquivo dentro de public (ex: 'css/style.css')
 * @return string URL completa para o arquivo
 */
function asset(string $file = '',string $mdkdir): string {
    $pasta=(string) $mdkdir??'';
    $file = ltrim($file, '/');
    return BASE_URL . $pasta.'/assets/' . $file;
}
