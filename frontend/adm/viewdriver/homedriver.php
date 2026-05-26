
<!DOCTYPE html>
<html lang="pt">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<title></title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet"/>
<script>tailwind.config={darkMode:'class',theme:{extend:{fontFamily:{display:['"Oswald"','sans-serif'],sans:['"Outfit"','sans-serif']}}}}</script>
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
    <a href="#" class="sb-item">
      <i class="fa-solid fa-route"></i><span>As Minhas Viagens</span>
      <span class="sb-badge">3</span>
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
      <div class="driver-avatar">DC</div>
      <div>
        <div class="driver-name">Domingos C.</div>
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
      <button class="neu-btn" id="sidebar-toggle" title="Menu">
        <i class="fa-solid fa-bars"></i>
      </button>
      <span class="page-title">Painel do Motorista</span>
    </div>
    <div class="topbar-right">
      <button class="neu-btn notif-dot" title="Notificações">
        <i class="fa-solid fa-bell"></i>
      </button>
      <button class="neu-btn" id="theme-toggle" title="Tema">
        <i class="fa-solid fa-moon" id="theme-icon"></i>
      </button>
      <button class="neu-btn">
        <i class="fa-solid fa-circle-user"></i>
        <span>Perfil</span>
      </button>
    </div>
  </header>

  <!-- CONTENT -->
  <div class="content">

    <!-- UPCOMING TRIP BANNER -->
    <div class="upcoming-card">
      <div class="upcoming-label"><i class="fa-solid fa-clock" style="margin-right:.35rem"></i>Próxima Viagem</div>
      <div class="upcoming-time">14:30 — Hoje</div>
      <div class="upcoming-desc">
        <i class="fa-solid fa-location-dot" style="margin-right:.35rem;opacity:.7"></i>Talatona &nbsp;→&nbsp;
        <i class="fa-solid fa-flag-checkered" style="margin-right:.35rem;opacity:.7"></i>Maianga &nbsp;•&nbsp; 3 passageiros confirmados
      </div>
      <div class="upcoming-actions">
        <button class="btn-accent-solid">
          <i class="fa-solid fa-play"></i> Iniciar Viagem
        </button>
        <button class="btn-white">
          <i class="fa-solid fa-map-location-dot"></i> Ver Rota
        </button>
        <button class="btn-white">
          <i class="fa-solid fa-message"></i> Chat
        </button>
      </div>
    </div>

    <!-- STATS -->
    <div class="stats-row">
      <div class="stat-card accent">
        <div class="stat-icon"><i class="fa-solid fa-money-bill-wave"></i></div>
        <div class="stat-val">48.200 Kz</div>
        <div class="stat-label">Ganhos este mês</div>
        <div class="stat-delta delta-up"><i class="fa-solid fa-arrow-trend-up"></i> +12% vs mês anterior</div>
      </div>
      <div class="stat-card blue">
        <div class="stat-icon"><i class="fa-solid fa-route"></i></div>
        <div class="stat-val">127</div>
        <div class="stat-label">Viagens realizadas</div>
        <div class="stat-delta delta-up"><i class="fa-solid fa-arrow-trend-up"></i> +8 esta semana</div>
      </div>
      <div class="stat-card green">
        <div class="stat-icon"><i class="fa-solid fa-star"></i></div>
        <div class="stat-val">4.87</div>
        <div class="stat-label">Avaliação média</div>
        <div class="stat-delta delta-up"><i class="fa-solid fa-arrow-trend-up"></i> Top 5% dos motoristas</div>
      </div>
      <div class="stat-card">
        <div class="stat-icon"><i class="fa-solid fa-leaf"></i></div>
        <div class="stat-val">340 kg</div>
        <div class="stat-label">CO₂ poupado</div>
        <div class="stat-delta delta-up"><i class="fa-solid fa-seedling"></i> Impacto positivo</div>
      </div>
    </div>

    <!-- DISPONIBILIDADE + GANHOS SEMANA -->
    <div class="grid-3">

      <!-- DISPONIBILIDADE -->
      <div class="card">
        <div class="card-header">
          <span class="card-title"><i class="fa-solid fa-toggle-on" style="color:var(--accent);margin-right:.5rem"></i>Disponibilidade</span>
          <span class="badge badge-green"><i class="fa-solid fa-circle" style="font-size:.5rem"></i> Activo</span>
        </div>

        <div class="avail-row">
          <div class="avail-info">
            <div class="avail-icon"><i class="fa-solid fa-car-side"></i></div>
            <div>
              <div class="avail-title">Aceitar Boleias</div>
              <div class="avail-sub">Receber pedidos de passageiros</div>
            </div>
          </div>
          <label class="toggle">
            <input type="checkbox" checked onchange="toggleAvail(this)">
            <span class="toggle-slider"></span>
          </label>
        </div>

        <div class="avail-row">
          <div class="avail-info">
            <div class="avail-icon orange"><i class="fa-solid fa-bell"></i></div>
            <div>
              <div class="avail-title">Alertas de Rota</div>
              <div class="avail-sub">Notificações de boleias próximas</div>
            </div>
          </div>
          <label class="toggle">
            <input type="checkbox" checked>
            <span class="toggle-slider"></span>
          </label>
        </div>

        <div class="avail-row" style="margin-bottom:0">
          <div class="avail-info">
            <div class="avail-icon orange"><i class="fa-solid fa-moon"></i></div>
            <div>
              <div class="avail-title">Modo Noturno</div>
              <div class="avail-sub">Boleias após as 20h</div>
            </div>
          </div>
          <label class="toggle">
            <input type="checkbox">
            <span class="toggle-slider"></span>
          </label>
        </div>
      </div>

      <!-- GANHOS SEMANA -->
      <div class="card">
        <div class="card-header">
          <span class="card-title">Ganhos esta semana</span>
          <span class="card-action">Ver detalhe →</span>
        </div>
        <div style="text-align:center;margin-bottom:.5rem">
          <span style="font-family:var(--font-head);font-size:1.6rem;font-weight:700;color:var(--text)">12.800 Kz</span>
          <span style="font-size:.75rem;color:var(--muted);margin-left:.35rem">/ meta 15.000 Kz</span>
        </div>
        <!-- mini bar chart -->
        <div class="earn-row" id="earn-chart"></div>
        <div style="display:flex;justify-content:space-between;margin-top:.4rem">
          <span style="font-size:.62rem;color:var(--muted)">Seg</span>
          <span style="font-size:.62rem;color:var(--muted)">Ter</span>
          <span style="font-size:.62rem;color:var(--muted)">Qua</span>
          <span style="font-size:.62rem;color:var(--muted)">Qui</span>
          <span style="font-size:.62rem;color:var(--muted)">Sex</span>
          <span style="font-size:.62rem;color:var(--muted)">Sáb</span>
          <span style="font-size:.62rem;color:var(--accent);font-weight:700">Hj</span>
        </div>
      </div>

    </div>

    <!-- VIAGENS RECENTES + PASSAGEIROS -->
    <div class="grid-2">

      <!-- VIAGENS RECENTES -->
      <div class="card">
        <div class="card-header">
          <span class="card-title">Viagens Recentes</span>
          <span class="card-action">Ver todas →</span>
        </div>
        <div class="trip-list">
          <div class="trip-item">
            <div class="trip-icon"><i class="fa-solid fa-check"></i></div>
            <div class="trip-info">
              <div class="trip-route">Talatona → Maianga</div>
              <div class="trip-meta">Hoje, 09:15 &nbsp;•&nbsp; 2 passageiros &nbsp;•&nbsp; <span class="stars">★★★★★</span></div>
            </div>
            <div class="trip-amount">2.400 Kz</div>
          </div>
          <div class="trip-item">
            <div class="trip-icon" style="background:var(--accent)"><i class="fa-solid fa-check" style="color:#1a1f2e"></i></div>
            <div class="trip-info">
              <div class="trip-route">Kilamba → Patriota</div>
              <div class="trip-meta">Ontem, 17:45 &nbsp;•&nbsp; 3 passageiros &nbsp;•&nbsp; <span class="stars">★★★★★</span></div>
            </div>
            <div class="trip-amount">3.600 Kz</div>
          </div>
          <div class="trip-item">
            <div class="trip-icon"><i class="fa-solid fa-check"></i></div>
            <div class="trip-info">
              <div class="trip-route">Viana → Benfica</div>
              <div class="trip-meta">Ontem, 08:00 &nbsp;•&nbsp; 1 passageiro &nbsp;•&nbsp; <span class="stars">★★★★☆</span></div>
            </div>
            <div class="trip-amount">1.800 Kz</div>
          </div>
          <div class="trip-item">
            <div class="trip-icon" style="background:var(--success)"><i class="fa-solid fa-check"></i></div>
            <div class="trip-info">
              <div class="trip-route">Cazenga → Ingombota</div>
              <div class="trip-meta">22 Jul, 12:30 &nbsp;•&nbsp; 2 passageiros &nbsp;•&nbsp; <span class="stars">★★★★★</span></div>
            </div>
            <div class="trip-amount">2.200 Kz</div>
          </div>
        </div>
      </div>

      <!-- PASSAGEIROS HABITUAIS + VIAGEM ACTIVA -->
      <div style="display:flex;flex-direction:column;gap:1.25rem">

        <!-- VIAGEM ACTIVA -->
        <div class="card" style="border:2px solid var(--accent)">
          <div class="card-header" style="margin-bottom:.75rem">
            <span class="card-title">Viagem às 14:30</span>
            <span class="badge badge-orange"><i class="fa-solid fa-circle" style="font-size:.5rem"></i> Confirmada</span>
          </div>
          <div class="route-visual">
            <div class="route-point">
              <div class="route-dot from"></div>
              <div><div class="route-text">Talatona</div><div class="route-sub">Ponto de partida</div></div>
            </div>
            <div class="route-line"></div>
            <div class="route-point">
              <div class="route-dot to"></div>
              <div><div class="route-text">Maianga — Largo 1.º Maio</div><div class="route-sub">Destino final</div></div>
            </div>
          </div>
          <div style="font-size:.75rem;color:var(--muted);margin:.6rem 0 .4rem;font-weight:600;letter-spacing:.5px">PASSAGEIROS CONFIRMADOS</div>
          <div class="pax-row">
            <div class="pax-chip"><div class="pax-avatar">AF</div>Amara F.</div>
            <div class="pax-chip"><div class="pax-avatar">JN</div>João N.</div>
            <div class="pax-chip"><div class="pax-avatar">ML</div>Maria L.</div>
          </div>
        </div>

        <!-- VEÍCULO -->
        <div class="card">
          <div class="card-header" style="margin-bottom:.75rem">
            <span class="card-title">O Meu Veículo</span>
            <span class="badge badge-green">Verificado</span>
          </div>
          <div style="display:flex;align-items:center;gap:1rem">
            <div style="width:52px;height:52px;border-radius:14px;background:var(--bg);box-shadow:var(--shadow-out);display:flex;align-items:center;justify-content:center;font-size:1.5rem"><i class="fa fa-car"></i></div>
            <div>
              <div style="font-family:var(--font-head);font-size:1rem;font-weight:700;color:var(--text)">Toyota Corolla 2020</div>
              <div style="font-size:.78rem;color:var(--muted)">LA•12•84•AB &nbsp;•&nbsp; Prata &nbsp;•&nbsp; 4 lugares</div>
              <div style="font-size:.72rem;color:var(--success);margin-top:.2rem"><i class="fa-solid fa-shield-check" style="margin-right:.25rem"></i>Inspecção válida até Dez 2025</div>
            </div>
          </div>
        </div>

      </div>
    </div>

    <!-- HISTÓRICO PAGAMENTOS -->
    <div class="card">
      <div class="card-header">
        <span class="card-title">Histórico de Pagamentos</span>
        <span class="card-action">Exportar →</span>
      </div>
      <table class="mini-table">
        <thead>
          <tr>
            <th>Data</th><th>Rota</th><th>Passageiros</th><th>Método</th><th>Estado</th><th>Valor</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>25 Jul 2025</td><td>Talatona → Maianga</td><td>2</td>
            <td><span class="badge badge-blue"><i class="fa-solid fa-credit-card" style="font-size:.6rem"></i> Multicaixa</span></td>
            <td><span class="badge badge-green">Pago</span></td>
            <td style="font-family:var(--font-head);font-weight:700;color:var(--accent)">2.400 Kz</td>
          </tr>
          <tr>
            <td>24 Jul 2025</td><td>Kilamba → Patriota</td><td>3</td>
            <td><span class="badge badge-blue"><i class="fa-solid fa-mobile-screen" style="font-size:.6rem"></i> Unitel Money</span></td>
            <td><span class="badge badge-green">Pago</span></td>
            <td style="font-family:var(--font-head);font-weight:700;color:var(--accent)">3.600 Kz</td>
          </tr>
          <tr>
            <td>24 Jul 2025</td><td>Viana → Benfica</td><td>1</td>
            <td><span class="badge badge-blue"><i class="fa-solid fa-wallet" style="font-size:.6rem"></i> Saldo App</span></td>
            <td><span class="badge badge-green">Pago</span></td>
            <td style="font-family:var(--font-head);font-weight:700;color:var(--accent)">1.800 Kz</td>
          </tr>
          <tr>
            <td>22 Jul 2025</td><td>Cazenga → Ingombota</td><td>2</td>
            <td><span class="badge badge-blue"><i class="fa-solid fa-credit-card" style="font-size:.6rem"></i> Multicaixa</span></td>
            <td><span class="badge badge-orange">Pendente</span></td>
            <td style="font-family:var(--font-head);font-weight:700;color:var(--muted)">2.200 Kz</td>
          </tr>
        </tbody>
      </table>
    </div>

  </div>
</div>

<script src="<?= url_asset_adm("viewdriver/assets/js/script.js") ?>">
</script>
</body>
</html>
