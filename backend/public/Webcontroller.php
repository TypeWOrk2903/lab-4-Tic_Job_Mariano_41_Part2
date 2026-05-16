<?php

declare(strict_types=1);

namespace Backend\public;

/**
 * WebController — Gere as páginas públicas e estáticas do Carpool.
 */
class WebController
{
    /**
     * Apresenta a página inicial (Landing Page) do projeto.
     */
    public function index(): void
    {
        // Define o título da página
        $pageTitle = "Carpool IPIL — Boleias Partilhadas";

        // Caminho para a view da página inicial dentro da pasta web/frontend
        // NOTA: Ajusta o caminho conforme a estrutura exata das tuas pastas de views
        $viewPath = dirname(__DIR__, 2) . '/frontend/web/home.php';

        if (file_exists($viewPath)) {
            require_once $viewPath;
        } else {
            echo "<h1>Erro 404</h1><p>A View 'home.php' não foi encontrada na pasta web.</p>";
        }
    }
}