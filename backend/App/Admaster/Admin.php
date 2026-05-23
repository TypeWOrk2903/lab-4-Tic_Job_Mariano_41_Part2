<?php

namespace Backend\App\Admaster;

class Admin
{

    private function view(string $template, array $data = []): void
    {
        // Usa diretamente a constante CONF_VIEW_WEB que foi declarada via define()
        // Se o PHP reclamar que não existe, usamos o BASE_DIR para garantir o caminho absoluto
        $basePath = BASE_DIR . '/frontend/adm/view_adm';

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
}
