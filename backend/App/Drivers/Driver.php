<?php

namespace Backend\App\Drivers;

use Backend\database\DriverModel;
use Backend\support\Session;

/**
 * Driver
 * Classe do Motorista
 * @Job Mariano
 * Projecto de sistema de caronas
 */
class Driver
{
    private DriverModel $driverModel;

    public function __construct()
    {
        $this->driverModel = new DriverModel();
    }
    private function view(string $template, array $data = []): void
    {
        // Usa diretamente a constante CONF_VIEW_WEB que foi declarada via define()
        // Se o PHP reclamar que não existe, usamos o BASE_DIR para garantir o caminho absoluto
        $basePath = BASE_DIR . '/frontend/adm/viewdriver';

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
        $s = new Session();
        return $s->isLoggedIn();
    }
    public function index(): void
    {
        $s = new Session();

        $userId = $s->get("user_id");

        // Buscar dados dinâmicos do motorista
        $driverData = $this->driverModel->findDriverById($userId);
        // Dados para o dashboard
        $data = [
            "pageTitle"       => "CARPOOL Angola — Painel do Motorista",
            "driver"          => $driverData,
            "upcomingRide"    => $this->driverModel->getUpcomingRide($userId),
            "monthlyEarnings" => $this->driverModel->getMonthlyEarnings($userId),
            "totalTrips"      => $this->driverModel->getTotalTrips($userId),
            "avgRating"       => $this->driverModel->getAverageRating($userId),
            "recentRides"     => $this->driverModel->getRecentRides($userId, 4),
            "IsLoggedIn"      => true
        ];

        $this->view("homedriver", $data);
    }
}
