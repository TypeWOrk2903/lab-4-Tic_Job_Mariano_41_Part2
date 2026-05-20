<?php

namespace Backend\App\Controller;

use Backend\support\Session;

class WebController
{
    private function view(string $template, array $data = []): void
    {
        // Usa diretamente a constante CONF_VIEW_WEB que foi declarada via define()
        // Se o PHP reclamar que não existe, usamos o BASE_DIR para garantir o caminho absoluto
        $basePath = BASE_DIR . '/frontend/web';

        // Monta o caminho exato do ficheiro PHP da View
        $viewPath = $basePath . '/' . ltrim($template, '/') . '.php';

        if (!file_exists($viewPath)) {
            http_response_code(500);
            echo "<h1>Erro de Sistema</h1><p>A View não foi encontrada no caminho: <strong>{$viewPath}</strong></p>";
            return;
        }

        extract($data, EXTR_SKIP);
        require $viewPath;
    }
     private function isLoggedIn(): bool
    {
        $s=new Session();
        return $s->isLoggedIn();
    }
    public function index(): void
    {
        $this->view('home', [
            'pageTitle' => 'Carpool — Boleias Partilhadas'
        ]);
    }
}
