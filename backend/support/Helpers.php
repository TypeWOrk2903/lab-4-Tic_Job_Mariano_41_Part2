<?php 
if (!function_exists('frontend_path')) {
    /**
     * Gera o caminho absoluto para ficheiros ou subdiretórios dentro do frontend.
     * 
     * @param string $subDir O subdiretório ou caminho interno (ex: 'web/pages/login.php')
     * @return string Caminho absoluto completo no servidor
     */
    function frontend_path(string $subDir = ''): string
    {
        // Usa a constante base que já definiste para o teu frontend
        $base = dirname(__DIR__, 2) . '/frontend';
        
        // Retorna o caminho limpo, removendo barras duplicadas
        return $base . '/' . ltrim($subDir, '/');
    }
}
if (!function_exists('assets')) {
    /**
     * Gera a URL pública correta para os ficheiros de assets (CSS, JS, Imagens).
     * 
     * @param string $subpasta A pasta principal dentro do frontend (ex: 'web' ou 'adm')
     * @param string $file O caminho do arquivo a partir dali (ex: 'css/style.css' ou 'js/home.js')
     * @return string URL completa para o navegador
     */
    function asset(string $subpasta, string $file): string
    {
        // Define a URL base do teu projeto local
        $baseUrl = 'http://localhost:8000'; 
        
        // Monta a URL pública: http://localhost:8000/frontend/web/assets/css/style.css
        return $baseUrl . '/frontend/' . trim($subpasta, '/') . '/assets/' . ltrim($file, '/');
    }
}