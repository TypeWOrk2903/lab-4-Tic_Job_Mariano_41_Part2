<?php

declare(strict_types=1);

namespace Backend\App\Controller;

use Backend\database\RideModel;
use Backend\database\UserModel;
use Backend\support\IdMask;
use Backend\support\Session;

class TravelController
{
    private RideModel $rideModel;

    public function __construct()
    {
        $this->rideModel = new RideModel();
    }

    private function view(string $template, array $data = []): void
    {
        $basePath = BASE_DIR . '/frontend/web';
        $viewPath = $basePath . '/' . ltrim($template, '/') . '.php';

        if (!file_exists($viewPath)) {
            http_response_code(500);
            echo "<h1>Erro de Sistema</h1><p>A View não foi encontrada: <strong>{$viewPath}</strong></p>";
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

       /**
     * ====================== PESQUISAR VIAGENS ======================
     * Suporta tanto GET quanto POST
     */
    public function search()
    {
        // Captura os parâmetros (POST tem prioridade)
        $origin      = trim($_POST['origin'] ?? $_GET['origin'] ?? 'Talatona');
        $destination = trim($_POST['destination'] ?? $_GET['destination'] ?? 'Maianga');
        $date        = $_POST['date'] ?? $_GET['date'] ?? date('Y-m-d');
        $seats       = (int)($_POST['seats'] ?? $_GET['seats'] ?? 1);

        // Validação básica de data
        if (!strtotime($date)) {
            $date = date('Y-m-d');
        }

        // Busca as viagens
        try {
            $rides = $this->rideModel->searchAvailableRides($origin, $destination, $date);
        } catch (\Exception $e) {
            $rides = [];
            setFlash('errors', ['Erro ao buscar viagens. Tente novamente.']);
        }

        // Dados para a View
        $data = [
            "pageTitle"     => "CARPOOL Angola — Viagens Encontradas",
            "IsLoggedIn"    => $this->isLoggedIn(),
            "origin"        => htmlspecialchars($origin),
            "destination"   => htmlspecialchars($destination),
            "date"          => $date,
            "seats"         => $seats,
            "rides"         => $rides,
            "totalResults"  => count($rides)
        ];

        $this->view("pesquisartaxi", $data);
    }
    /**
     * ====================== DETALHES DA VIAGEM (COM ID MASCARADO) ======================
     */
    public function detailReserved($masked_travel_id, $masked_driver_id)
    {
        // Decodifica os IDs mascarados
        $travel_id = IdMask::decode($masked_travel_id);
        $driver_id = IdMask::decode($masked_driver_id);

        if (!$travel_id || !$driver_id) {
            setFlash('errors', ['Link inválido ou expirado.']);
            redirect('pesquisar-viagens');
            return;
        }
         $user=new UserModel();
        // Busca os dados
        $ride = $this->rideModel->findRideById($travel_id);
        $driver = $this->$user->findById($driver_id);

        if (!$ride || !$driver) {
            setFlash('errors', ['Viagem ou motorista não encontrado.']);
            redirect('pesquisar-viagens');
            return;
        }

        $data = [
            "pageTitle" => "CARPOOL - Detalhes da Viagem",
            "IsLoggedIn" => $this->isLoggedIn(),
            "ride"       => $ride,
            "driver"     => $driver,
            "masked_travel_id"  => $masked_travel_id,   // Para links internos
            "masked_driver_id"  => $masked_driver_id
        ];

        $this->view("detail-rider", $data);
    }
    public function paymment() : void {
        
        $data = [
            "pageTitle" => "CARPOOL - Detalhes da Viagem",
            "IsLoggedIn" => $this->isLoggedIn(),
        ];

        $this->view("paymmetTravel", $data);
    }
}