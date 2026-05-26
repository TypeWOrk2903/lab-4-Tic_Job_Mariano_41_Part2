<?php
// ================================================
// PAINEL DO MOTORISTA - DINÂMICO
// ================================================
use Backend\database\DriverModel;


$rideModel = new DriverModel();


// Dados do Motorista Logado
$userId = $_SESSION['user_id'] ?? 0;
$driver = $rideModel->findDriverById($userId);



// Buscar dados dinâmicos
$upcomingRide = $rideModel->getUpcomingRide($userId);           // Próxima viagem
$monthlyEarnings = $rideModel->getMonthlyEarnings($userId);     // Ganhos do mês
$totalTrips = $rideModel->getTotalTrips($userId);               // Total de viagens
$avgRating = $rideModel->getAverageRating($userId);             // Avaliação média
$recentRides = $rideModel->getRecentRides($userId, 4);          // Viagens recentes
//$paymentHistory = $rideModel->getPaymentHistory($userId, 4);    // Histórico de pagamentos
?>

<!DOCTYPE html>
<html lang="pt">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<title>CARPOOL - Painel do Motorista</title>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>

<script>
tailwind.config = {
    darkMode: 'class',
    theme: { extend: { fontFamily: { display: ['"Oswald"'], sans: ['"Outfit"'] } } }
}
</script>

<link rel="stylesheet" href="<?= url_asset_adm("/viewdriver/assets/css/style.css") ?>">
</head>
<body>

<!-- SIDEBAR -->
<aside class="sidebar" id="sidebar">
  <div class="sb-brand">
    <div class="sb-logo">CP</div>
    <span class="sb-name">CAR<span>POOL</span></span>
  </div>

  <nav class="sb-nav">
    <div class="sb-section">Principal</div>
    <a href="#" class="sb-item active">
      <i class="fa-solid fa-gauge-high"></i><span>Painel</span>
    </a>
    <a href="<?= url("/minhas-viagens") ?>" class="sb-item">
      <i class="fa-solid fa-route"></i><span>As Minhas Viagens</span>
      <span class="sb-badge"><?= count($recentRides) ?></span>
    </a>
    <a href="#" class="sb-item">
      <i class="fa-solid fa-calendar-days"></i><span>Agenda</span>
    </a>
    <a href="#" class="sb-item">
      <i class="fa-solid fa-users"></i><span>Passageiros</span>
    </a>

    <div class="sb-section" style="margin-top:.75rem">Finanças</div>
    <a href="#" class="sb-item">
      <i class="fa-solid fa-wallet"></i><span>Ganhos</span>
    </a>
    <a href="#" class="sb-item">
      <i class="fa-solid fa-credit-card"></i><span>Pagamentos</span>
    </a>

    <div class="sb-section" style="margin-top:.75rem">Conta</div>
    <a href="#" class="sb-item">
      <i class="fa-solid fa-car"></i><span>O Meu Carro</span>
    </a>
    <a href="#" class="sb-item">
      <i class="fa-solid fa-star"></i><span>Avaliações</span>
    </a>
    <a href="#" class="sb-item">
      <i class="fa-solid fa-gear"></i><span>Definições</span>
    </a>
  </nav>

  <div class="sb-footer">
    <div class="driver-card">
      <div class="driver-avatar"><?= substr($driver['name'] ?? 'DC', 0, 1) ?></div>
      <div>
        <div class="driver-name"><?= htmlspecialchars($driver['name'] ?? 'Motorista') ?></div>
        <div class="driver-tag"><span class="dot-online"></span> Online</div>
      </div>
    </div>
  </div>
</aside>

<!-- MAIN -->
<div class="main">

  <!-- TOPBAR -->
  <header class="topbar">
    <div class="topbar-left">
      <button class="neu-btn" id="sidebar-toggle"><i class="fa-solid fa-bars"></i></button>
      <span class="page-title">Painel do Motorista</span>
    </div>
    <div class="topbar-right">
      <button class="neu-btn notif-dot"><i class="fa-solid fa-bell"></i></button>
      <button class="neu-btn" onclick="toggleTheme()"><i class="fa-solid fa-moon" id="theme-icon"></i></button>
      <a href="<?= url("/perfil") ?>" class="neu-btn flex items-center gap-2">
        <img src="<?= $driver['avatar'] ?? '/assets/images/default-avatar.png' ?>" class="w-7 h-7 rounded-full object-cover">
        <span><?= htmlspecialchars($driver['name'] ?? 'Perfil') ?></span>
      </a>
    </div>
  </header>

  <!-- CONTENT -->
  <div class="content">

    <!-- UPCOMING TRIP -->
    <?php if ($upcomingRide): ?>
    <div class="upcoming-card">
      <div class="upcoming-label"><i class="fa-solid fa-clock"></i> Próxima Viagem</div>
      <div class="upcoming-time"><?= date('H:i', strtotime($upcomingRide['departure_time'])) ?> — Hoje</div>
      <div class="upcoming-desc">
        <?= htmlspecialchars($upcomingRide['origin_city']) ?> → <?= htmlspecialchars($upcomingRide['destination_city']) ?> 
        • <?= $upcomingRide['available_seats'] ?> passageiros confirmados
      </div>
      <div class="upcoming-actions">
        <button class="btn-accent-solid" onclick="startTrip(<?= $upcomingRide['id'] ?>)">
          <i class="fa-solid fa-play"></i> Iniciar Viagem
        </button>
      </div>
    </div>
    <?php endif; ?>

    <!-- STATS -->
    <div class="stats-row">
      <div class="stat-card accent">
        <div class="stat-icon"><i class="fa-solid fa-money-bill-wave"></i></div>
        <div class="stat-val"><?= number_format($monthlyEarnings ?? 0, 0) ?> Kz</div>
        <div class="stat-label">Ganhos este mês</div>
      </div>
      <div class="stat-card blue">
        <div class="stat-icon"><i class="fa-solid fa-route"></i></div>
        <div class="stat-val"><?= $totalTrips ?? 0 ?></div>
        <div class="stat-label">Viagens realizadas</div>
      </div>
      <div class="stat-card green">
        <div class="stat-icon"><i class="fa-solid fa-star"></i></div>
        <div class="stat-val"><?= number_format($avgRating ?? 0, 1) ?></div>
        <div class="stat-label">Avaliação média</div>
      </div>
    </div>

    <!-- VIAGENS RECENTES -->
    <div class="card">
      <div class="card-header">
        <span class="card-title">Viagens Recentes</span>
        <a href="<?= url("/minhas-viagens") ?>" class="card-action">Ver todas →</a>
      </div>
      <div class="trip-list">
        <?php foreach ($recentRides as $ride): ?>
        <div class="trip-item">
          <div class="trip-icon"><i class="fa-solid fa-check"></i></div>
          <div class="trip-info">
            <div class="trip-route"><?= htmlspecialchars($ride['origin_city']) ?> → <?= htmlspecialchars($ride['destination_city']) ?></div>
            <div class="trip-meta"><?= date('d M', strtotime($ride['departure_time'])) ?> • <?= $ride['available_seats'] ?> passageiros</div>
          </div>
          <div class="trip-amount"><?= number_format($ride['price_per_seat'] * $ride['available_seats'], 0) ?> Kz</div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>

  </div>
</div>

<script src="<?= url_asset_adm("viewdriver/assets/js/script.js") ?>"></script>
</body>
</html>