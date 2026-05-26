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

function role():array{
    return ["Passageiro"=>"passageiro","Motorista"=>"motorista"];
}
function gender():array{
    return ["M"=>"Masculino","F"=>"Feminino"];
}

function setFlash($key, $message)
{
    if (!isset($_SESSION)) {
        session_start();
    }

    // Se for um array de mensagens (erros por exemplo)
    if (is_array($message)) {
        $_SESSION['flash'][$key] = $message;
    } else {
        $_SESSION['flash'][$key] = [$message];
    }
}

/**
 * Obtém as mensagens flash e remove-as automaticamente
 */
function getFlash($key)
{
    if (!isset($_SESSION)) {
        session_start();
    }

    if (isset($_SESSION['flash'][$key])) {
        $messages = $_SESSION['flash'][$key];
        unset($_SESSION['flash'][$key]); // Remove após ler (comportamento flash)
        return $messages;
    }

    return [];
}

/**
 * Verifica se existe mensagem flash
 */
function hasFlash($key)
{
    if (!isset($_SESSION)) {
        session_start();
    }
    return isset($_SESSION['flash'][$key]) && !empty($_SESSION['flash'][$key]);
}

/**
 * Redireciona para uma URL
 */
function redirect($url)
{
    if (!headers_sent()) {
        header("Location: " . url($url));
        exit();
    } else {
        // Fallback se headers já foram enviados
        echo '<script>window.location.href = "' . url($url) . '";</script>';
        exit();
    }
}
/**
 * Retorna array de quantidade de lugares para carona
 * 
 * @param int $maximo Quantidade máxima de lugares (padrão 6)
 * @return array
 */
function getOpcoesLugaresCarona(int $maximo = 6): array
{
    $opcoes = [];
    
    for ($i = 1; $i <= $maximo; $i++) {
        $opcoes[] = [
            'value' => $i,
            'label' => $i
        ];
    }

    return $opcoes;
}