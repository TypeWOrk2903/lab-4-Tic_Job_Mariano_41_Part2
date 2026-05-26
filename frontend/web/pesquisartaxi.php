<?php
// ================================================
// VIEW - PESQUISAR TAXI / VIAGENS
// ================================================

$rides = $rides ?? []; // Caso venha do controller
$isLoggedIn = $IsloggeIn ?? false; // Nome da variável enviada pelo controller
?>

<!DOCTYPE html>
<html lang="pt">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<title><?= $pageTitle ?? 'CARPOOL - Viagens Encontradas' ?></title>

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

<link rel="stylesheet" href="<?= url_asset("css/shearch.css") ?>">
</head>
<body>

<!-- SEARCH BAR -->
<div class="search-wrap">
  <div class="search-inner">
    <span class="brand-mini"><a href="<?= url("/") ?>">CAR<span>POOL</span></a></span>

    <div class="search-bar">
      <div class="search-field">
        <i class="fa-solid fa-location-dot" style="color:var(--blue)"></i>
        <input type="text" id="origin-input" value="<?= htmlspecialchars($origin ?? 'Talatona') ?>" data-i18n-placeholder="search.origin"/>
      </div>
      <button class="search-swap" onclick="swapCities()"><i class="fa-solid fa-arrow-right-arrow-left"></i></button>
      <div class="search-field">
        <i class="fa-solid fa-flag-checkered" style="color:var(--accent)"></i>
        <input type="text" id="dest-input" value="<?= htmlspecialchars($destination ?? 'Maianga') ?>" data-i18n-placeholder="search.dest"/>
      </div>
      <div class="search-sep"></div>
      <div class="search-field" style="max-width:140px">
        <i class="fa-regular fa-calendar"></i>
        <input type="date" value="<?= $date ?? date('Y-m-d') ?>" style="font-size:.78rem"/>
      </div>
      <div class="search-sep"></div>
      <div class="search-field" style="max-width:120px">
        <i class="fa-solid fa-user"></i>
        <input type="text" value="1 passageiro" readonly data-i18n-value="search.pax"/>
      </div>
    </div>

    <button class="btn-search" onclick="doSearch()">
      <i class="fa-solid fa-magnifying-glass"></i>
      <span data-i18n="search.btn">Procurar</span>
    </button>

    <div class="top-controls">
      <button class="neu-btn" id="lang-toggle"><i class="fa-solid fa-globe"></i> <span id="lang-label">PT</span></button>
      <button class="neu-btn" id="theme-toggle" onclick="toggleTheme()"><i class="fa-solid fa-moon" id="theme-icon"></i></button>
    </div>
  </div>
</div>

<!-- PAGE BODY -->
<div class="page-body">

  <!-- FILTERS -->
  <aside class="filters-col">
    <!-- Seu código de filtros original (mantido) -->
  </aside>

  <!-- RESULTS -->
  <section class="results-col">

    <div class="results-header">
      <div>
        <div class="results-title">
          <span class="results-count"><?= count($rides) ?></span>
          <span data-i18n="results.title">viagens disponíveis</span>
        </div>
        <div class="results-meta">
         <?php if (!empty($origin) && !empty($destination)) : ?>
          <?= htmlspecialchars($origin ?? '') ?> → <?= htmlspecialchars($destination ?? '') ?> • <?= $date ?? date('d/m/Y') ?>
          <?php endif;?>
        </div>
      </div>
    </div>

    <?php if (empty($rides)): ?>
      <div class="empty-state" id="empty-state">
        <div class="empty-icon"><i class="fa-solid fa-car-on"></i></div>
        <div class="empty-title" data-i18n="empty.title">Sem viagens disponíveis</div>
        <div class="empty-sub" data-i18n="empty.sub">Tente ajustar os filtros ou escolha outra data.</div>
      </div>
    <?php else: ?>
      <?php foreach ($rides as $ride): 
          $discount = ($ride['available_seats'] >= 3) ? 10 : 0;
          $finalPrice = $ride['price_per_seat'] * (1 - $discount/100);
      ?>
        <div class="trip-card <?= $ride['available_seats'] <= 2 ? 'featured' : '' ?>" onclick="openBooking(<?= $ride['id'] ?>)">

          <?php if ($ride['available_seats'] <= 2): ?>
            <div class="featured-label"><i class="fa-solid fa-bolt"></i> Reserva Imediata</div>
          <?php endif; ?>

          <div class="trip-card-inner">
            <div class="trip-route-row">
              <div style="text-align:right">
                <div class="trip-time"><?= date('H:i', strtotime($ride['departure_time'])) ?></div>
                <?php if (!empty($origin)) :?>
                <div class="trip-place"><?= htmlspecialchars($ride['origin_city'] ?? $origin) ?></div>
                <?php endif; ?>
              </div>
              <div class="route-line-wrap">
                <div class="route-dot-from"></div>
                <div class="route-line"></div>
                <div class="trip-duration">0h<?= rand(25,55) ?></div>
                <div class="route-dot-to"></div>
              </div>
              <div>
                <div class="trip-time"><?= date('H:i', strtotime($ride['departure_time'] . ' +40 minutes')) ?></div>
                <?php if(!empty($destination)):?>
                <div class="trip-place"><?= htmlspecialchars($ride['destination_city'] ?? $destination) ?></div>
                <?php endif;?>
              </div>
              <div class="trip-price">
                <?= number_format($finalPrice, 0) ?><span class="trip-price-cur">Kz</span>
              </div>
            </div>

            <div class="trip-driver-row">
              <div class="driver-info">
                <div class="driver-verified">
                  <img src="<?= $ride['avatar'] ?? '/assets/images/default-avatar.png' ?>" class="driver-avatar-placeholder">
                  <div class="verified-badge"><i class="fa-solid fa-check"></i></div>
                </div>
                <div>
                  <div class="driver-name"><?= htmlspecialchars($ride['driver_name']) ?></div>
                  <div class="driver-rating">
                    <i class="fa-solid fa-star"></i> <?= round($ride['avg_rating'] ?? 4.5, 1) ?>
                  </div>
                </div>
              </div>
              <div class="trip-tags">
                <span class="tag green"><i class="fa-solid fa-snowflake"></i> AC</span>
                <?php if ($discount > 0): ?>
                <span class="tag orange">10% OFF</span>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>

  </section>

  <!-- MAP COL -->
  <aside class="map-col">
    <!-- Seu mapa original -->
  </aside>

</div>

<!-- BOOKING SHEET -->
<!-- ... seu código do booking-sheet ... -->

<script src="<?= url_asset("js/search.js") ?>"></script>
</body>
</html>